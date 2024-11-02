<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/kamus', function () {
    return view('kamus');
});
Route::get('/course', function () {
    return view('course');
});
