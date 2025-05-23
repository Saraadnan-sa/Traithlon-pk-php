<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
use App\Http\Controllers\ContactController;

Route::post('/contact/store', [ContactController::class, 'store'])->name('contact.store');

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::get('/blog', [PageController::class, 'blog'])->name('blog');

Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
Route::post('/services', [ServiceController::class, 'store'])->name('services.store');

// Admin-only routes
// Route::middleware('admin')->group(function () {
//     Route::get('/services/create', [ServiceController::class, 'create'])->name('services.create');
//     Route::post('/services/store', [ServiceController::class, 'store'])->name('services.store');
//     Route::delete('/services/{id}', [ServiceController::class, 'destroy'])->name('services.destroy');
// });

Route::middleware('auth')->group(function () {
    Route::resource('services', ServiceController::class)->only(['index', 'create', 'store', 'destroy', 'edit', 'update']);
});

// Route::middleware('auth')->group(function () {
//     Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
//     Route::post('/services', [ServiceController::class, 'store'])->name('services.store');
// });




Route::middleware('auth')->group(function () {
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile/destroy', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/home', [PageController::class, 'home'])->name('home.page');

Route::post('/contact', [ContactController::class, 'store']);
Route::get('/dashboard', function () {
     return view('dashboard');
 })->middleware(['auth', 'verified'])->name('dashboard');

 Route::middleware('auth')->group(function () {
     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
 });

require __DIR__ . '/auth.php';
