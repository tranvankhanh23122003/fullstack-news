<?php

use App\Http\Controllers\categoriesController;
use App\Http\Controllers\contractController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\userController;
use Illuminate\Http\Request;
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
// Route::get('abc',[categoriesController::class,'index'])->name('admin.categories.index');
Route::prefix('admin')->group(function () {
    Route::prefix('categories')->group(function () {
        Route::get('', [categoriesController::class, 'index'])->name('admin.categories.index');
        Route::get('create', [categoriesController::class, 'create'])->name('admin.categories.create');
        Route::post('store', [categoriesController::class, 'store'])->name('admin.categories.store');
        Route::get('edit/{id}', [categoriesController::class, 'edit'])->name('admin.categories.edit');
        Route::put('update/{id}', [categoriesController::class, 'update'])->name('admin.categories.update');
        Route::get('delete/{id}', [categoriesController::class, 'delete'])->name('admin.categories.delete');
    });
    Route::prefix('post')->group(function () {
        Route::get('', [PostController::class, 'index'])->name('admin.post.index');
        Route::get('create', [PostController::class, 'create'])->name('admin.post.create');
        Route::post('store', [PostController::class, 'store'])->name('admin.post.store');
        Route::get('edit/{id}', [PostController::class, 'edit'])->name('admin.post.edit');
        Route::put('update/{id}', [PostController::class, 'update'])->name('admin.post.update');
        Route::get('delete/{id}', [PostController::class, 'delete'])->name('admin.post.delete');
    });
    Route::prefix('contract')->group(function () {
        Route::get('', [contractController::class, 'index'])->name('admin.contract.index');

        Route::get('delete/{id}', [contractController::class, 'delete'])->name('admin.contract.delete');
    });
    Route::prefix('user')->group(function () {
        Route::get('', [userController::class, 'index'])->name('admin.user.index');
        Route::get('create', [userController::class, 'create'])->name('admin.user.create');
        Route::get('store', [userController::class, 'store'])->name('admin.user.store');
        Route::get('edit/{id}', [userController::class, 'edit'])->name('admin.user.edit');
        Route::get('update/{id}', [userController::class, 'update'])->name('admin.user.update');
        Route::get('delete/{id}', [userController::class, 'delete'])->name('admin.user.delete');
    });
});
Route::get('/', function () {
    return view('welcome');
});
