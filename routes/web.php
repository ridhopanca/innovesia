<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', [\App\Http\Controllers\PageController::class, 'show'])->defaults('slug', 'home')->name('home');
Route::get('/about', [\App\Http\Controllers\PageController::class, 'show'])->defaults('slug', 'about')->name('about');
Route::get('/product', [\App\Http\Controllers\PageController::class, 'show'])->defaults('slug', 'product')->name('product');
Route::get('/portfolio', [\App\Http\Controllers\PageController::class, 'show'])->defaults('slug', 'portfolio')->name('portfolio');
Route::get('/articles', [\App\Http\Controllers\PageController::class, 'show'])->defaults('slug', 'articles')->name('articles');
Route::get('/community', [\App\Http\Controllers\PageController::class, 'show'])->defaults('slug', 'community')->name('community');

// Contact Page Routes
Route::get('/contact', [\App\Http\Controllers\PageController::class, 'contact'])->name('contact');
Route::post('/contact', [\App\Http\Controllers\PageController::class, 'submitContact'])->name('contact.submit');

// Article Detail Route - matches any article slug pattern
Route::get('/artikel/{slug}', [\App\Http\Controllers\PageController::class, 'articleDetail'])->name('article.detail');


Route::middleware('auth')->group(function () {
    Route::get('/update-profile', [AuthController::class, 'showUpdateProfile']);
    Route::put('/update-profile', [AuthController::class, 'updateProfile']);
});

// Admin Auth Routes (no auth required)
Route::prefix('cms')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

// Admin Routes (auth required)
Route::prefix('cms')->middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::get('/', [\App\Http\Controllers\Admin\PageController::class, 'index'])->name('admin.pages.index');
    Route::get('/pages/{slug}', [\App\Http\Controllers\Admin\PageController::class, 'edit'])->name('admin.pages.edit');

    Route::post('/sections/{section}', [\App\Http\Controllers\Admin\SectionController::class, 'updateDraft'])->name('admin.sections.update');
    Route::post('/pages/{slug}/publish', [\App\Http\Controllers\Admin\PageController::class, 'publish'])->name('admin.pages.publish');

    // General Information Routes
    Route::get('/general-information', [\App\Http\Controllers\Admin\GeneralInformationController::class, 'index'])->name('admin.general-information.index');
    Route::get('/general-information/edit', [\App\Http\Controllers\Admin\GeneralInformationController::class, 'edit'])->name('admin.general-information.edit');
    Route::put('/general-information', [\App\Http\Controllers\Admin\GeneralInformationController::class, 'update'])->name('admin.general-information.update');
});

Route::get('/preview/{page}', [\App\Http\Controllers\PreviewController::class, 'show']);
