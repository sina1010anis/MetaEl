<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Front\FrontController;
use App\Http\Controllers\Front\ProductController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

// Route Admin
Route::middleware(['auth' , 'role'])->controller(AdminController::class)->as('admin.')->prefix('/profile/admin')->group(function(){
    Route::get('/' , 'home')->name('home');
    Route::get('/product' , 'show_product')->name('show.product');
});

// Route Front 

Route::controller(FrontController::class)->as('home.')->group(function () {
    Route::get('/', 'home_page')->name('page');
    Route::post('/view/menu', 'view_menu')->name('view_menu');
    Route::post('/get/data/image', 'get_data_image')->name('get_data_image');
});

// Route User

Route::controller(UserController::class)->as('user.')->group(function () {
    Route::get('/register/user', 'register_page')->name('register');
    Route::get('/login/user', 'login_page')->name('login');
    Route::get('/user/home', 'home')->name('home');
    Route::middleware('auth')->group(function(){
        Route::post('/view/product/factor', 'product_factor')->name('product_factor');
        Route::post('/delete/address', 'delete_address')->name('delete_address');
        Route::get('/profile/user', 'show_profile')->name('show_profile');
        Route::get('/profile/cart', 'profile_cart')->name('profile_cart');
        Route::get('/product/return', 'product_return')->name('product_return');
        Route::post('/send/product/return', 'send_product_return')->name('send_product_return');
        Route::post('/send/edit/product/return', 'send_edit_product_return')->name('send_edit_product_return');
        Route::get('/buy/product/{code}', 'buy_product')->name('buy_product');
        Route::get('call/back/profile', 'call_back_profile')->name('call_back_profile');
        Route::post('discount/code/send', 'discount_code_send')->name('discount_code_send');
        Route::get('/profile/score', 'profile_score')->name('profile_score');
        Route::post('/send/code/discount/score' , 'send_code_discount_score')->name('send_code_discount_score');
    });
});

// Route Product

Route::controller(ProductController::class)->as('product.')->group(function () {
    Route::get('/product/{product}', 'show')->name('show');
    Route::post('/search/product', 'search')->name('search');
    Route::post('/set/price', 'set_price')->name('set_price');
    Route::post('/comment/product' , 'comment_new')->name('comment.new');
    Route::post('/reply/comment/product' , 'reply_comment_new')->name('reply.comment.new');
    Route::post('/save/product' , 'save_product')->name('save.product');
    Route::post('/set/cart' , 'set_cart')->name('set.cart');
    Route::post('/delete/product', 'delete_product')->name('delete_product');
    Route::get('/menu/{menu}', 'show_menu')->name('show_menu');
    Route::post('/sort/product' , 'sort_product')->name('sort_product');
    Route::post('/filter/product' , 'filter_product')->name('filter_product');
    Route::post('/get/product/comparison' , 'get_product_comparison')->name('get_product_comparison');
    Route::get('/{product_1}/vs/{product_2}' , 'comparison_product')->name('comparison_product');
});

Auth::routes();

Route::get('logout' , function(){
    return (auth()->check()) ? auth()->logout() : false;
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home.a');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
