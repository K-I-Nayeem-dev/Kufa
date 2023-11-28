<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\AboutDesImg;
use App\Models\Banner;
use App\Models\Service;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Auth;

class WebsiteController extends Controller
{

    //banner index 

    public function index(){
        $banners = Banner::all();
        return view('layouts.dashboard.website_components.Banner.index', compact('banners'));
    }

    // banner upload
    public function banner_create(){
        return view('layouts.dashboard.website_components.Banner.create');
    }

    // banner store
    public function banner_upload(Request $request){
        $request->validate([
            'banner_photo'=> 'required',
            'banner_descriptions'=> 'required',
        ]);
        $new_name = Auth::user()->id . "." . $request->file('banner_photo')->getClientOriginalExtension();
        $img =Image::make($request->file('banner_photo'))->resize(300, 200);
        $img->save(base_path('public/uploads/website_components_photos/banner_photos/' . $new_name), 80);

        Banner::insert([
            'banner_photo'=> $new_name,
            'banner_descriptions'=> $request->banner_descriptions,
            'banner_status'=> $request->banner_status,
            'banner_social_links'=> 'links',
            'created_at'=> Carbon::now(),
        ]);

        return back()->with('banner_added', 'Banner Update Successfully');
    }

    // banner edit

    public function banner_edit($id){
        $banner = Banner::find($id);
        return view('layouts.dashboard.website_components.Banner.bannerEdit', compact('banner'));
    }

    public function banner_show(string $id)
    {
        $banner = Banner::find($id);
        return view('layouts.dashboard.website_components.Banner.bannerEdit', compact('banner'));
    }

    // banner update 
    public function banner_update(Request $request, string $id){
        // $request->validate([
        //     '*' => 'required',
        // ]);
        if($request->hasFile('photo')){
            $new_name = Auth::user()->id . "." . $request->file('banner_photo')->getClientOriginalExtension();
            $img =Image::make($request->file('profile_photo'))->resize(300, 200);
            $img->save(base_path('public/uploads/website_components_photos/banner_photos/' . $new_name), 80);
            Banner::find($id)->update([
                'banner_photo'=> $new_name,
                'banner_descriptions'=> $request->banner_descriptions,
                'banner_status'=> $request->banner_status,
            ]);

        }
        else{
            Banner::find($id)->update([
                'banner_descriptions'=> $request->banner_descriptions,
                'banner_status'=> $request->banner_status,
            ]);
        }

        return back()->with('banner_update', 'Banner Update Successfully');
    }

    
    public function banner_destroy(string $id)
    {
        Banner::find($id)->delete();
        return back()->with('banner_remove', ' Remove Successfully');
    }

    // About parts

    // About View

    public function about(){
        return view('layouts.dashboard.website_components.About_Me.about');
    }

     // About store
    public function about_education(Request $request){

        $request->validate([
            '*'=>'required',
        ]);

        About::create($request->except('_token') + [
            'created_at'=> Carbon::now(),
            'updated_at'=> null
        ]);

        return back()->with('add_about', 'Add About Successfully');

    }
     // About Description store
    public function about_education_description(Request $request){


        if($request->hasFile('about_img')){
            $new_name = Auth::user()->id . "." . $request->file('about_img')->getClientOriginalExtension();
            $img =Image::make($request->file('about_img'))->resize(300, 200);
            $img->save(base_path('public/uploads/website_components_photos/about_img/' . $new_name), 80);
            AboutDesImg::insert([
                'about_img'=> $new_name,
                'about_education_description'=> $request->about_education_description,
                'about_des_status'=> $request->about_des_status,
                'created_at'=> Carbon::now()
            ]);
        }
        else{
            AboutDesImg::create($request->except('_token','about_img') + [
                'created_at'=> Carbon::now(),
                'updated_at'=> null
            ]);
        }
        return back()->with('add_about', 'Add About Description & Image Successfully');

    }

    // about edit 

