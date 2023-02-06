<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/',[\App\Http\Controllers\BusManagementController::class,'index'])->name('BusManagement.index');
Route::get('/Ticket',[\App\Http\Controllers\BusManagementController::class,'Show'])->name('BusManagement.Show');

Auth::routes();

Route::get('/getcity/{name?}',[\App\Http\Controllers\CityController::class, 'getCity'])->name('get.city');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home/addTrip',[\App\Http\Controllers\HomeController::class,'test'])->name('add.trip');
Route::get('/home/addTrip/getBus/{date?}',[\App\Http\Controllers\BusController::class,'getBus'])->name('get.bus');
//Route::get('/home/addTrip/getDriver/{date?}',[\App\Http\Controllers\BusController::class,'getDriver'])->name('get.driver');
Route::get('/home/addBus',[\App\Http\Controllers\HomeController::class,'addBus'])->name('add.bus');
Route::post('/home/storeTrip',[App\Http\Controllers\HomeController::class, 'storeTrip'])->name('store.trip');
Route::post('/home/storeBus',[\App\Http\Controllers\HomeController::class,'storeBus'])->name('store.bus');
Route::get('/home/seeBuses',[\App\Http\Controllers\HomeController::class,'seeBuses'])->name('see.buses');
Route::post('/home/storeTicket',[\App\Http\Controllers\HomeController::class,'storeTicket'])->name('store.ticket');
Route::delete('/home/deleteTrip',[\App\Http\Controllers\HomeController::class,'deleteTrip'])->name('trip.delete');
Route::delete('/home',[\App\Http\Controllers\HomeController::class,'deleteBus'])->name('bus.delete');

Route::get('/test',function (){
    return view('Bus.reserv');
});
