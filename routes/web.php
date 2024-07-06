<?php

use App\Http\Controllers\DeviceController;
use App\Http\Controllers\MqttController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReliverController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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
});

Auth::routes();
Route::prefix('admin')->group(function () {


    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');

    Route::get('users/data', [UserController::class, 'getData'])->name('users.data')->middleware('auth');
    Route::resource('users', UserController::class)->middleware('auth', 'role:super.admin,manager');


    Route::get('devices/data', [DeviceController::class, 'getData'])->name('device.data')->middleware('auth', 'role:super.admin,manager');
    Route::resource('device', DeviceController::class)->middleware('role:super.admin,manager', 'auth');

    Route::get('reliver/delete/{id}', [ReliverController::class, 'destroy'])->name('reliver.delete')->middleware('role:super.admin,manager', 'auth');

    Route::get('mqtt', [MqttController::class, 'index'])->middleware('auth');
    Route::get('reliver/data', [ReliverController::class, 'getData'])->name('reliver.data')->middleware('role:super.admin,manager', 'auth');
    Route::get('reliver_works/{reliver_id}', [ReliverController::class, 'getReliverApiData'])->name('reliver.apiData')->middleware('auth');;
    Route::get('device/reliver/{deviceid}', [ReliverController::class, 'create'])->name('device.reliver.create')->middleware('auth');;
    Route::resource('reliver', ReliverController::class)->middleware('auth');
    Route::get('products/data', [ProductController::class, 'getData'])->name('products.data')->middleware('auth');
    Route::resource('products', ProductController::class)->middleware('auth');
});

// Route::group(['middleware' => ['role:super.admin,manager']], function () {
// ->middleware('role:superadmin,manager');
