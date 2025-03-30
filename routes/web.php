<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubtitleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/subtitles', [SubtitleController::class, 'index'])->middleware(['auth', 'verified'])
->name('subtitles');

Route::get('/subtitles/download/{id}', [SubtitleController::class, 'download'])->middleware(['auth', 'verified'])->name('subtitles.download');

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/sub/create', [SubtitleController::class, 'create'])->name('sub.create');
    Route::post('/admin/subs', [SubtitleController::class, 'store'])->name('sub.store');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
