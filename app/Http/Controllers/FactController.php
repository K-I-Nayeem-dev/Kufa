<?php

namespace App\Http\Controllers;

use App\Models\Fact;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('layouts.dashboard.website_components.facts.index',[ 'fonts'=>Fact::all(),]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $file = 'fontAwesome5.json';
        $data = file_get_contents($file);
        $font = json_decode($data); 
        $fonts = $font->fonts;
        return view('layouts.dashboard.website_components.facts.create', [
            'fonts'=> $fonts,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Fact::create($request->except('_token'),[
            'created_at'=> Carbon::now(),
            'updated_at'=> null
        ]);

        return back()->with('add_fact', 'Fact Upload Successfully');

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
        $file = 'fontAwesome5.json';
        $data = file_get_contents($file);
        $font = json_decode($data); 
        $fonts = $font->fonts;
        return view('layouts.dashboard.website_components.facts.edit',[
            'fonts'=> $fonts,
            'facts' => Fact::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Fact::find($id)->update([
            'title'=>$request->title,
            'icon'=>$request->icon,
            'number'=>$request->number,
            'status'=>$request->status,
            'updated_at'=>Carbon::now()
        ]);

        return back()->with('update_fact', 'Fact Upload Successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Fact::find($id)->delete();
        return back()->with('fact_remove', ' Remove Successfully');
    }
}
