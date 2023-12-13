<?php

namespace App\Http\Controllers;

use App\Models\Navbar;
use Carbon\Carbon;
use Illuminate\Http\Request;

class NavbarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $navbars = Navbar::all();
        return view('layouts.dashboard.website_components.navbars.index',compact('navbars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('layouts.dashboard.website_components.navbars.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'name'=>'required|alpha|unique:navbars',
            'links'=>'required|alpha'
        ]);

        Navbar::insert([
            'name'=>$request->name,
            'links'=>$request->links,
            'user_id' => auth()->id(),
            'status' => $request->status,
            'created_at' => Carbon::now(),
            'updated_at' => null
        ]);

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Navbar $navbar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Navbar $navbar)
    {
        $navbar;
        return view('layouts.dashboard.website_components.navbars.edit',compact('navbar'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Navbar $navbar)
    {
        Navbar::find($navbar->id)->update([
            'name'=>$request->name,
            'links'=>$request->links,
            'status' => $request->status,
            'updated_at' => Carbon::now()
        ]);
        
        return back();

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Navbar $navbar)
    {
        Navbar::find($navbar->id)->delete();
        return back();
    }
}
