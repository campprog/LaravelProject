<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ThoughtController;
use App\Http\Controllers\UserController;

Route::get('/cloud', [ThoughtController::class,'index']);

//Store new thought
Route::post('/cloud', [ThoughtController::class,'store'])->middleware('auth');

//Edit position of thought
route::patch('/cloud/{id}',[ThoughtController::class,'Update'])->middleware('auth');

//Delete thought
route::delete('/cloud/{id}',[ThoughtController::class,'destroy'])->middleware('auth');

//Show register user
route::get('/cloud/register', [UserController::class,'create'])->middleware('guest');

//Create new user
route::post('/cloud/user',[UserController::class,'store']);

//Logout user
route::post('/logout', [UserController::class,'logout'])->middleware('auth');

//Show login user
route::get('/cloud/login', [UserController::class,'login'])->name('login')->middleware('guest');

//Login user
route::post('/cloud/authenticate',[UserController::class,'authenticate']);
