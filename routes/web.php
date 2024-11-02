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

// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Http;

// Route::get('/proxy/nearbysearch', function (Request $request) {
//     $latitude = $request->input('latitude');
//     $longitude = $request->input('longitude');
//     $type = $request->input('type');
//     $radius = 5000;
//     $apiKey = env('GOOGLE_MAPS_API_KEY');

//     $response = Http::get("https://maps.googleapis.com/maps/api/place/nearbysearch/json", [
//         'location' => "$latitude,$longitude",
//         'radius' => $radius,
//         'type' => $type,
//         'key' => $apiKey,
//     ]);

//     return $response->json();
// });

