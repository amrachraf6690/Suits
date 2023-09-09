<?php

use App\Http\Controllers\ManageController;
use App\Http\Controllers\SuitsController;
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


Route::controller(SuitsController::class)->name('home.')->group(function () {
    Route::get('', 'home')->name('main');
    Route::get('/suits', 'suits')->name('suits');
    Route::get('/suit/{slug}', 'suit');
    Route::get('reserve/{slug}','reserve')->name('reserve');
    Route::post('reserve','reserveation')->name('reservation');
    Route::get('success','success')->name('success');
    Route::get('invoice/{secret_code}','invoice')->name('invoice');
});





Route::prefix('manage')->controller(ManageController::class)->name('manage.')->group(function(){
    Route::get('login','login')->name('login')->middleware('guest');
    Route::post('login','auth')->name('auth')->middleware('guest');
    Route::get('','home')->name('home');
    //Suits
    Route::get('suit/add','add_suit')->name('suit.add');
    Route::post('suit/add','store_suit')->name('suit.store');
    Route::get('suits','suits')->name('suits');
    Route::get('suit/edit/{slug}','edit_suit')->name('suit.edit');
    Route::post('suit/update','update_suit')->name('suit.update');
    Route::post('suit/delete','delete_suit')->name('suit.delete');
    Route::get('reservations','reservations')->name('reservations');
    Route::get('reservations/check','reservation_check')->name('reservation.check');
    Route::post('reservations/check','reservation_validate')->name('reservation.validate');
    Route::get('reservations/book/{secret_code}','reservation_book')->name('reservation.book');
    route::get('logout','logout')->name('logout');
    
});

