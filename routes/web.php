<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;

Route::get('/', [PageController::class, 'show'])->defaults('slug', 'home')->name('home');
Route::get('/about', [PageController::class, 'show'])->defaults('slug', 'about')->name('about');
Route::get('/product', [PageController::class, 'product'])->name('product');
Route::get('/portfolio', [PageController::class, 'show'])->defaults('slug', 'portfolio')->name('portfolio');
Route::get('/articles', [PageController::class, 'show'])->defaults('slug', 'articles')->name('articles');
Route::get('/strategic-capabilities', [PageController::class, 'strategicCapabilities'])->name('strategic-capabilities');
Route::get('/collective-structure', [PageController::class, 'collectiveStructure'])->name('collective-structure');
Route::get('/our-work', [PageController::class, 'ourWork'])->name('our-work');
Route::get('/community', [PageController::class, 'community'])->name('community');
Route::get('/community/{slug}', [PageController::class, 'communityDetail'])->name('community-detail');
Route::get('/project/{slug}', [PageController::class, 'projectDetail'])->name('project-detail');
Route::get('/service/{slug}', [PageController::class, 'serviceDetail'])->name('service-detail');
Route::get('/team/{slug}', [PageController::class, 'teamMemberDetail'])->name('team-member-detail');

// Contact Page Routes
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::post('/contact', [PageController::class, 'submitContact'])->name('contact.submit');

// Article Detail Route - matches any article slug pattern
Route::get('/artikel/{slug}', [PageController::class, 'articleDetail'])->name('article.detail');


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

    // Projects Routes
    Route::get('/projects', [\App\Http\Controllers\Admin\ProjectController::class, 'index'])->name('admin.projects.index');
    Route::get('/projects/create', [\App\Http\Controllers\Admin\ProjectController::class, 'create'])->name('admin.projects.create');
    Route::post('/projects', [\App\Http\Controllers\Admin\ProjectController::class, 'store'])->name('admin.projects.store');
    Route::get('/projects/{id}/edit', [\App\Http\Controllers\Admin\ProjectController::class, 'edit'])->name('admin.projects.edit');
    Route::put('/projects/{id}', [\App\Http\Controllers\Admin\ProjectController::class, 'update'])->name('admin.projects.update');
    Route::delete('/projects/{id}', [\App\Http\Controllers\Admin\ProjectController::class, 'destroy'])->name('admin.projects.destroy');

    // Services Routes
    Route::get('/services', [\App\Http\Controllers\Admin\ServiceController::class, 'index'])->name('admin.services.index');
    Route::get('/services/create', [\App\Http\Controllers\Admin\ServiceController::class, 'create'])->name('admin.services.create');
    Route::post('/services', [\App\Http\Controllers\Admin\ServiceController::class, 'store'])->name('admin.services.store');
    Route::get('/services/{id}/edit', [\App\Http\Controllers\Admin\ServiceController::class, 'edit'])->name('admin.services.edit');
    Route::put('/services/{id}', [\App\Http\Controllers\Admin\ServiceController::class, 'update'])->name('admin.services.update');
    Route::delete('/services/{id}', [\App\Http\Controllers\Admin\ServiceController::class, 'destroy'])->name('admin.services.destroy');

    // Team Members Routes
    Route::get('/team-members', [\App\Http\Controllers\Admin\TeamMemberController::class, 'index'])->name('admin.team-members.index');
    Route::get('/team-members/create', [\App\Http\Controllers\Admin\TeamMemberController::class, 'create'])->name('admin.team-members.create');
    Route::post('/team-members', [\App\Http\Controllers\Admin\TeamMemberController::class, 'store'])->name('admin.team-members.store');
    Route::get('/team-members/{id}/edit', [\App\Http\Controllers\Admin\TeamMemberController::class, 'edit'])->name('admin.team-members.edit');
    Route::put('/team-members/{id}', [\App\Http\Controllers\Admin\TeamMemberController::class, 'update'])->name('admin.team-members.update');
    Route::delete('/team-members/{id}', [\App\Http\Controllers\Admin\TeamMemberController::class, 'destroy'])->name('admin.team-members.destroy');

    // Community Routes
    Route::get('/communities', [\App\Http\Controllers\Admin\CommunityController::class, 'index'])->name('admin.communities.index');
    Route::get('/communities/create', [\App\Http\Controllers\Admin\CommunityController::class, 'create'])->name('admin.communities.create');
    Route::post('/communities', [\App\Http\Controllers\Admin\CommunityController::class, 'store'])->name('admin.communities.store');
    Route::get('/communities/{id}/edit', [\App\Http\Controllers\Admin\CommunityController::class, 'edit'])->name('admin.communities.edit');
    Route::put('/communities/{id}', [\App\Http\Controllers\Admin\CommunityController::class, 'update'])->name('admin.communities.update');
    Route::delete('/communities/{id}', [\App\Http\Controllers\Admin\CommunityController::class, 'destroy'])->name('admin.communities.destroy');

    // General Information Routes
    Route::get('/general-information', [\App\Http\Controllers\Admin\GeneralInformationController::class, 'index'])->name('admin.general-information.index');
    Route::get('/general-information/edit', [\App\Http\Controllers\Admin\GeneralInformationController::class, 'edit'])->name('admin.general-information.edit');
    Route::put('/general-information', [\App\Http\Controllers\Admin\GeneralInformationController::class, 'update'])->name('admin.general-information.update');
});

Route::get('/preview/{page}', [\App\Http\Controllers\PreviewController::class, 'show']);