    public function about_edit(){
        $abouts = About::all();
        $aboutDesImg = AboutDesImg::all();
        return view('layouts.dashboard.website_components.About_Me.aboutEdit',[
            'abouts'=> $abouts,
            'aboutDesImg'=> $aboutDesImg,
        ]);
    }

    public function about_edited(string $id){
        $about = About::find($id);
        $aboutDes = AboutDesImg::find($id);
        return view('layouts.dashboard.website_components.About_Me.aboutUpdate', [
            'about' => $about,
            'aboutDes' => $aboutDes,
        ]);
    }

    public function about_update(Request $request , string $id){

        About::find($id)->update([
            'about_education' => $request->about_education,
            'about_education_title' => $request->about_education_title ,
            'about_education_progress_bar' =>  $request->about_education_progress_bar,
            'about_status' =>  $request->about_status,
        ]);

        return back()->with('add_update', 'Add About Description & Image Successfully');

    }

    public function about_des_update(string $id){
        $aboutDes = AboutDesImg::find($id);
        return view('layouts.dashboard.website_components.About_Me.aboutDesUpdate',compact('aboutDes'));
    }

    public function about_des_updated(Request $request, string $id){

        if($request->hasFile('about_img')){
            $new_name = Auth::user()->id . "." . $request->file('about_img')->getClientOriginalExtension();
            $img =Image::make($request->file('about_img'))->resize(300, 200);
            $img->save(base_path('public/uploads/website_components_photos/about_img/' . $new_name), 80);

            AboutDesImg::find($id)->update([
                'about_img'=> $new_name,
                'about_education_description'=> $request->about_education_description,
                'about_des_status'=> $request->about_des_status,
                'updated_at'=> Carbon::now()
            ]);

        }
        else{

            AboutDesImg::find($id)->update([
                'about_education_description'=> $request->about_education_description,
                'about_des_status'=> $request->about_des_status,
                'updated_at'=> Carbon::now()
            ]);

        }

        return back()->with('add_about', 'Update About Description & Image Successfully');
        
    }
    public function about_destroy(string $id)
    {
        About::find($id)->delete();
        return back()->with('about_remove', ' Remove Successfully');
    }

    public function about_des_destroy(string $id)
    {
        AboutDesImg::find($id)->delete();
        return back()->with('about_dec_remove', ' Remove Successfully');
    }
    // About route End

    // Service Routes start

    public function service(){

        $file = 'fontAwesome5.json';
        $data = file_get_contents($file);
        $font = json_decode($data); 
        $fonts = $font->fonts;
        return view('layouts.dashboard.website_components.Service_.service', compact('fonts'));
    }


    public function service_store(Request $request){
        
        $request->validate([
            '*'=> 'required',
        ]);
        
        Service::insert([
            'title'=> $request->service_title,
            'description'=> $request->service_description,
            'icon'=> $request->service_icon,
            'status'=> $request->service_status,
            'created_at'=> Carbon::now(),
        ]);
        return back()->with('add_icon', 'Icon Upload Successfully');
    }

    public function services(){
        $services= Service::all();
        return view('layouts.dashboard.website_components.Service_.serviceView',compact('services'));
    }

    public function servicesEdit(string $id){
        $service= Service::find($id);
        $file = 'fontAwesome5.json';
        $data = file_get_contents($file);
        $font = json_decode($data); 
        $fonts = $font->fonts;
        return view('layouts.dashboard.website_components.Service_.serviceEdit',[
            'service'=> $service,
            'fonts'=> $fonts
        ]);
    }

    public function servicesUpdate(Request $request, string $id){

        Service::find($id)->update([
            'title'=> $request->service_title,
            'description'=> $request->service_description,
            'icon'=> $request->service_icon,
            'status'=> $request->service_status,
            'updated_at'=> Carbon::now(),
        ]);

        return back()->with('icon_update', 'Icon Upload Successfully');

    }

    public function service_destroy(string $id)
    {
        Service::find($id)->delete();
        return back()->with('serive_remove', ' Remove Successfully');
    }




    // Service Routes End

}

