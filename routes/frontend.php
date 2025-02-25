<?php

use App\Http\Controllers\Frontend\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('frontend.home')->middleware('usersVisited');
Route::get('/service', [HomeController::class, 'service'])->name('frontend.service');
Route::get('/service/{service}', [HomeController::class, 'serviceSingle'])->name('frontend.serviceSingle');
Route::get('/about', [HomeController::class, 'about'])->name('frontend.about');
Route::get('/blog', [HomeController::class, 'blog'])->name('frontend.blog');
Route::get('/contact', [HomeController::class, 'contact'])->name('frontend.contact');
Route::get('/products', [HomeController::class, 'products'])->name('frontend.products');
Route::get('/product/{product}', [HomeController::class, 'productSingle'])->name('frontend.productSingle');
Route::post('/update-content', [HomeController::class, 'updateContent'])->name('frontend.updateContent');
Route::get('/get-content', [HomeController::class, 'getContent'])->name('frontend.getContent');
Route::post('/send-email', [HomeController::class, 'sendEmail'])->name('frontend.sendEmail');
