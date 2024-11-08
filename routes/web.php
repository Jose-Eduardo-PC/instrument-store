<?php

use App\Http\Controllers\ProfileController;
use App\Models\Content;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\InstrumentController as AdminInstrumentController;
use App\Http\Controllers\Admin\ContentController as AdminContentController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Web\ProductController as WebProductController; 
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Web\InstrumentController as WebInstrumentController; 
use App\Http\Controllers\Web\ContentController as WebContentController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('admin/instruments', AdminInstrumentController::class); 
    Route::resource('admin/contents', AdminContentController::class); 
    Route::resource('admin/categories', CategoryController::class); 
    Route::resource('admin/products', ProductController::class); 
    Route::resource('admin/orders', OrderController::class); 
    Route::resource('web/instrumentsu', WebInstrumentController::class); 
    Route::resource('web/contentsu', WebContentController::class); 
    Route::resource('web/productsu', WebProductController::class);
});

//tablas
Route::get('admin/datatables/contents', [AdminContentController::class, 'datatables'])->name('admin.contents.datatables');
Route::get('admin/datatables/instruments', [AdminInstrumentController::class, 'datatables'])->name('admin.instruments.datatables');
Route::get('admin/datatables/products', [ProductController::class, 'datatables'])->name('admin.products.datatables');

require __DIR__.'/auth.php';
