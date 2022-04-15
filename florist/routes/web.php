<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Client\UserController;
use App\Http\Controllers\Admin\IndoorController;
use App\Http\Controllers\Admin\RequestsController;
use App\Http\Controllers\Admin\AccessoryController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\Admin\OutdoorController;
use App\Http\Controllers\Client\InventoryController;
Use App\Http\Controllers\Client\ItemRequestController;
use App\Http\Controllers\Client\ClientItemController;

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

Route::resource('photos', PhotoController::class);

//Admin Side
Route::group(['middleware' => 'admin'], function() {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');

Route::get('/profile', [AdminController::class, 'profile'])->name('profile');
Route::get('/create_account', [AdminController::class, 'registration'])->name('create_account');
Route::post('/register.post', [AdminController::class, 'postRegistration'])->name('register.post');
Route::get('/users.page', [AdminController::class, 'users'])->name('users');
Route::delete('user/destroy/{id}',[AdminController::class, 'deleteUser'])->name('user.destroy');

// Upload Requests
Route::get('requests.get', [RequestsController::class, 'index'])->name('get.requests');
Route::post('request.approve/{id}', [RequestsController::class, 'approveRequest'])->name('request.approve');
Route::post('request.reject/{id}', [RequestsController::class, 'rejectRequest'])->name('request.reject');

//Indoor items
Route::get('/indoor', [IndoorController::class, 'index'])->name('get_indoor');
Route::post('add_indoor', [IndoorController::class, 'addIndoor'])->name('add_indoor');
Route::get('indoor/view', [IndoorController::class, 'view']);
Route::post('update_indoor', [IndoorController::class, 'updateIndoor'])->name('update_indoor');
Route::delete('indoor.destroy/{id}', [IndoorController::class, 'destroy_indoor'])->name('indoor.destroy');
Route::post('upload.photo.indoor', [IndoorController::class, 'uploadPhoto'])->name('upload.photo.indoor');

//Outdoor items
Route::get('/outdoor', [OutdoorController::class, 'index'])->name('get_outdoor');
Route::post('add_outdoor', [OutdoorController::class, 'addOutdoor'])->name('add_outdoor');
Route::get('outdoor/view', [OutdoorController::class, 'view']);
Route::post('update_outdoor', [OutdoorController::class, 'updateOutdoor'])->name('update_outdoor');
Route::delete('outdoor.destroy/{id}', [OutdoorController::class, 'destroy_outdoor'])->name('outdoor.destroy');
Route::post('upload.photo.outdoor', [OutdoorController::class, 'uploadPhoto'])->name('upload.photo.outdoor');
});


//accessories
Route::get('accessories', [AccessoryController::class, 'index'])->name('accessories');
Route::post('add_accessory', [AccessoryController::class, 'addAccessory'])->name('add_accessory');

// Client Side
Route::group(['middleware' => 'auth'], function() {
    Route::get('/user',[UserController::class, 'index'])->name('user');
Route::get('/user.profile', [UserController::class, 'profile'])->name('user.profile');
Route::get('/edit', [UserController::class, 'full_profile'])->name('edit_info');
Route::post('/info.edit', [UserController::class, 'edit'])->name('update');

Route::get('list.indoor', [InventoryController::class, 'indoors'])->name('get.indoors.list');
Route::get('list.outdoor', [InventoryController::class, 'outdoors'])->name('get.outdoors.list');
Route::get('list.accessories', [InventoryController::class, 'accessories'])->name('get.accessories.list');

Route::get('user.items', [ClientItemController::class, 'index'])->name('user.items');

Route::get('request.items', [ItemRequestController::class, 'index'])->name('request.items');
Route::post('request.items', [ItemRequestController::class, 'upload'])->name('upload');
});

