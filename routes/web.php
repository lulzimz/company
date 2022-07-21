<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RestController;
use App\Models\MultiImage;
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

//AdminBrand
Route::get('/brand/all', [BrandController::class, 'allBrand'])->name('brand');
Route::post('/brand/add', [BrandController::class, 'addBrand'])->name('addBrand');
Route::get('brand/edit/{id}', [BrandController::class, 'Edit']);
Route::post('brand/update/{id}', [BrandController::class, 'Update']);
Route::get('brand/delete/{id}', [BrandController::class, 'Delete']);
//Multi Image
Route::get('/multiimage', [BrandController::class, 'multiImage'])->name('multi.image');
Route::post('/multiadd', [BrandController::class, 'addMultiImage'])->name('addmulti');
Route::get('multiimage/deleteone/{id}', [BrandController::class, 'deleteMultiImage']);


//Admin Slider Routes
Route::get('/home/slider', [HomeController::class, 'HomeSlider'])->name('slider');
Route::get('add/slider', [HomeController::class, 'addSlider'])->name('addSlider');
Route::post('store/slider', [HomeController::class, 'storeSlider'])->name('storeSlider');
Route::get('slider/edit/{id}', [HomeController::class, 'Edit']);
Route::post('slider/update/{id}', [HomeController::class, 'Update']);
Route::get('slider/delete/{id}', [HomeController::class, 'Delete']);

// Admin About Routes
Route::get('/home/About', [AboutController::class, 'HomeAbout'])->name('home.about');
Route::get('/add/About', [AboutController::class, 'AddAbout'])->name('add.about');
Route::post('/store/About', [AboutController::class, 'StoreAbout'])->name('store.about');
Route::get('/about/edit/{id}', [AboutController::class, 'EditAbout']);
Route::post('/update/homeabout/{id}', [AboutController::class, 'UpdateAbout']);
Route::get('/about/delete/{id}', [AboutController::class, 'DeleteAbout']);

//Admin Contact Page 
Route::get('admin/contact', [ContactController::class, 'AdminContact'])->name('adminContact');
Route::get('add/contact', [ContactController::class, 'addContact'])->name('addContact');
Route::post('store/contact', [ContactController::class, 'storeContact'])->name('storeContact');
Route::get('edit/contact/{id}', [ContactController::class, 'editContact']);
Route::post('update/contact/{id}', [ContactController::class, 'updateContact']);
Route::get('delete/contact/{id}', [ContactController::class, 'deleteContact']);
//Admin Contact Message
Route::get('message/contact', [ContactController::class, 'adminContactMessage'])->name('adminContactMessage');
Route::get('delete/message/{id}', [ContactController::class, 'deleteContactMessage']);

//Admin Change Password
Route::get('admin/password', [ChangePasswordController::class, 'changePassword'])->name('changePassword');
Route::post('admin/password/update', [ChangePasswordController::class, 'updatePassword'])->name('passwordUpdate');

//User Profile
Route::get('admin/pofile/edit', [ChangePasswordController::class, 'editProfile'])->name('profileEdit');
Route::post('admin/pofile/update', [ChangePasswordController::class, 'profileUpdate'])->name('profileUpdate');

//AdminClients
Route::get('/client/all', [ClientController::class, 'allClients'])->name('client');
Route::post('/client/add', [ClientController::class, 'addClient'])->name('addClient');
Route::get('client/edit/{id}', [ClientController::class, 'Edit']);
Route::post('client/update/{id}', [ClientController::class, 'Update']);
Route::get('client/delete/{id}', [ClientController::class, 'Delete']);



//      HOME      //


//Home About
Route::get('/aboutus', [AboutController::class, 'about'])->name('about');

//Home Portofolio
Route::get('MultiImage', [AboutController::class, 'MultiImage'])->name('MultiImage');

//Home Contact
Route::get('contact', [ContactController::class, 'Contact'])->name('contact');
//Contact Message
Route::post('contact/message', [ContactController::class, 'contactMessage'])->name('contactMessage');

//Home Blog
Route::get('/blog', [RestController::class, 'blogs'])->name('blog');
Route::get('/blog/{id}', [RestController::class, 'showPost']);
Route::post('/blog/{id}/comments', [RestController::class, 'addCommentToPost']);
Route::get('/blog/category/{id}', [RestController::class, 'showCategory']);
Route::get('/tags/{tag}', [RestController::class, 'showPostsByTag']);



