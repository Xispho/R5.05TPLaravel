<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ElevesController;
use App\Http\Controllers\ModulesController;
use App\Http\Controllers\EvaluationController;
use App\Http\Controllers\EvaluationEleveController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('eleves', ElevesController::class);
Route::resource('modules', ModulesController::class);
Route::resource('evaluations', EvaluationController::class);
//Route::resource('evaluation-eleves', EvaluationEleveController::class);
