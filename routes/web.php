<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\ProviderController;
use App\Http\Controllers\SectionsController;
use App\Http\Controllers\QuestionsController;
use App\Http\Controllers\WelcomeController;
Route::get('/', function () {
    return view('welcome');
});

Route::get('/welcome', [WelcomeController::class, 'index'])->name('welcome');


Route::get('/auth/{provider}/redirect', [ProviderController::class, 'redirect'])->name('auth.provider.redirect');
Route::get('/auth/{provider}/callback', [ProviderController::class, 'callback'])->name('auth.provider.callback');

Route::middleware(['auth','verified'])->group(function ( ){
    Route::resource('sections', SectionsController::class);
    Route::resource('questions', QuestionsController::class);
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
