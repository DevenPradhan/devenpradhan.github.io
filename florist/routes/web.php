<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Client\UserController;
use App\Http\Controllers\Admin\IndoorController;

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
    return view('home');
});

Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//Admin Side
Route::group(['middleware' => 'admin'], function() {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');

Route::get('/profile', [AdminController::class, 'profile'])->name('profile');
Route::get('/create_account', [AdminController::class, 'registration'])->name('create_account');
Route::post('/register.post', [AdminController::class, 'postRegistration'])->name('register.post');
Route::get('/users.page', [AdminController::class, 'users'])->name('users');
Route::delete('user/destroy/{id}',[AdminController::class, 'deleteUser'])->name('user.destroy');
Route::get('add_items', [AdminController::class, 'addItems'])->name('add_items');

//Indoor items
Route::get('/indoor', [App\Http\Controllers\Admin\IndoorController::class, 'index'])->name('get_indoor');
Route::post('add_indoor', [IndoorController::class, 'addIndoor'])->name('add_indoor');

});

// Client Side
Route::group(['middleware' => 'auth'], function() {
    Route::get('/user',[UserController::class, 'index'])->name('user');
Route::get('/user.profile', [UserController::class, 'profile'])->name('user.profile');
Route::get('/edit', [UserController::class, 'full_profile'])->name('edit_info');
Route::post('/info.edit', [UserController::class, 'edit'])->name('update');
Route::get('/upload', [UserController::class, 'upload'])->name('upload');
});

