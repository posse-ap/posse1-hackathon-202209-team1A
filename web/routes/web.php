<?php

use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminItemController;
use App\Http\Controllers\Admin\AdminUsageHistoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\MypageController;
use App\Http\Controllers\UserController;
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
    Route::get('userHistory', [AdminUsageHistoryController::class, 'index'])->name('admin.userHistory.index');

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

Route::get('items/{id}', [ItemController::class, 'show'])->name('items.show');

Route::middleware(['auth'])->group(function () {
    Route::post('items/{id}', [UserController::class, 'store'])->name('application.create');
    Route::post('items/edit/{id}', [UserController::class, 'edit'])->name('application.edit');
    Route::post('items/returnItem/{id}', [UserController::class, 'returnItem'])->name('application.returnItem');
    Route::get('mypage', [MypageController::class, 'index'])->name('mypage');
    Route::post('mypage', [MypageController::class, 'edit'])->name('mypage.edit');
    Route::post('mypage/password', [MypageController::class, 'update'])->name('mypage.passwordUpdate');
});

Route::prefix('items')->group(function () {
    Route::get('search/{keyword}/{categoryId}/{availableId}/{sortId}', [ItemController::class, 'result'])->name('items.result');
    Route::get('category/{categoryId}', [ItemController::class, 'categoryList'])->name('items.categoryList');
    Route::get('latest/{categoryId}/{availableId}/{sortId}', [ItemController::class, 'latestList'])->name('items.latestList');
    Route::get('commingSoon/{categoryId}/{availableId}/{sortId}', [ItemController::class, 'commingSoonList'])->name('items.commingSoonList');
});

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::post('/', [ItemController::class, 'search'])->name('items.search');

require __DIR__ . '/auth.php';
