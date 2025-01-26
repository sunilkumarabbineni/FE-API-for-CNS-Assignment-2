<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class ExtractEntities extends Component
{
    public $textInput = '';             // The text input from the user
    public $entities = [];              // The extracted entities
    public $errorMessage = '';          // Error message (if any)

    // Method to send the input text to the API and extract entities
    public function extractEntities()
    {
        $this->resetErrorMessage();  // Reset any previous errors

        try {
            // Send a POST request to the API with the text input
            $response = Http::post(env('API_URL') . '/extract_entities', [
                'text' => $this->textInput,  // Pass the input text
            ]);

            // Check if the response is successful
            if ($response->successful()) {
                $data = $response->json();  // Get JSON response
                // Extract and store the entities
                $this->entities = $data['entities'] ?? [];
            } else {
                $this->errorMessage = 'Error: ' . $response->status();  // Error handling
            }
        } catch (\Exception $e) {
            // Handle any exceptions (e.g., network issues)
            $this->errorMessage = 'Error in extracting entities: ' . $e->getMessage();
        }
    }

    // Method to reset the error message
    public function resetErrorMessage()
    {
        $this->errorMessage = '';
    }

    public function render()
    {
        return view('livewire.extract-entities');
    }
}
