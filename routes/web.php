<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController as S;
use App\Http\Controllers\Admin\{AuthController, DashboardController, PageController, ResourceController};

// ---------- Public website ----------
Route::get('/', [S::class, 'home'])->name('home');
Route::get('/product-services', [S::class, 'products'])->name('products');
Route::get('/about-us', [S::class, 'about'])->name('about');
Route::get('/career', [S::class, 'career'])->name('career');
Route::post('/career/apply', [S::class, 'apply'])->name('career.apply');
Route::get('/career/{opening:slug}', [S::class, 'opening'])->name('career.show');
Route::get('/blog', [S::class, 'blog'])->name('blog');
Route::get('/blog/{post:slug}', [S::class, 'post'])->name('blog.show');
Route::get('/contact', [S::class, 'contact'])->name('contact');
Route::post('/contact', [S::class, 'send'])->name('contact.send');
Route::post('/subscribe', [S::class, 'subscribe'])->name('subscribe');

// ---------- Admin / CMS ----------
Route::get('/admin/login', [AuthController::class, 'form'])->name('login');
Route::post('/admin/login', [AuthController::class, 'login']);
Route::post('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('applications/{id}/resume', [DashboardController::class, 'resume'])->name('resume');
    Route::get('pages/{page}', [PageController::class, 'edit'])->name('pages.edit');
    Route::post('pages/{page}', [PageController::class, 'update'])->name('pages.update');
    Route::get('r/{res}', [ResourceController::class, 'index'])->name('res.index');
    Route::get('r/{res}/create', [ResourceController::class, 'create'])->name('res.create');
    Route::post('r/{res}', [ResourceController::class, 'store'])->name('res.store');
    Route::get('r/{res}/{id}', [ResourceController::class, 'show'])->name('res.show');
    Route::get('r/{res}/{id}/edit', [ResourceController::class, 'edit'])->name('res.edit');
    Route::put('r/{res}/{id}', [ResourceController::class, 'update'])->name('res.update');
    Route::delete('r/{res}/{id}', [ResourceController::class, 'destroy'])->name('res.destroy');
});
