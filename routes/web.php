<?php

use App\Models\User;
use App\Models\Multipic;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\ChangePass;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', [ContactController::class,'index']);//->middleware('check');

Route::get('/', function () {
    $brands = DB::table('brands')->get();
    //$sliders = DB::table('sliders')->get();
    $abouts = DB::table('home_abouts')->first();
    $images = Multipic::all();
    return view('home',compact('brands','abouts','images'));
});

//category controller
Route::get('/category/all',[CategoryController::class,'AllCat'])->name('all.category');
Route::post('/category/add', [CategoryController::class,'AddCat'])->name('stroe.category');
Route::get('/category/edit/{id}', [CategoryController::class,'Edit']);
Route::get('/softdelete/category/{id}', [CategoryController::class,'SoftDelete']);
Route::get('/category/restore/{id}', [CategoryController::class,'Restore']);
Route::get('/category/pdelete/{id}', [CategoryController::class,'PDelete']);
Route::post('/category/update/{id}', [CategoryController::class,'Update']);




//// for Brand Route
Route::get('/brand/all',[BrandController::class,'AllBrand'])->name('all.brand');
Route::post('/brand/add',[BrandController::class,'StoreBrand'])->name('store.brand');
Route::get('/brand/edit/{id}',[BrandController::class,'Edit']);
Route::post('/brand/delete',[BrandController::class,'BrandDelete']);
Route::post('/brand/update/{id}', [BrandController::class,'Update']);
Route::get('/brand/delete/{id}', [BrandController::class,'Delete']);


// Mulit Image Route
Route::get('/multi/images',[BrandController::class,'Multpic'])->name('multi.image');
Route::post('/multi/add',[BrandController::class,'StoreImg'])->name('store.image');

//Admin All Route
Route::get('/home/slider',[HomeController::class,'HomeSlider'])->name('home.slider');
Route::get('/add/slider',[HomeController::class,'AddSlider'])->name('add.slider');
Route::post('/store/slider',[HomeController::class,'StoreSlider'])->name('store.slider');

//Home About All Route
Route::get('/home/about',[AboutController::class,'HomeAbout'])->name('home.about');
Route::get('/add/about',[AboutController::class,'AddAbout'])->name('add.about');
Route::post('/store/about',[AboutController::class,'StoreAbout'])->name('store.about');
Route::get('/about/edit/{id}',[AboutController::class,'EditAbout']);
Route::post('/update/homeabout/{id}',[AboutController::class,'UpdateAbout']);
Route::get('/about/delete/{id}',[AboutController::class,'DeleteAbout']);


//Portfolio Route
Route::get('/portfolio',[AboutController::class,'Portfolio'])->name('portfolio');

//Admin Contact page Route
Route::get('/admin/contact',[ContactController::class,'AdminContact'])->name('admin.contact');
Route::get('/add/contact',[ContactController::class,'AddContact'])->name('add.contact');
Route::post('/store/contact',[ContactController::class,'StoreContact'])->name('store.contact');
Route::get('/admin/message',[ContactController::class,'AdminMessage'])->name('admin.message');


//Home Contact
Route::get('/contact',[ContactController::class,'Contact'])->name('contact');
Route::post('/contact/form',[ContactController::class,'ContactForm'])->name('contact.form');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
      //  $users = User::all();
    //   $users = DB::table('users')->get();
        return view('admin.index');
    })->name('dashboard');
});

Route::get('/user/logout',[BrandController::class,'Logout'])->name('user.logout');

// Change Password and user profile Route

Route::get('/user/password',[ChangePass::class,'CPassword'])->name('change.password');
Route::post('/password/update',[ChangePass::class,'UpdatePassword'])->name('password.update');

//User Profile 
Route::get('/user/profile',[ChangePass::class,'PUpdate'])->name('profile.update');
Route::post('/user/profile/update',[ChangePass::class,'UpdateProfile'])->name('update.user.profile');