<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class Summarize extends Component
{
    public $inputText = '';    // Text input from user
    public $summary = '';      // Summarized result
    public $errorMessage = ''; // Error message (if any)

    // Method to send the request to the external API for summarization
    public function summarizeText()
    {
        $this->resetErrorMessage();  // Reset any previous errors
        try {
            // Send a POST request to the external API using Laravel's HTTP client
            $response = Http::post(env('API_URL') . '/summarize', [
                'document' => $this->inputText  // Pass the input text for summarization
            ]);

            // Check if the response is successful
            if ($response->successful()) {
                $data = $response->json();  // Get JSON response

                // Extract and store the summary result
                $this->summary = $data['summary'] ?? 'Summary not available';
            } else {
                $this->errorMessage = 'Error: ' . $response->status();  // Error handling
            }

        } catch (\Exception $e) {
            // Handle any exceptions (e.g., network issues)
            $this->errorMessage = 'Error in summarizing text: ' . $e->getMessage();
        }
    }

    // Method to reset the error message
    public function resetErrorMessage()
    {
        $this->errorMessage = '';
    }

    public function render()
    {
        return view('livewire.summarize');
    }
}
