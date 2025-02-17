<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\NoteController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\TechnologyController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\ApplicationSetupController;


Route::prefix('admin')->middleware(['role:super-admin|admin|staff|user'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class)->except('show');
    Route::resource('users', UserController::class);
    Route::resource('notes', NoteController::class);
    Route::get('settings/organization', [ApplicationSetupController::class, 'index'])
        ->name('applicationSetup.index');
    Route::post('settings/organization', [ApplicationSetupController::class, 'update'])
        ->name('applicationSetup.update');

    // content management
    Route::resource('banners', BannerController::class);
    Route::resource('services', ServiceController::class);
    Route::resource('products', ProductController::class);
    Route::resource('teams', TeamController::class);
    Route::resource('testimonials', TestimonialController::class);
    Route::resource('blogs', BlogController::class);
    Route::resource('technologies', TechnologyController::class);
});
