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
use App\Http\Controllers\HomeController;

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
Route::get('service/{id}', [IndexController::class, 'serviceShow'])->name('front.service.show');
Route::get('services', [IndexController::class, 'services'])->name('front.services');
Route::get('why-choose-us', [IndexController::class, 'whyChooseUs'])->name('front.why-choose-us');
Route::get('blog', [IndexController::class, 'blog'])->name('front.blog');
Route::get('blog/{slug}', [IndexController::class, 'blogShow'])->name('front.blog.show');
Route::get('blog/{category}/category', [IndexController::class, 'blogCategory'])->name('front.blog.category');






Auth::routes();
Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::middleware(['role:super.admin,manegar'])->group(function () {
        Route::get('users/data', [UserController::class, 'getData'])->name('users.data');
        Route::resource('users', UserController::class);

        Route::get('devices/data', [DeviceController::class, 'getData'])->name('device.data');
        Route::resource('device', DeviceController::class);

        Route::get('reliver/setting/{id}', [ReliverController::class, 'setting'])->name('reliver.setting');
        Route::post('reliver/setting', [ReliverController::class, 'setting'])->name('reliver.setting.update');
        Route::get('reliver/delete/{id}', [ReliverController::class, 'destroy'])->name('reliver.delete');

        Route::get('products/data', [ProductController::class, 'getData'])->name('products.data');
        Route::resource('products', ProductController::class);

        Route::get('service/data', [ServiceController::class, 'getData'])->name('service.data');
        Route::resource('service', ServiceController::class);

        Route::get('client/data', [ClientController::class, 'getData'])->name('client.data');
        Route::resource('client', ClientController::class);

        Route::get('blogs/data', [BlogController::class, 'getData'])->name('blog.data');
        Route::resource('blog', BlogController::class);

        Route::get('categories-data', [CategoryController::class, 'getData'])->name('categories.data');
        Route::resource('categories', CategoryController::class);

        Route::get('gallery/data', [GalleryController::class, 'getData'])->name('gallery.data');
        Route::resource('gallery', GalleryController::class);
    });

    Route::get('mqtt', [MqttController::class, 'index']);

    Route::get('reliver/data', [ReliverController::class, 'getData'])->name('reliver.data');
    Route::get('reliver_works/{reliver_id}', [ReliverController::class, 'getReliverApiData'])->name('reliver.apiData');
    Route::get('device/reliver/{deviceid}', [ReliverController::class, 'create'])->name('device.reliver.create');
    Route::post('reliber/send-notification', [ReliverController::class, 'sendNotification'])->name('reliver.send-notification');

    Route::resource('reliver', ReliverController::class);
});

Route::get('test', function () {
    event(new App\Events\StatusLiked('Rohit'));
    event(new App\Events\MQTTEvent('Test'));
    return response()->json(['status' => 'Event triggered']);
})->name('test');

Route::view('/pusher','pusher');

Route::view('/send-notification','send-notification');

// Route::group(['middleware' => ['role:super.admin,manegar']], function () {
// ->middleware('role:superadmin,manegar');
