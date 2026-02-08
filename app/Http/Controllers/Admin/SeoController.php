<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Seo;
use App\Traits\UploadFileTrait;
use Illuminate\Http\Request;

class SeoController extends Controller
{
    use UploadFileTrait;

    public function seo_list()
    {
        $data['seo'] = Seo::get();

        return view('admin.seo.index', compact('data'));
    }

    public function seo_form($type, $id)
    {
        if ($type === 'create') {
            return view('admin.seo.create');
        }

        $data['seo'] = Seo::where('id', $id)->first();

        return view('admin.seo.edit', compact('data'));
    }

    public function save_seo(Request $request)
    {
        $validate = $request->validate([
            'url' => 'required',
        ]);

        $addSeo = Seo::updateOrCreate(['id' => $request->id], [
            'url' => $request->url,
            'title' => $request->title,
            'keywords' => $request->keywords,
            'description' => $request->description,
            'script' => $request->script,
            'page_title' => $request->page_title,
            'page_sort_description' => $request->page_sort_description,
            'page_description' => $request->page_description,
        ]);

        if (! empty($addSeo)) {
            return redirect()->route('seo_list')->with('success', 'Data Added Successfully!');
        } else {
            return back()->with('error', 'Something went wrong!');
        }
    }
}
