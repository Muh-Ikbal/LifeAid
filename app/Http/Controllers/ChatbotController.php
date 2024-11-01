<?php

namespace App\Http\Controllers;

use Google\Cloud\Dialogflow\V2\SessionsClient;
use Illuminate\Http\Request;

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
}
