<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function categoryView()
    {
        $category = Category::latest()->get();
        return view('backend.category.category_view', compact('category'));
    }
    public function categoryStore(Request $request)
    {
        $request->validate([
            'category_name_en' => 'required',
            'category_name_kh' => 'required',
            'category_icon' => 'required',
        ]);

        Category::insert([
            'category_name_en' => $request->category_name_en,
            'category_name_kh' => $request->category_name_kh,
            'category_slug_en' => strtolower(str_replace(' ', '-', $request->category_name_en)),
            'category_slug_kh' => str_replace(' ', '-', $request->category_name_kh),
            'category_icon' => $request->category_icon,
        ]);
        $notification = array(
            'message' => 'Category Insert Successfuly',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function categoryEdit($id)
    {
        $category = Category::findOrFail($id);
        return view('backend.category.category_edit', compact('category'));
    }
    public function categoryUpdate(Request $request)
    {
        $category_id = $request->id;
        Category::findOrFail($category_id)->update([
            'category_name_en' => $request->category_name_en,
            'category_name_kh' => $request->category_name_kh,
            'category_slug_en' => strtolower(str_replace(' ', '-', $request->category_name_en)),
            'category_slug_kh' => str_replace(' ', '-', $request->category_name_kh),
            'category_icon' => $request->category_icon,
        ]);
        $notification = array(
            'message' => 'Category Update Successfuly',
            'alert-type' => 'success'
        );
        return redirect()->route('all.category')->with($notification);
    }
    public function categoryDelete($id)
    {
        $category_id = Category::findOrFail($id);

        Category::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Brand Delete Successfuly',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }
}
