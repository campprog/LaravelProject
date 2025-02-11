<?php

use Illuminate\Support\Facades\Route;
use Illuminate\http\Request;    
use App\Http\Controllers\ThoughtController;
use app\Models\Thought;
Route::get('/cloud', [ThoughtController::class,'index']);
Route::post('/cloud', [ThoughtController::class,'store']);