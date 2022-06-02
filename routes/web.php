<?php

use App\Http\Controllers\Front\FrontController;
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
});
Route::controller(UserController::class)->as('user.')->group(function () {
    Route::get('/login/user', 'login_page')->name('login_page');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
