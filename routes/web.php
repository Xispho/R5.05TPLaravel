<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ElevesController;
use App\Http\Controllers\ModulesController;
use App\Http\Controllers\EvaluationController;
use App\Http\Controllers\EleveEvaluationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
Route::resource('eleves', ElevesController::class);
Route::resource('modules', ModulesController::class);
Route::resource('evaluations', EvaluationController::class);
Route::resource('eleve-evaluation', EleveEvaluationController::class);

Route::get('/mauvais-eleves', [EleveEvaluationController::class, 'mauvaisEleves'])->name('mauvais-eleves');