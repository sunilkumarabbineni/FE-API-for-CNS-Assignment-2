<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class SentimentAnalysis extends Component
{
    public $textInput = '';          // User's input text for sentiment analysis
    public $sentimentResult = null;  // Sentiment result (positive/negative/neutral)
    public $errorMessage = '';       // Error message (if any)

    // Method to send the text input to the external sentiment analysis API
    public function analyzeSentiment()
    {
        $this->resetErrorMessage();  // Reset any previous errors

        try {
            // Send a POST request to the external sentiment analysis API using API_URL from the .env file
            $response = Http::post(env('API_URL') . '/sentiment', [
                'feedback' => $this->textInput  // Pass the input text
            ]);
            // Check if the response is successful
            if ($response->successful()) {
                $data = $response->json();  // Get JSON response
                // Extract and store the sentiment result and confidence score
                $this->sentimentResult = [
                    'sentiment' => $data['sentiment'],  // Sentiment value (positive/negative/neutral)
                ];
            } else {
                $this->errorMessage = 'Error: ' . $response->status();  // Error handling
            }

        } catch (\Exception $e) {
            // Handle any exceptions (e.g., network issues)
            $this->errorMessage = 'Error in analyzing sentiment: ' . $e->getMessage();
        }
    }

    // Method to reset the error message
    public function resetErrorMessage()
    {
        $this->errorMessage = '';
    }

    public function render()
    {
        return view('livewire.sentiment-analysis');
    }
}
