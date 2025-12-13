<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Enquiry;
use App\Traits\UploadFileTrait;

class EnquiryController extends Controller
{
    use UploadFileTrait;

    public function enquiry_list(Request $request)
    {
        $query = Enquiry::with('listing');

        if ($request->filled('name')) {
            $query->where('name', 'like', '%' . trim($request->name) . '%');
        }
        if ($request->filled('email')) {
            $query->where('email', 'like', '%' . trim($request->email) . '%');
        }
        if ($request->filled('phone')) {
            $query->where('phone', 'like', '%' . trim($request->phone) . '%');
        }
        if ($request->filled('listing')) {
            $listingSearch = trim($request->listing);
            $query->whereHas('listing', function ($q) use ($listingSearch) {
                $q->where('title', 'like', "%{$listingSearch}%");
            });
        }
        if ($request->filled('created_from')) {
            try {
                $from = new \Carbon\Carbon($request->created_from);
                $query->whereDate('created_at', '>=', $from->format('Y-m-d'));
            } catch (\Throwable $e) {
                // ignore invalid date
            }
        }
        if ($request->filled('created_to')) {
            try {
                $to = new \Carbon\Carbon($request->created_to);
                $query->whereDate('created_at', '<=', $to->format('Y-m-d'));
            } catch (\Throwable $e) {
                // ignore invalid date
            }
        }

        $enquiries = $query->latest('id')->paginate(10)->appends($request->query());

        $filters = $request->only(['name','email','phone','listing','created_from','created_to']);
        return view('admin.enquiry.index', compact('enquiries','filters'));
    }

    public function enquiry_export(Request $request)
    {
        $query = Enquiry::with('listing');

        if ($request->filled('name')) {
            $query->where('name', 'like', '%' . trim($request->name) . '%');
        }
        if ($request->filled('email')) {
            $query->where('email', 'like', '%' . trim($request->email) . '%');
        }
        if ($request->filled('phone')) {
            $query->where('phone', 'like', '%' . trim($request->phone) . '%');
        }
        if ($request->filled('listing')) {
            $listingSearch = trim($request->listing);
            $query->whereHas('listing', function ($q) use ($listingSearch) {
                $q->where('title', 'like', "%{$listingSearch}%");
            });
        }
        if ($request->filled('created_from')) {
            try {
                $from = new \Carbon\Carbon($request->created_from);
                $query->whereDate('created_at', '>=', $from->format('Y-m-d'));
            } catch (\Throwable $e) {}
        }
        if ($request->filled('created_to')) {
            try {
                $to = new \Carbon\Carbon($request->created_to);
                $query->whereDate('created_at', '<=', $to->format('Y-m-d'));
            } catch (\Throwable $e) {}
        }

        $enquiries = $query->get();

        $filename = 'enquiries_' . now()->format('Ymd_His') . '.csv';

        // Ensure export directory exists
        $exportDir = storage_path('app/exports');
        if (! is_dir($exportDir)) {
            @mkdir($exportDir, 0775, true);
        }

        $fullPath = $exportDir . DIRECTORY_SEPARATOR . $filename;

        // Open file and write UTF-8 BOM for Excel
        $fp = fopen($fullPath, 'w');
        if ($fp === false) {
            return redirect()->route('enquiry_list')->with('error', 'Failed to create export file.');
        }
        fwrite($fp, chr(0xEF) . chr(0xBB) . chr(0xBF));

        // Header
        fputcsv($fp, ['Id', 'Listing Name', 'Name', 'Phone', 'Email', 'Subject', 'Message', 'Created Date']);

        // Rows
        foreach ($enquiries as $e) {
            fputcsv($fp, [
                $e->id,
                optional($e->listing)->name ?? optional($e->listing)->title ?? '',
                $e->name,
                $e->phone,
                $e->email,
                $e->subject,
                preg_replace("/\r?\n/", ' ', strip_tags((string) $e->message)),
                optional($e->created_at)?->format('d M Y'),
            ]);
        }
        fclose($fp);

        // Directly return the download and instruct browser to redirect after it starts
        $response = response()->download(
            $fullPath,
            $filename,
            ['Content-Type' => 'text/csv; charset=UTF-8']
        );
        $response->deleteFileAfterSend(true);
        $response->headers->set('Refresh', '0;url=' . route('enquiry_list'));
        return $response;
    }

    public function enquiry_download(string $filename)
    {
        // Guard against path traversal
        $safe = basename($filename);
        $fullPath = storage_path('app/exports' . DIRECTORY_SEPARATOR . $safe);

        if (! file_exists($fullPath)) {
            return redirect()->route('enquiry_list')->with('error', 'Export file not found.');
        }

        $response = response()->download(
            $fullPath,
            $safe,
            ['Content-Type' => 'text/csv; charset=UTF-8']
        );
        $response->deleteFileAfterSend(true);
        // Set Refresh header to redirect after download starts
        $response->headers->set('Refresh', '0;url=' . route('enquiry_list'));
        return $response;
    }
}
