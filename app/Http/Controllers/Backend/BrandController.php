<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use RealRashid\SweetAlert\Facades\Alert;


class BrandController extends Controller
{
    //
    public function brandView()
    {
        $brands = Brand::latest()->get();
        return view('backend.brand.brand_view', compact('brands'));
    }
    public function brandStore(Request $request)
    {
        $request->validate([
            'brand_name_en' => 'required',
            'brand_name_kh' => 'required',
            'brand_image' => 'required',
        ]);
        $image = $request->file('brand_image');
        $name_ext = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(300, 300)->save('uploads/brands/' . $name_ext);
        $imag_path = 'uploads/brands/' . $name_ext;
        Brand::insert([
            'brand_name_en' => $request->brand_name_en,
            'brand_name_kh' => $request->brand_name_kh,
            'brand_slug_en' => strtolower(str_replace(' ', '-', $request->brand_name_en)),
            'brand_slug_kh' => str_replace(' ', '-', $request->brand_name_kh),
            'brand_image' => $imag_path,
        ]);
        $notification = array(
            'message' => 'Brand Insert Successfuly',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function brandEdit($id)
    {
        $brands = Brand::findOrFail($id);
        return view('backend.brand.brand_edit', compact('brands'));
    }
    public function brandUpdate(Request $request)
    {
        $brandId = $request->input('id');
        $old_images = $request->input('old_image');
        if ($request->file('brand_image')) {
            unlink($old_images);
            $image = $request->file('brand_image');
            $name_ext = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save('uploads/brands/' . $name_ext);
            $imag_path = 'uploads/brands/' . $name_ext;
            Brand::findOrFail($brandId)->update([
                'brand_name_en' => $request->brand_name_en,
                'brand_name_kh' => $request->brand_name_kh,
                'brand_slug_en' => strtolower(str_replace(' ', '-', $request->brand_name_en)),
                'brand_slug_kh' => str_replace(' ', '-', $request->brand_name_kh),
                'brand_image' => $imag_path,
            ]);
            $notification = array(
                'message' => 'Brand Update Successfuly',
                'alert-type' => 'info'
            );
            return redirect()->route('all.brands')->with($notification);
        } else {

            Brand::findOrFail($brandId)->update([
                'brand_name_en' => $request->brand_name_en,
                'brand_name_kh' => $request->brand_name_kh,
                'brand_slug_en' => strtolower(str_replace(' ', '-', $request->brand_name_en)),
                'brand_slug_kh' => str_replace(' ', '-', $request->brand_name_kh),

            ]);
            $notification = array(
                'message' => 'Brand Update Successfuly',
                'alert-type' => 'info'
            );
            return redirect()->route('all.brands')->with($notification);
        }
    }
    public function brandDelete($id)
    {
        // alert()->question('QuestionAlert', 'Lorem ipsum dolor sit amet.');
        // $a = Alert::question('Question Title', 'Question Message');

        $brand = Brand::findOrFail($id);
        $img = $brand->brand_image;
        unlink($img);
        Brand::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Brand Delete Successfuly',
            'alert-type' => 'info'
        );
        return redirect()->route('all.brands')->with($notification);
    }
}
