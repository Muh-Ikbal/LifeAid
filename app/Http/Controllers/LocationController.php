<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class LocationController extends Controller
{
    public function searchHealthcareFacilities(Request $request)
    {
        $locationQuery = $request->input('query', 'rumah sakit');

        // URL untuk Nominatim API
        $url = "https://nominatim.openstreetmap.org/search?q=" . urlencode($locationQuery) . "&format=json&limit=5&addressdetails=1";

        // Mengirimkan permintaan ke Nominatim
        $response = Http::get($url);

        if ($response->successful()) {
            $results = $response->json();

            return response()->json([
                'status' => 'success',
                'data' => $results
            ]);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'Gagal mengambil data dari Nominatim API.'
        ], 500);
    }
}
