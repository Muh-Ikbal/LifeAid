<?php

use App\Http\Controllers\ChatbotController;
use App\Http\Controllers\LocationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home.index');

Route::get('/chatbot', [ChatbotController::class, 'index'])->name('chatbot.index');
// Route::post('/chatbot/send', [ChatbotController::class, 'sendMessage']);
Route::get('/search-facilities', [ChatbotController::class, 'searchHealthcareFacilities']);

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
