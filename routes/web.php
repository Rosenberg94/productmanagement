<?php

use App\Http\Controllers\CategoryController;
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
Route::get('/foo', [MainController::class, 'foo'])->name('foo');
Route::get('/list', [ProductController::class, 'list'])->name('list');

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
    Route::get('/products', [ManufacturerController::class, 'products'])->name('manufacturer_products');
});

Route::group(['prefix' => 'products'], function() {
    Route::get('/manage', [ProductController::class, 'manage'])->name('manage');
    Route::get('/import', [ProductController::class, 'show'])->name('products_import');
    Route::post('/import', [ProductController::class, 'storeExcel'])->name('products_store_excel');
    Route::get('/export', [ProductController::class, 'exportExcel'])->name('products_export_excel');
});

Route::group(['prefix' => 'category'], function(){
    Route::get('/', [CategoryController::class, 'allCategories'])->name('categories');
    Route::get('/create', [CategoryController::class, 'create'])->name('category_create_form');
    Route::post('/create', [CategoryController::class, 'update'])->name('category_create');
    Route::get('/edit', [CategoryController::class, 'edit'])->name('category_edit_form');
    Route::post('/edit', [CategoryController::class, 'store'])->name('category_edit');
    Route::post('/delete', [CategoryController::class, 'destroy'])->name('category_delete');
});










