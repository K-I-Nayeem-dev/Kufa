<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\AboutDesImg;
use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Brand;
use App\Models\Fact;
use App\Models\Recent;
use App\Models\Service;
use App\Models\Testimonial;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function welcome()
    {
        $banner = Banner::select('banner_photo','banner_descriptions', 'banner_status')->first();
        return view('welcome', [
            'banner' => $banner,
            'abouts' => About::orderBy('about_education', 'ASC')->get(),
            'about_des'=> AboutDesImg::select('about_education_description','about_img','about_des_status')->first(),
            'services'=> Service::all(),
            'recents'=> Recent::all(),
            'facts'=> Fact::all(),
            'testimonial'=> Testimonial::all(),
            'brands'=> Brand::all(),
        ]);
    }
}
