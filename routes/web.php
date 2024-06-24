<?php

use App\Http\Controllers\DeviceController;
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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('users/data', [UserController::class,'getData'])->name('users.data')->middleware('auth');
Route::resource('users', UserController::class);


Route::get('devices/data', [DeviceController::class,'getData'])->name('device.data')->middleware('auth');
Route::resource('device', DeviceController::class);

Route::get('reliver/delete/{id}', [ReliverController::class,'destroy'])->name('reliver.delete')->middleware('auth');
Route::get('reliver/data', [ReliverController::class,'getData'])->name('reliver.data')->middleware('auth');
Route::get('device/reliver/{deviceid}', [ReliverController::class,'create'])->name('device.reliver.create');
Route::resource('reliver', ReliverController::class);
