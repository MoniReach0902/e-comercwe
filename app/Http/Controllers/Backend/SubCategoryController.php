<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function subCategoryView()
    {
        $category = Category::orderBy('category_name_en', 'ASC')->get();
        $subcategory = SubCategory::latest()->get();
        return view('backend.category.subcategory_view', compact('subcategory', 'category'));
    }
    public function subcategoryStore(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'subcategory_name_en' => 'required',
            'subcategory_name_kh' => 'required',

        ]);

        SubCategory::insert([

            'subcategory_name_en' => $request->subcategory_name_en,
            'subcategory_name_kh' => $request->subcategory_name_kh,
            'subcategory_slug_en' => strtolower(str_replace(' ', '-', $request->subcategory_name_en)),
            'subcategory_slug_kh' => str_replace(' ', '-', $request->subcategory_name_kh),
            'category_id' => $request->category_id,
        ]);
        $notification = array(
            'message' => 'Sub Category Insert Successfuly',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function subcategoryEdit($id)
    {
        $category = Category::orderBy('category_name_en', 'ASC')->get();
        $subcategory = SubCategory::findOrFail($id);
        return view('backend.category.subcategory_edit', compact('subcategory', 'category'));
    }
    public function categoryUpdate(Request $request)
    {
        $sid = $request->id;
        SubCategory::findOrFail($sid)->update([
            'category_id' => $request->category_id,
            'subcategory_name_en' => $request->subcategory_name_en,
            'subcategory_name_kh' => $request->subcategory_name_kh,
            'subcategory_slug_en' => strtolower(str_replace(' ', '-', $request->subcategory_name_en)),
            'subcategory_slug_kh' => str_replace(' ', '-', $request->subcategory_name_kh),

        ]);
        $notification = array(
            'message' => 'Sub Category Update Successfuly',
            'alert-type' => 'success'
        );
        return redirect()->route('all.subcategory')->with($notification);
    }
    public function categoryDelete($id)
    {
        SubCategory::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Sub Category delete Successfuly',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }
}
