<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class Chat extends Component
{
    public $message = '';          // User's message
    public $chatHistory = [];      // Store chat history (user's message + response)
    public $errorMessage = '';     // Error message (if any)

    // Method to send a message to the chat API
    public function sendMessage()
    {
        $this->resetErrorMessage();  // Reset any previous errors

        if (empty($this->message)) {
            $this->errorMessage = 'Please enter a message!';
            return;
        }

        try {
            // Send a POST request to the external API using Laravel's HTTP client
            $response = Http::post(env('API_URL') . '/chat', [
                'user_input' => $this->message  // Pass the user's message
            ]);

            // Check if the response is successful
            if ($response->successful()) {
                $data = $response->json();  // Get JSON response

                // Store the chat history (user's message + response)
                $this->chatHistory[] = [
                    'user' => $this->message,
                    'response' => $data['response'] ?? 'No response received.'
                ];

                // Reset message input after sending
                $this->message = '';
            } else {
                $this->errorMessage = 'Error: ' . $response->status();  // Error handling
            }

        } catch (\Exception $e) {
            // Handle any exceptions (e.g., network issues)
            $this->errorMessage = 'Error in fetching response: ' . $e->getMessage();
        }
    }

    // Method to reset the error message
    public function resetErrorMessage()
    {
        $this->errorMessage = '';
    }

    public function render()
    {
        return view('livewire.chat');
    }
}
