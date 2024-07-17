<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MqttController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReliverController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\Front\IndexController;
use App\Http\Controllers\GalleryController;

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


Route::get('/', [IndexController::class, 'index'])->name('front.index');
Route::get('products', [IndexController::class, 'products'])->name('front.products');
Route::get('product/{id}', [IndexController::class, 'productShow'])->name('front.product.show');
Route::get('service/{id}', [IndexContrreliveroller::class, 'serviceShow'])->name('front.service.show');
Route::get('services', [IndexController::class, 'services'])->name('front.services');
Route::get('why-choose-us', [IndexController::class, 'whyChooseUs'])->name('front.why-choose-us');
Route::get('blog', [IndexController::class, 'blog'])->name('front.blog');
Route::get('blog/{slug}', [IndexController::class, 'blogShow'])->name('front.blog.show');
Route::get('blog/{category}/category', [IndexController::class, 'blogCategory'])->name('front.blog.category');






Auth::routes();
Route::prefix('admin')->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
    Route::get('users/data', [UserController::class, 'getData'])->name('users.data')->middleware('auth');
    Route::resource('users', UserController::class)->middleware('role:super.admin,manager','auth');


    Route::get('devices/data', [DeviceController::class, 'getData'])->name('device.data')->middleware('role:super.admin,manager','auth');
    Route::resource('device', DeviceController::class)->middleware('role:super.admin,manager', 'auth');

    Route::get('reliver/delete/{id}', [ReliverController::class, 'destroy'])->name('reliver.delete')->middleware('role:super.admin,manager', 'auth');
    Route::get('mqtt', [MqttController::class, 'index'])->middleware('auth');
    Route::get('reliver/data', [ReliverController::class, 'getData'])->name('reliver.data')->middleware('auth');
    Route::get('reliver_works/{reliver_id}', [ReliverController::class, 'getReliverApiData'])->name('reliver.apiData')->middleware('auth');;
    Route::get('device/reliver/{deviceid}', [ReliverController::class, 'create'])->name('device.reliver.create')->middleware('auth');;
    Route::resource('reliver', ReliverController::class);

    Route::get('products/data', [ProductController::class, 'getData'])->name('products.data')->middleware('role:super.admin,manager', 'auth');
    Route::resource('products', ProductController::class)->middleware('role:super.admin', 'auth');
    Route::get('service/data', [ServiceController::class, 'getData'])->name('service.data')->middleware('role:super.admin,manager', 'auth');
    Route::resource('service', ServiceController::class)->middleware('role:super.admin', 'auth');
    Route::get('client/data', [ClientController::class, 'getData'])->name('client.data')->middleware('role:super.admin,manager', 'auth');
    Route::resource('client', ClientController::class)->middleware('role:super.admin', 'auth');

    Route::get('blogs/data', [BlogController::class, 'getData'])->name('blog.data');
    Route::resource('blog', BlogController::class)->middleware('role:super.admin','auth');

    Route::get('categories-data', [CategoryController::class, 'getData'])->name('categories.data');
    Route::resource('categories', CategoryController::class)->middleware('role:super.admin','auth');

    Route::get('gallery/data', [GalleryController::class, 'getData'])->name('gallery.data');
    Route::resource('gallery', GalleryController::class)->middleware('role:super.admin','auth');

});

// Route::group(['middleware' => ['role:super.admin,manager']], function () {
// ->middleware('role:superadmin,manager');
