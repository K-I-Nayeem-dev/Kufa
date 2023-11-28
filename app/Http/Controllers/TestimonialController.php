<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testimoni = Testimonial::all();
        return view('layouts.dashboard.website_components.testimonial.index', compact('testimoni'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('layouts.dashboard.website_components.testimonial.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        if($request->hasFile('testimoni_photo')){
            $new_name = time() . "." . $request->file('testimoni_photo')->getClientOriginalExtension();
            $img =Image::make($request->file('testimoni_photo'))->resize(100, 100);
            $img->save(base_path('public/uploads/website_components_photos/testimonial_photos/' . $new_name), 80);

            Testimonial::insert([
                'name'=> $request->name,
                'designation'=> $request->designation,
                'qoute'=> $request->qoute,
                'testimoni_photo'=> $new_name,
                'status'=> $request->status,
                'created_at'=> Carbon::now()
            ]);

        }

        return back()->with('add_testimonial', 'Testimonoal Add Successfully');
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
        $testi = Testimonial::find($id);
        return view('layouts.dashboard.website_components.testimonial.edit', compact('testi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        if($request->hasFile('testimoni_photo')){
            $new_name = time() . "." . $request->file('testimoni_photo')->getClientOriginalExtension();
            $img =Image::make($request->file('testimoni_photo'))->resize(100, 100);
            $img->save(base_path('public/uploads/website_components_photos/testimonial_photos/' . $new_name), 80);

            Testimonial::find($id)->update([
                'name'=> $request->name,
                'designation'=> $request->designation,
                'testimoni_photo'=> $request->testimoni_photo,
                'qoute'=> $request->qoute,
                'status'=> $request->status,
                'updated_at'=> Carbon::now()
            ]);

        }else{
            Testimonial::find($id)->update([
                'name'=> $request->name,
                'designation'=> $request->designation,
                'qoute'=> $request->qoute,
                'status'=> $request->status,
                'updated_at'=> Carbon::now()
            ]);
        }

        return back()->with('add_testimonial_update', 'Testimonoal Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Testimonial::find($id)->delete();
        return back()->with('testimonial_remove', 'Contact Remove Successfully');
    }
}
