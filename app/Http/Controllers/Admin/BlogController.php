<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Traits\UploadFileTrait;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    use UploadFileTrait;

    public function blog_list()
    {
        $data['blogs'] = Blog::get();

        return view('admin.blog.index', compact('data'));
    }

    public function blog_form($type, $id)
    {
        $data['blog'] = Blog::where('id', $id)->first();

        return view('admin.blog.edit', compact('data'));
    }

    public function save_blog(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        if (empty($request->image)) {
            $filename = $request->old_image;
        } else {
            $filename = $this->fileupload($request->image, 'blog');
        }

        $string = strtolower($request->title);
        $string = preg_replace('/[^a-z0-9]+/', '-', $string);
        $addBlog = Blog::updateOrCreate(['id' => $request->id], [
            'name' => $request->name,
            'image' => $filename,
            'slug' => $string,
            'description' => $request->description,
        ]);

        if (! empty($addBlog)) {
            return redirect()->route('blog_list')->with('success', 'Data Added Successfully!');
        } else {
            return back()->with('error', 'Something went wrong!');
        }
    }
}
