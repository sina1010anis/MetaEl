<?php

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
Route::controller(FrontController::class)->as('home.')->group(function () {
    Route::get('/', 'home_page')->name('page');
    Route::post('/view/menu', 'view_menu')->name('view_menu');
    Route::post('/get/data/image', 'get_data_image')->name('get_data_image');
});
Route::controller(UserController::class)->as('user.')->group(function () {
    Route::get('/register/user', 'register_page')->name('register');
    Route::get('/login/user', 'login_page')->name('login');
    Route::get('/user/home', 'home')->name('home');
    Route::post('/view/product/factor', 'product_factor')->name('product_factor');
});
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
});
Auth::routes();
Route::get('logout' , function(){
    return (auth()->check()) ? auth()->logout() : false;
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home.a');
