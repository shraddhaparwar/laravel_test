<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;


Route::get('/',['App\Http\Controllers\WelcomeController','index']);
Route::get('create',['App\Http\Controllers\WelcomeController','create']);
Route::get('create-file',['App\Http\Controllers\WelcomeController','createFile']);
Route::get('files',['App\Http\Controllers\WelcomeController','getFiles']);