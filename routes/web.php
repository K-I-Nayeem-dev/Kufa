<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\RecntController;
use App\Http\Controllers\FactController;
use App\Http\Controllers\NavbarController;
use App\Http\Controllers\TestimonialController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Auth::routes();

// Website Main Route
Route::get('/',[HomeController::class, 'welcome'])->name('welcome');
// Website Main Route

// Dashboard Routes
Route::get('/home', [HomeController::class, 'index'])->name('home');
// Dashboard Routes

// Profile Routes
Route::get('/profile', [ProfileController::class, 'profile_index'])->name('profile');
Route::post('/profile/name/changed', [ProfileController::class, 'profile_name_changed'])->name('nameChanged');
Route::post('/profile/photo/updated', [ProfileController::class, 'profile_photo_upload'])->name('profilePhotoUpload');
Route::post('/profile/email/update', [ProfileController::class, 'email_update'])->name('emailupload');
Route::post('/profile/password/changed', [ProfileController::class, 'password_changed'])->name('passwordChanged');
// Profile Routes

// Website Components Routes

//Banner Routes
Route::get('/banner',[WebsiteController::class, 'index'])->name('banner.index');
Route::get('/banner/create',[WebsiteController::class, 'banner_create'])->name('banner');
Route::get('/banner/{id}',[WebsiteController::class, 'banner_show'])->name('banner.show');
Route::post('/banner/components/upload',[WebsiteController::class, 'banner_upload'])->name('banner_upload');
Route::get('/banner/edit/{id}',[WebsiteController::class, 'banner_edit'])->name('bannerEdit');
Route::post('/banner/update/{id}',[WebsiteController::class, 'banner_update'])->name('banner_update');
Route::get('banner/remove/{id}', [WebsiteController::class, 'banner_destroy'])->name('banner.destroy');

//Banner Routes

// About Routes
Route::get('/about',[WebsiteController::class, 'about'])->name('about');
Route::post('/about/upload/education',[WebsiteController::class, 'about_education'])->name('about_education');
Route::post('/about/upload/education/description',[WebsiteController::class, 'about_education_description'])->name('about_education_description');
Route::get('/about/edit/',[WebsiteController::class, 'about_edit'])->name('about_edit');
Route::get('/about/edited/{id}',[WebsiteController::class, 'about_edited'])->name('about_edited');
Route::post('/about/update/{id}',[WebsiteController::class, 'about_update'])->name('about_update');
Route::get('/about/des/update/{id}',[WebsiteController::class, 'about_des_update'])->name('about_des_update');
Route::post('/about/des/updated/{id}',[WebsiteController::class, 'about_des_updated'])->name('about_des_updated');
Route::get('about/remove/{id}', [WebsiteController::class, 'service_destroy'])->name('services.destroy');
Route::get('about/remove/{id}', [WebsiteController::class, 'about_destroy'])->name('about.destroy');
Route::get('about/des/remove/{id}', [WebsiteController::class, 'about_des_destroy'])->name('about.des.destroy');
// About Routes

// Service Routes
Route::get('/service',[WebsiteController::class, 'service'])->name('service');
Route::post('/service/store',[WebsiteController::class, 'service_store'])->name('service_store');
Route::get('/services',[WebsiteController::class, 'services'])->name('serviceView');
Route::get('/services/Edit/{id}',[WebsiteController::class, 'servicesEdit'])->name('servicesEdit');
Route::post('/services/update/{id}',[WebsiteController::class, 'servicesUpdate'])->name('servicesUpdate');
Route::get('services/remove/{id}', [WebsiteController::class, 'service_destroy'])->name('services.destroy');

// Service Routes


// Recent Routes
Route::get('recent',[RecntController::class, 'index'])->name('recent.index');
Route::get('recent/create',[RecntController::class, 'create'])->name('recent.create');
Route::post('recent/store',[RecntController::class, 'store'])->name('recent.store');
Route::get('recent/edit/{id}',[RecntController::class, 'edit'])->name('recent.edit');
Route::post('recent/update/{id}',[RecntController::class, 'update'])->name('recent.update');
Route::get('recent/{id}',[RecntController::class, 'show'])->name('recent.link');
Route::get('recent/remove/{id}', [RecntController::class, 'destroy'])->name('recent.destroy');
// Recent Routes


// Facts Routes
Route::get('facts', [FactController::class, 'index'])->name('fact.index');
Route::get('facts/create', [FactController::class, 'create'])->name('facts.create');
Route::post('facts/store', [FactController::class, 'store'])->name('facts.store');
Route::get('facts/edit/{id}', [FactController::class, 'edit'])->name('facts.edit');
Route::post('facts/update/{id}', [FactController::class, 'update'])->name('facts.update');
Route::get('facts/remove/{id}', [FactController::class, 'destroy'])->name('facts.destroy');
// Facts Routes


// Testimonial Routes
Route::get('testimonial', [TestimonialController::class, 'index'])->name('testimonial.index');
Route::get('testimonial/create', [TestimonialController::class, 'create'])->name('testimonial.create');
Route::post('testimonial/store', [TestimonialController::class, 'store'])->name('testimonial.store');
Route::get('testimonial/edit/{id}', [TestimonialController::class, 'edit'])->name('testimonial.edit');
Route::post('testimonial/update/{id}', [TestimonialController::class, 'update'])->name('testimonial.update');
Route::get('testimonial/remove/{id}', [TestimonialController::class, 'destroy'])->name('testimonial.destroy');

// Testimonial Routes

// Testimonial Routes
Route::get('brand', [BrandController::class, 'index'])->name('brand.index');
Route::get('brand/create', [BrandController::class, 'create'])->name('brand.create');
Route::post('brand/store', [BrandController::class, 'store'])->name('brand.store');
Route::get('brand/remove/{id}', [BrandController::class, 'destroy'])->name('brand.destroy');
// Testimonial Routes

// Contact Message Routes
Route::get('contact', [ContactController::class, 'contact'])->name('contact');
Route::post('contact/message', [ContactController::class, 'contact_message'])->name('contact.message');
Route::get('contact/message/{id}', [ContactController::class, 'contact_details'])->name('contact.details');
Route::get('contact/message/remove/{id}', [ContactController::class, 'contact_remove'])->name('contact.remove');
// Contact Message Routes


// Website Components Routes
// Navbar Routes
Route::resource('navbar', NavbarController::class);
