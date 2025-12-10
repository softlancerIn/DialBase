<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
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
        $data['categories'] = Category::where('status', 1)->get();

        return view('admin.blog.edit', compact('data'));
    }

    public function save_blog(Request $request)
    {
        $id = ($request->id == 0) ? null : $request->id;

        $validate = $request->validate([
            'name' => 'required|unique:blogs,name,'.$id,
            'description' => 'required',
            'category_id' => 'nullable|exists:categories,id',
        ]);

        if (empty($request->image)) {
            $filename = $request->old_image;
        } else {
            $filename = $this->fileupload($request->image, 'blog');
        }

        $string = strtolower($request->name);
        $string = preg_replace('/[^a-z0-9]+/', '-', $string);

        $addBlog = Blog::updateOrCreate(['id' => $request->id], [
            'name' => $request->name,
            'image' => $filename,
            'slug' => $string,
            'description' => $request->description,
            'long_description' => $request->long_description,
            'category_id' => $request->category_id,
        ]);

        if (! empty($addBlog)) {
            return redirect()->route('blog_list')->with('success', 'Data Added Successfully!');
        } else {
            return back()->with('error', 'Something went wrong!');
        }
    }
}
