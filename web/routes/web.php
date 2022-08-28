<?php

use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminItemController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\MypageController;
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

Route::prefix('admin')->middleware('admin')->group(function () {
    Route::get('users', [AdminUserController::class, 'index'])->name('admin.users.index');

    Route::prefix('categories')->group(function () {
        Route::get('/', [AdminCategoryController::class, 'index'])->name('admin.categories.index');
        Route::get('/create', [AdminCategoryController::class, 'create'])->name('admin.categories.create');
        Route::post('/', [AdminCategoryController::class, 'store'])->name('admin.categories.store');
        Route::get('/{id}/edit', [AdminCategoryController::class, 'edit'])->name('admin.categories.edit');
        Route::post('/{id}/update', [AdminCategoryController::class, 'update'])->name('admin.categories.update');
        Route::delete('/{id}/delete', [AdminCategoryController::class, 'destroy'])->name('admin.categories.delete');
    });

    Route::prefix('items')->group(function () {
        Route::get('/', [AdminItemController::class, 'index'])->name('admin.items.index');
        Route::get('/create', [AdminItemController::class, 'create'])->name('admin.items.create');
        Route::post('/', [AdminItemController::class, 'store'])->name('admin.items.store');
        Route::get('/{id}/edit', [AdminItemController::class, 'edit'])->name('admin.items.edit');
        Route::post('/{id}/update', [AdminItemController::class, 'update'])->name('admin.items.update');
        Route::delete('/{id}/delete', [AdminItemController::class, 'destroy'])->name('admin.items.delete');
    });
});

Route::middleware(['auth'])->group(function () {
    Route::get('items/{id}', [ItemController::class, 'show'])->name('items.show');
    Route::get('mypage', [MypageController::class, 'index'])->name('mypage');
});

Route::prefix('items')->group(function () {
    Route::get('/search', [ItemController::class, 'search'])->name('items.search');
});

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

require __DIR__ . '/auth.php';
