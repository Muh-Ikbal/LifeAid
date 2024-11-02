<?php

use App\Http\Controllers\ChatbotController;
use App\Http\Controllers\KamusController;
use App\Http\Controllers\LocationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/chatbot', [ChatbotController::class, 'index']);
// Route::post('/chatbot/send', [ChatbotController::class, 'sendMessage']);
Route::get('/search-facilities', [ChatbotController::class, 'searchHealthcareFacilities']);

Route::get('/kamus', [KamusController::class,'index']);
Route::get('/course', function () {
    return view('course');
});
Route::get('/course/lesson', function () {
    return view('lesson');
});
Route::get('/kamus/instruksi/{id}', [KamusController::class, 'insturksi']);
