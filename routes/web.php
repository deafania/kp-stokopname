<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

Route::middleware('auth')->group( function() {
    
    Route::middleware('admin')->group( function() {
        Route::get('/databarang/create', 'ItemController@create')->name('item.create');
    });
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

    Route::group(['prefix' => 'databarang', 'as' => 'item.'], function(){
        Route::get('/', 'ItemController@index')->name('index');
    
        Route::get('/jenis', 'ItemTypeController@index')->name('type.index');
        Route::get('/jenis/create', 'ItemTypeController@create')->name('type.create');
        
        Route::get('/satuan', 'ItemUnitController@index')->name('unit.index');
        Route::get('/satuan/create', 'ItemUnitController@create')->name('unit.create');
        
        Route::get('/laporan-masuk', 'ItemReportController@incoming_index')->name('report-incoming.index');
        Route::get('/laporan-keluar', 'ItemReportController@outcoming_index')->name('report-outcoming.index');
        
        Route::get('/pengelolaan/barang-masuk', 'ItemManagementController@incoming_index')->name('management-incoming.index');
        Route::get('/pengelolaan/barang-keluar', 'ItemManagementController@outcoming_index')->name('management-outcoming.index');
    });

    Route::get('/manajemen-user', 'UserManagementController@index')->name('user.index');

    Route::get('/manajemen-user/create', 'UserManagementController@create')->name('user.create');
    Route::post('/manajemen-user/store', 'UserManagementController@store')->name('user.store');
});

// Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
