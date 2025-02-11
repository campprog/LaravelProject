<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ThoughtController;

Route::get('/cloud', [ThoughtController::class,'index']);
Route::post('/cloud', [ThoughtController::class,'store']);
route::patch('/cloud/{id}',[ThoughtController::class,'Update']);
route::delete('/cloud/{id}',[ThoughtController::class,'destroy']);