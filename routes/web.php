<?php

use App\Http\Controllers\ItemController;
use App\Http\Controllers\ItemIncomingManagementController;
use App\Http\Controllers\ItemOutcomingManagementController;
use App\Http\Controllers\ItemReportController;
use App\Http\Controllers\ItemUnitController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register' => false]);

// Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
Route::get('/data-barang', [ItemController::class, 'data_barang'])->name('data_barang');

Route::middleware('auth')->group( function() {
    Route::get('/databarang/qr-code', [ItemController::class, 'qr_code'])->name('qr_code');
    Route::get('/databarang/qr-code/download', [ItemController::class, 'qr_code_download'])->name('qr_code_download');

    Route::get('/databarang', [ItemController::class, 'index'])->name('databarang');
    Route::get('/databarang/create', 'ItemController@create')->name('item.create');
    Route::post('/databarang/store', 'ItemController@store')->name('item.store');
    Route::get('/databarang/{databarang}/edit', [App\Http\Controllers\ItemController::class, 'editbarang'])->name('databarang-edit-databarang');
    Route::post('/databarang/{databarang}/update', [App\Http\Controllers\ItemController::class, 'update'])->name('databarang-update-databarang');
    Route::get('/databarang/{databarang}/delete', [App\Http\Controllers\ItemController::class, 'delete'])->name('databarang-delete-databarang');
    
    Route::get('/databarangmasuk/(id_barangmasuk)/edit', [App\Http\Controllers\ItemManagementController::class, 'editbarang'])->name('databarangmasuk-edit-databarangmasuk');        
    
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    
    Route::group(['prefix' => 'databarang', 'as' => 'item.'], function(){
        Route::get('/', 'ItemController@index')->name('index');
        
        // Route::get('/{databarang:id}/edit', 'ItemController@edit')->name('edit');
        // Route::patch('/{databarang:id}/update', 'ItemController@update')->name('update');
        // Route::delete('/{databarang:id}/delete', 'ItemController@delete')->name('delete');
        
        Route::get('/nama-barang', 'ItemTypeController@index')->name('type.index');

        Route::get('/nama-barang/create', 'ItemTypeController@create')->name('type.create');
        Route::post('/nama-barang/store', 'ItemTypeController@store')->name('type.store');
        
        Route::get('/nama-barang/{id_namabarang}/edit', 'ItemTypeController@edit')->name('type.edit');
        Route::patch('/nama-barang/{id_namabarang}/update', 'ItemTypeController@update')->name('type.update');

        Route::delete('/nama-barang/{id_namabarang}/destroy', 'ItemTypeController@destroy')->name('type.destroy');

        Route::get('/satuan', 'ItemUnitController@index')->name('unit.index');
        Route::get('/satuan/create', 'ItemUnitController@create')->name('unit.create');
        Route::post('/satuan/store', [ItemUnitController::class, 'store'])->name('satuan-store');
        Route::get('/satuan/edit/{satuanbarang}', [ItemUnitController::class, 'edit'])->name('satuan-edit');
        Route::post('/satuan/edit/{satuanbarang}/update', [ItemUnitController::class, 'update'])->name('satuan-update');
        Route::get('/satuan/delete/{satuanbarang}', [ItemUnitController::class, 'delete'])->name('satuan-delete');
        
        Route::get('/laporan-masuk', 'ItemReportController@incoming_index')->name('report-incoming.index');
        Route::get('/laporan-keluar', 'ItemReportController@outcoming_index')->name('report-outcoming.index');

        Route::post('/laporan-masuk/cetak', [ItemReportController::class, 'cetak_masuk'])->name('report.in.print');
        Route::post('/laporan-keluar/cetak', [ItemReportController::class, 'cetak_keluar'])->name('report.out.print');
        
        Route::get('/pengelolaan/barang-masuk', 'ItemIncomingManagementController@index')->name('management-incoming.index');
        Route::get('/pengelolaan/barang-masuk/create', 'ItemIncomingManagementController@create')->name('management-incoming.create');
        Route::post('/pengelolaan/barang-masuk/store', 'ItemIncomingManagementController@store')->name('management-incoming.store');
        Route::get('/barangmasuk/edit/{barangmasuk}/edit', [ItemIncomingManagementController::class, 'edit'])->name('barangmasuk-edit-barangmasuk');
        Route::post('/barangmasuk/edit/{barangmasuk}/update', [ItemIncomingManagementController::class, 'update'])->name('barangmasuk-update-barangmasuk');
        Route::get('/getDataBarang/{id_namabarang}', [ItemIncomingManagementController::class, 'getDataBarang'])->name('getDataBarang');

        Route::get('/pengelolaan/barang-keluar', 'ItemOutcomingManagementController@index')->name('management-outcoming.index');
        Route::get('/pengelolaan/barang-keluar/create','ItemOutcomingManagementController@create')->name('management-outcoming.create');
        Route::post('/pengelolaan/barang-keluar/store', 'ItemOutcomingManagementController@store')->name('management-outcoming.store');
        Route::get('/getDataBarangKeluar/{id_namabarang}', [ItemOutcomingManagementController::class, 'getDataBarang'])->name('getDataBarang');
        Route::get('/barangkeluar/edit/{barangkeluar}/edit', [ItemOutcomingManagementController::class, 'edit'])->name('barangkeluar-edit-barangkeluar');
        Route::post('/barangkeluar/edit/{barangkeluar}/update', [ItemOutcomingManagementController::class, 'update'])->name('barangkeluar-update-barangkeluar');
        Route::get('/barangkeluar/{barangkeluar}/delete', [ItemOutcomingManagementController::class, 'delete'])->name('barangkeluar-delete-barangkeluar');
        
        Route::group(['middleware' => ['admin']], function () {
            Route::get('/getDataBarangKeluar/{id?}/{action}', [ItemOutcomingManagementController::class, 'action'])->name('management-outcoming.action');
        });
    });
    
    Route::get('/manajemen-user', 'UserManagementController@index')->name('user.index');
    
    Route::get('/manajemen-user/create', 'UserManagementController@create')->name('user.create');
    Route::post('/manajemen-user/store', 'UserManagementController@store')->name('user.store');

    Route::get('/manajemen-user/{user}/edit', 'UserManagementController@edit')->name('user.edit');
    Route::put('/manajemen-user/{user}/update', 'UserManagementController@update')->name('user.update');
});

// Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
