<?php

use App\Http\Controllers\ChatbotController;
use App\Http\Controllers\LocationController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/chatbot', [ChatbotController::class, 'index']);
// Route::post('/chatbot/send', [ChatbotController::class, 'sendMessage']);
Route::get('/search-facilities', [ChatbotController::class, 'searchHealthcareFacilities']);

Route::get('/', function () {
    return view('kamus');
});
Route::get('/course', function () {
    return view('course');
});
