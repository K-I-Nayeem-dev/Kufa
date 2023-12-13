<?php

namespace App\Http\Controllers;

use App\Models\Navbar;
use App\Models\Recent;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

class RecntController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $recents = Recent::all();
        return view('layouts.dashboard.website_components.recent.index', compact('recents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('layouts.dashboard.website_components.recent.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        if($request->hasFile('recent_photo')){
            $new_name = time() . "." . $request->file('recent_photo')->getClientOriginalExtension();
            $img =Image::make($request->file('recent_photo'))->resize(400, 570);
            $img->save(base_path('public/uploads/website_components_photos/recent_photos/' . $new_name), 80);

            Recent::insert([
                'title'=> $request->title,
                'description'=> $request->description,
                'recent_photo'=> $new_name,
                'status'=> $request->status,
                'created_at'=> Carbon::now()
            ]);

        }

        return back()->with('add_recent', 'Upload Recent Description & Image Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $recent = Recent::find($id);
        $navbars = Navbar::all();
        return view('layouts.dashboard.website_components.recent.show', compact('recent', 'navbars'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $recent = Recent::find($id);
        return view('layouts.dashboard.website_components.recent.edit', compact('recent'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        if($request->hasFile('recent_photo')){
            // unlink('/var/www/test/folder/images/image_name.jpeg');
            $new_name = time() . "." . $request->file('recent_photo')->getClientOriginalExtension();
            $img =Image::make($request->file('recent_photo'))->resize(400, 570);
            $img->save(base_path('public/uploads/website_components_photos/recent_photos/' . $new_name), 80);

            Recent::find($id)->update([
                'title'=> $request->title,
                'description'=> $request->description,
                'recent_photo'=> $new_name,
                'status'=> $request->status,
                'updated_at'=> Carbon::now()
            ]);

        }
        else{

            Recent::find($id)->update([
                'title'=> $request->title,
                'description'=> $request->description,
                'status'=> $request->status,
                'updated_at'=> Carbon::now()
            ]);

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Recent::find($id)->delete();
        return back()->with('recent_remove', ' Remove Successfully');
    }



}
