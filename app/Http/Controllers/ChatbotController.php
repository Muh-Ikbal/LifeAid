<?php

namespace App\Http\Controllers;

use Google\Cloud\Dialogflow\V2\SessionsClient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ChatbotController extends Controller
{
    public function index() {
        return view('chatbot.index');
    }

    public function sendMessage(Request $request)
    {
        $message = $request->input('message');
        $projectId = 'starlit-rite-440413-b2'; // Ganti dengan ID proyek Dialogflow Anda
        
        try {
            $response = $this->detectIntent($projectId, $message);
            return response()->json(['response' => $response]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    

    private function detectIntent($projectId, $text, $sessionId = '123456')
    {
        $sessionsClient = new SessionsClient();
        $session = $sessionsClient->sessionName($projectId, $sessionId);

        $textInput = (new \Google\Cloud\Dialogflow\V2\TextInput())
            ->setText($text)
            ->setLanguageCode('id'); // Gunakan 'id' untuk Bahasa Indonesia

        $queryInput = (new \Google\Cloud\Dialogflow\V2\QueryInput())
            ->setText($textInput);

        $response = $sessionsClient->detectIntent($session, $queryInput);
        $sessionsClient->close();

        return $response->getQueryResult()->getFulfillmentText();
    }

    public function searchHealthcareFacilities(Request $request)
    {
        $locationQuery = $request->input('query', 'rumah sakit');
        $latitude = $request->input('latitude');
        $longitude = $request->input('longitude');
    
        // Jika koordinat tidak tersedia, gunakan lokasi default atau tampilkan pesan error
        if (!$latitude || !$longitude) {
            return response()->json([
                'status' => 'error',
                'message' => 'Koordinat lokasi tidak tersedia.'
            ], 400);
        }
    
        // URL untuk Nominatim API dengan koordinat pengguna
        $url = "https://nominatim.openstreetmap.org/search?q=" . urlencode($locationQuery)
            . "&format=json&limit=1&addressdetails=0"
            . "&lat=" . $latitude
            . "&lon=" . $longitude;
    
        $response = Http::get($url);
    
        if ($response->successful()) {
            $result = $response->json();
    
            if (count($result) > 0) {
                $latitude = $result[0]['lat'];
                $longitude = $result[0]['lon'];
    
                // Menghasilkan link OpenStreetMap
                $locationLink = "https://www.openstreetmap.org/?mlat={$latitude}&mlon={$longitude}#map=15/{$latitude}/{$longitude}";
    
                return response()->json([
                    'status' => 'success',
                    'link' => $locationLink
                ]);
            }
    
            return response()->json([
                'status' => 'error',
                'message' => 'Lokasi tidak ditemukan.'
            ], 404);
        }
    
        return response()->json([
            'status' => 'error',
            'message' => 'Gagal mengambil data dari Nominatim API.'
        ], 500);
    }
    
}
