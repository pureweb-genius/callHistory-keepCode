<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['namespace'=>'App\Http\Controllers','middleware'=>['auth']],function(){
    Route::group(['prefix'=>'call'],function (){
         Route::get('/index','CallController@index')->name('call.index');
         Route::get('/create','CallController@create')->name('call.create');
         Route::post('/','CallController@store')->name('call.store');
         Route::delete('/{id}','CallController@destroy')->name('call.destroy');
         Route::get('/{id}/statistics/','CallController@userStatistic')->name('call.userStatistic');
         Route::get('/statistics/by-date','CallController@getStatistic')->name('call.statisticsByDate');
    });

    Route::group(['prefix'=>'operator'],function (){
       Route::get('/index','OperatorController@index')->name('operator.index');
       Route::get('/create','OperatorController@create')->name('operator.create');
         Route::post('/','OperatorController@store')->name('operator.store');
            Route::delete('/{id}','OperatorController@destroy')->name('operator.destroy');
    });

    Route::group(['prefix'=>'tariff'],function (){
        Route::get('/index','TariffController@index')->name('tariff.index');
        Route::get('/create','TariffController@create')->name('tariff.create');
        Route::post('/','TariffController@store')->name('tariff.store');
        Route::delete('/{id}','TariffController@destroy')->name('tariff.destroy');
        //edit
        Route::get('/{id}/edit','TariffController@edit')->name('tariff.edit');
        Route::put('/{id}','TariffController@update')->name('tariff.update');
    });

    Route::get('/download','DownloadController@download')->name('download.zip');
});
