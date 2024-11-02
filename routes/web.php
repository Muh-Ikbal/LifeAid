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
Route::get('/course/lesson', function () {
    return view('lesson');
});
Route::get('/kamus/instruksi', function () {
    return view('instruksi');
});
