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
        ]);

        if (! empty($addSeo)) {
            return redirect()->route('seo_list')->with('success', 'Data Added Successfully!');
        } else {
            return back()->with('error', 'Something went wrong!');
        }
    }
}
