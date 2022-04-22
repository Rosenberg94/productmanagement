<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ManufacturerController;
use App\Http\Controllers\ProductController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Facades\Excel;

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

Route::get('/', [MainController::class, 'index'])->name('main');
Route::get('/list', [ProductController::class, 'list'])->name('list');
Route::get('/foo', [MainController::class, 'foo'])->name('foo');


Route::group(['prefix' => 'product'], function(){
    Route::get('/create', [ProductController::class, 'create'])->name('create');
    Route::post('/store', [ProductController::class, 'store'])->name('store');
    Route::get('/edit', [ProductController::class, 'edit'])->name('edit');
    Route::post('/edit', [ProductController::class, 'update'])->name('update');
});


Route::group(['prefix' => 'manufacturer'], function(){
    Route::get('/create', [ManufacturerController::class, 'create'])->name('manufacturer_create');
    Route::post('/store', [ManufacturerController::class, 'store'])->name('manufacturer_store');
    Route::get('/edit', [ManufacturerController::class, 'edit'])->name('manufacturer_edit');
    Route::post('/edit', [ManufacturerController::class, 'update'])->name('manufacturer_update');
    Route::get('/list', [ManufacturerController::class, 'list'])->name('manufacturer_list');
});


Route::get('/products/import', [ProductController::class, 'show'])->name('products_import');
Route::post('/products/import', [ProductController::class, 'storeExcel'])->name('products_store_excel');











