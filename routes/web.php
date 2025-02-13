<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ThoughtController;
use App\Http\Controllers\UserController;

Route::get('/cloud', [ThoughtController::class,'index']);

//Store new thought
Route::post('/cloud', [ThoughtController::class,'store'])->middleware('auth');

//Edit position of thought
Route::patch('/cloud/{id}',[ThoughtController::class,'Update'])->middleware('auth');

//Delete thought
Route::delete('/cloud/{id}',[ThoughtController::class,'destroy'])->middleware('auth');

//Show register user
Route::get('/cloud/register', [UserController::class,'create'])->middleware('guest');

//Create new user
Route::post('/cloud/user',[UserController::class,'store']);

//Show reset password
Route::get('/cloud/changePassword', [UserController::class, 'showChangePasswordForm'])->middleware('auth');

//Reset Password
Route::post('/cloud/resetPassword', [UserController::class, 'changePassword'])->middleware('auth');

//Logout user
Route::post('/cloud/logout', [UserController::class,'logout'])->middleware('auth');

//Show login user
Route::get('/cloud/login', [UserController::class,'login'])->name('login')->middleware('guest');

//Login user
Route::post('/cloud/authenticate',[UserController::class,'authenticate']);
