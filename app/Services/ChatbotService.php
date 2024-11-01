<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;
use OpenAI;

class ChatbotService
{
    protected $client;

    public function __construct()
    {
        $this->client = OpenAI::Client(env('OPENAI_API_KEY'));
    }

    public function askQuestion(string $question)
    {
        try {
            $response = $this->client->chat()->create([
                'model' => 'gpt-3.5-turbo',
                'messages' => [
                    ['role' => 'user', 'content' => $question],
                ],
                'max_tokens' => 150,
                'temperature' => 0.7,
            ]);
    
            return $response['choices'][0]['message']['content'] ?? 'Maaf, saya tidak dapat menjawab pertanyaan ini.';
        } catch (\Exception $e) {
            // Log error
            Log::error('Error while fetching response from OpenAI: ' . $e->getMessage());
            return 'Maaf, terjadi kesalahan saat menghubungi chatbot.';
        }
    }
}
