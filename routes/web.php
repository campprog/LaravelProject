<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ThoughtController;
use App\Http\Controllers\UserController;
//Redirect to /cloud
Route::get('/', function () {return redirect('/cloud'); });

//Get all thoughts
Route::get('/cloud', [ThoughtController::class,'index']);

//Store new thought
Route::post('/cloud', [ThoughtController::class,'store']);

//Edit position of thought
route::patch('/cloud/{id}',[ThoughtController::class,'Update']);

//Delete thought
route::delete('/cloud/{id}',[ThoughtController::class,'destroy']);

//Show register user
route::get('/cloud/register', [UserController::class,'create']);

//Create new user
route::post('/cloud/user',[UserController::class,'store']);

//Logout user
route::post('/logout', [UserController::class,'logout']);

//Show login user
route::get('/cloud/login', [UserController::class,'login']);

//Login user
route::post('/cloud/authenticate',[UserController::class,'authenticate']);
