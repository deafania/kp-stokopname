<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

Route::get('/databarang', 'ItemController@index')->name('item.index');
Route::get('/databarang/create', 'ItemController@create')->name('item.create');

Route::get('/databarang/jenis', 'ItemTypeController@index')->name('item.type.index');
Route::get('/databarang/jenis/create', 'ItemTypeController@create')->name('item.type.create');

Route::get('/databarang/satuan', 'ItemUnitController@index')->name('item.unit.index');
Route::get('/databarang/satuan/create', 'ItemUnitController@create')->name('item.unit.create');
// Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
