<?php

use Carbon\Carbon;

if (! function_exists('daysAgo')) {
    /**
     * Return a humanized time difference like "2 hours ago" or fallback to formatted date.
     *
     * @param  \DateTimeInterface|string|null  $date
     * @param  string  $fallbackFormat  PHP date format used when diff cannot be computed
     * @return string
     */
    function daysAgo($date, string $fallbackFormat = 'd M Y') : string
    {
        try {
            if ($date instanceof \DateTimeInterface) {
                $carbon = Carbon::instance($date);
            } elseif (is_string($date) && $date !== '') {
                $carbon = Carbon::parse($date);
            } else {
                return '';
            }

            // If the date is very old/new, diffForHumans handles humanized text
            return $carbon->diffForHumans();
        } catch (\Throwable $e) {
            // Fallback: try simple formatting if possible
            try {
                $carbon = Carbon::parse((string) $date);
                return $carbon->format($fallbackFormat);
            } catch (\Throwable $e2) {
                return '';
            }
        }
    }
}

if (! function_exists('exportCsvWithRedirect')) {
    /**
     * Build a CSV from provided header columns and row arrays, then return a view
     * that triggers a download and redirects to the given URL.
     *
     * @param  string $filename      File name to save as e.g. enquiries_20250101_120000.csv
     * @param  array  $columns       Header columns (array of strings)
     * @param  array  $rows          Rows (array of arrays in same order as columns)
     * @param  string $redirectUrl   Absolute URL to redirect after download
     * @return \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\Support\Renderable
     */
    function exportCsvWithRedirect(string $filename, array $columns, array $rows, string $redirectUrl)
    {
        // Build CSV content in-memory (with UTF-8 BOM for Excel)
        $csv = chr(0xEF) . chr(0xBB) . chr(0xBF); // BOM
        $fp = fopen('php://temp', 'r+');
        fputcsv($fp, $columns);
        foreach ($rows as $row) {
            // Ensure each row is a flat array of scalar values
            $flat = array_map(function ($v) {
                if (is_scalar($v) || $v === null) {
                    return $v;
                }
                return strip_tags((string) $v);
            }, $row);
            fputcsv($fp, $flat);
        }
        rewind($fp);
        $csv .= stream_get_contents($fp);
        fclose($fp);

        return response()->view('admin.enquiry.export_download', [
            'filename' => $filename,
            'csv' => $csv,
            'redirectUrl' => $redirectUrl,
        ]);
    }
}
