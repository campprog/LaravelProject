<?php

use Illuminate\Support\Facades\Route;
use Illuminate\http\Request;    

Route::get('/', function () {
    return view('welcome');
});
