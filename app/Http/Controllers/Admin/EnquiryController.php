<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Enquiry;
use App\Traits\UploadFileTrait;

class EnquiryController extends Controller
{
    use UploadFileTrait;

    public function enquiry_list()
    {
        $data['enquiries'] = Enquiry::get();

        return view('admin.enquiry.index', compact('data'));
    }
}
