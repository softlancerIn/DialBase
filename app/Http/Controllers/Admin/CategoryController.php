<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Traits\UploadFileTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    use UploadFileTrait;

    public function category_list()
    {
        $data['category'] = Category::where('status', '1')->where('cat_id', '0')->get();

        return view('admin.category.index', compact('data'));
    }

    public function category_form($type, $id = 0)
    {

        $data = Category::where('status', '1')->where('id', $id)->first();

        return view('admin.category.edit', compact('data'));
    }

    public function save_category(Request $request)
    {
        $id = $request->id;

        if ($id && $id != '0') {
            $request->validate([
                'name' => 'required|unique:categories,name,' . $id,
                'description' => 'required',
            ]);
            $category = Category::find($id);
        } else {
            $request->validate([
                'name' => 'required|unique:categories,name',
                'description' => 'required',
            ]);
            $category = new Category();
        }

        if (!empty($request->image)) {
            $image = $this->fileupload($request->image, 'category');
        } else {
            $image = $request->old_image;
        }

        $slug = Str::slug($request->name, '-');
        
        $category->name = $request->name;
        $category->slug = $slug;
        $category->icon = $request->icon;
        $category->image = $image;
        $category->description = $request->description;
        $category->cat_id = $request->cat_id ?? '0';
        
        $category->save();

        if ($category) {
            return redirect()->route('category_list')->with('success', 'Category Saved Successfully!');
        } else {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }
}
