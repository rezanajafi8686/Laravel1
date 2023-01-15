<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Models\User;

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
    return view('welcome');
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