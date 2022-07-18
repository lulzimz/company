<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Models\MultiImage;
use App\Models\User;
use Illuminate\Support\Facades\DB;

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

Route::get('/', function () {
    $brands = DB::table('brands')->get();
    $abouts = DB::table('home_abouts')->first();
    $images = MultiImage::all();
    return view('home', compact('brands', 'abouts', 'images'));
});


Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');


Route::get('/about', function () {
    return view('about');
})->name('about');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {

        //Eloquent way
        // $users = User::all();
        // $users = DB::table('users')->get();

        return view('admin.index');
    })->name('dashboard');
});

Route::get('/user/logout', [BrandController::class, 'Logout'])->name('logout');

Route::get('/dashboardd', function () {
    return view('dashboard');
})->name('dashboard');

//Category 
Route::get('/category/all', [CategoryController::class, 'allCategories'])->name('categories');
Route::post('/category/add', [CategoryController::class, 'addCategory'])->name('addCategory');
Route::get('category/edit/{id}', [CategoryController::class, 'Edit']);
Route::post('category/update/{id}', [CategoryController::class, 'Update']);
Route::get('category/softdelete/{id}', [CategoryController::class, 'softDelete']);
Route::get('category/restore/{id}', [CategoryController::class, 'Restore']);
Route::get('category/delete/{id}', [CategoryController::class, 'Delete']);


                                    //  ADMIN   //



                                    //      HOME      //


//Home About
Route::get('/aboutus', [AboutController::class, 'about'])->name('about');

//Home Portofolio
Route::get('portfolio', [AboutController::class, 'Portfolio'])->name('portfolio');

//Home Contact
Route::get('contact', [ContactController::class, 'Contact'])->name('contact');
//Contact Message
Route::post('contact/message', [ContactController::class, 'contactMessage'])->name('contactMessage');
