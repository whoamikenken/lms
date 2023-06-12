<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    //
    public function sendMessage(Request $request)
    {
        // Retrieve the user's message from the request
        $message = $request->input('message');
        // dd($message);
        // $message = "Hello what are you?";

        // Call the ChatGPT API
        $response = $this->callChatGPTAPI($message);

        // Extract the generated response from the API
        $generatedResponse = $response['choices'][0]['text'];

        // Return the response to the user
        return response()->json(['message' => $generatedResponse]);
    }

    private function callChatGPTAPI($message)
    {
        $client = new Client();

        // API endpoint and headers
        $url = 'https://api.openai.com/v1/completions';
        $headers = [
            'Authorization' => 'Bearer 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',
            'Content-Type' => 'application/json',
        ];

        // Request payload
        $data = [
            "model" => "text-davinci-003",
            "prompt" => $message,
            "temperature" => 0.6,
            "max_tokens" => 1097,
            "top_p" => 1,
            "frequency_penalty" => 0,
            "presence_penalty" => 0
        ];

        // Send the request to the API
        $response = $client->post($url, [
            'headers' => $headers,
            'json' => $data,
        ]);

        // Decode the response JSON
        return json_decode($response->getBody(), true);
    }
}
