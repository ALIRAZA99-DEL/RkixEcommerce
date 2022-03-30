<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\admin_dashbord\CategoryController;
use App\http\Controllers\product\ProductController;
use App\http\Controllers\front\IndexController;
use App\http\Controllers\cart\CartController;
use App\http\Controllers\stripe\StripeController;
use App\http\Controllers\order\OrderController;



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
    return view('welcome');
})->middleware('auth');


Route::get('shop', function () {
    return view('admin/front/.shop');
});

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home', function () {
    return view('admin.home');
})->middleware('auth');

// Category
Route::resource('categories', CategoryController::class);

Route::resource('products', ProductController::class);

Route::get('index', function () {
    return view('front.index');
});

Route::get('index',[IndexController::class,'index'])->name('index');

Route::get('add-to-cart/{id}',[CartController::class,'store'])->name('add-to-cart');
Route::get('remove/data',[CartController::class,'destroy'])->name('remove/data');
Route::get('update/data',[CartController::class,'update'])->name('update/data');


Route::get('checkout', [CartController::class, 'stripeblade']);
Route::post('stripe', [CartController::class, 'stripePost'])->name('stripe.post');

Route::get('display', function () {
    return view('stripe.products');
});

Route::get('test', function () {

    $user = [
        'name' => 'Ali Raza',
        'info' => 'Laravel Devloper'
    ];

    \Mail::to('bilal.0300.it@gmail.com')->send(new \App\Mail\FirstMail($user));

    dd("success");

});

Route::get('order', [CartController::class, 'orders'])->name('orders');
Route::get('view-details/{id}', [CartController::class, 'display'])->name('view-details');



























