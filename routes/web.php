<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;

// Route untuk halaman utama
Route::get('/', [IndexController::class, 'index'])->name('home');

// Route untuk halaman News
Route::get('/news', [NewsController::class, 'news'])->name('news');

// Route untuk halaman Domestic
Route::get('/domestic', [NewsController::class, 'domestic'])->name('domestic');

// Route untuk halaman Detail
Route::get('/detail/{id}', [NewsController::class, 'show'])->name('detail');


Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/login');
})->name('logout');

Route::post('/domestic', [NewsController::class, 'storeKonsultasi'])->name('konsultasi.store');
Route::post('/konsultasi', [NewsController::class, 'storeKonsultasi'])->name('konsultasi.store');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('/admin/news', AdminNewsController::class);
});

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::resource('news', AdminNewsController::class);
});

Route::delete('/admin/news/{id}', [NewsController::class, 'destroy'])->name('news.destroy');


Route::get('/search', [NewsController::class, 'search'])->name('search');
