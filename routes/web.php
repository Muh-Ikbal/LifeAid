<?php

use App\Http\Controllers\ChatbotController;
use App\Http\Controllers\KamusController;
use App\Http\Controllers\LocationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home.index');

Route::get('/chatbot', [ChatbotController::class, 'index'])->name('chatbot.index');
// Route::post('/chatbot/send', [ChatbotController::class, 'sendMessage']);
Route::get('/search-facilities', [ChatbotController::class, 'searchHealthcareFacilities']);

Route::get('/kamus', [KamusController::class, 'index']);
Route::get('/course', function () {
    return view('course');
});
Route::get('/course/lesson', function () {
    return view('lesson');
});
Route::get('/kamus/instruksi/{id}', [KamusController::class, 'insturksi']);

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

Route::get('/nearby-facilities', function (Request $request) {
    $lat = $request->query('lat');
    $lon = $request->query('lon');
    $apiKey = env('TOMTOM_API_KEY'); // Pastikan API Key TomTom sudah disimpan di .env

    $response = Http::get("https://api.tomtom.com/search/2/poiSearch/health.json", [
        'key' => $apiKey,
        'lat' => $lat,
        'lon' => $lon,
        'radius' => 5000, // Radius pencarian dalam meter, sesuaikan dengan kebutuhan Anda
        'limit' => 10, // Batas jumlah hasil
    ]);

    return $response->json();
});