<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Intervention\Image\ImageManagerStatic as Image;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::all();
        return view('layouts.dashboard.website_components.brand.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('layouts.dashboard.website_components.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if($request->hasFile('brand_img')){
            $new_name = time() . "." . $request->file('brand_img')->getClientOriginalExtension();
            $img =Image::make($request->file('brand_img'))->resize(100, 100);
            $img->save(base_path('public/uploads/website_components_photos/brands_photos/' . $new_name), 80);

            Brand::insert([
                'brand_img'=> $new_name,
                'status'=> $request->status,
                'created_at'=> Carbon::now()
            ]);
        }
        return back()->with('add_brands', 'Brands Add Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Brand::find($id)->delete();
        return back()->with('brand_remove', 'Contact Remove Successfully');
    }
}
