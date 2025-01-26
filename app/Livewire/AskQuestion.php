<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class AskQuestion extends Component
{
    public $question = '';           // User's question
    public $answer = '';             // API response (answer)
    public $errorMessage = '';       // Error message (if any)

    // Method to send the question to the external API
    public function askQuestion()
    {
        $this->resetErrorMessage();  // Reset any previous errors
        try {
            // Send a POST request to the external API using Laravel's HTTP client
            $response = Http::post(env('API_URL') . '/ask_question', [
                'question' => $this->question  // Pass the user's question
            ]);

            // Check if the response is successful
            if ($response->successful()) {
                $data = $response->json();  // Get JSON response

                // Extract and store the answer from the response
                $this->answer = $data['answer'] ?? 'Answer not available';
            } else {
                $this->errorMessage = 'Error: ' . $response->status();  // Error handling
            }

        } catch (\Exception $e) {
            // Handle any exceptions (e.g., network issues)
            $this->errorMessage = 'Error in fetching answer: ' . $e->getMessage();
        }
    }

    // Method to reset the error message
    public function resetErrorMessage()
    {
        $this->errorMessage = '';
    }

    public function render()
    {
        return view('livewire.ask-question');
    }
}
