<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Traits\UploadFileTrait;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    use UploadFileTrait;

    public function category_list()
    {
        $data['category'] = Category::where('status', '1')->where('cat_id', '0')->get();

        return view('admin.category.index', compact('data'));
    }

    public function category_form($type, $id)
    {

        $data = Category::where('status', '1')->where('id', $id)->first();

        return view('admin.category.edit', compact('data'));
    }

    public function save_category(Request $request)
    {

        $id = ($request->id == 0) ? null : $request->id;

        $validate = $request->validate([
            'name' => 'required|unique:categories,name,'.$id,
            'description' => 'required',
        ]);

        if (! empty($request->image)) {
            $image = $this->fileupload($request->image, 'category');
        } else {
            $image = $request->old_image;
        }
        $string = strtolower($request->name);
        $string = preg_replace('/[^a-z0-9]+/', '-', $string);
        $add_data = Category::updateOrCreate(['id' => $request->id], [
            'name' => $request->name,
            'image' => $image,
            'description' => $request->description,
            'slug' => $string,
            'cat_id' => $request->cat_id ?? '0',
        ]);
        if (! empty($add_data)) {
            return redirect()->route('category_list')->with('success', 'Category Added Successfully!');
        } else {
            return redirect()->back()->with('error', 'Something went erong!');
        }
    }
}
