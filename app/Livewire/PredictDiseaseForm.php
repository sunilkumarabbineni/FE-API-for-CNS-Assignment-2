<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class PredictDiseaseForm extends Component
{
    public $symptoms = '';
    public $diseasePrediction = '';
    public $errorMessage = '';

    public function predictDisease()
    {
        $this->resetErrorMessage();  // Reset any previous errors
        try {
            // Send a POST request using Laravel's HTTP client
            $response = Http::post(env('API_URL').'/predict_disease', [
                'symptoms' => $this->symptoms  // Pass the symptoms data
            ]);

            // Check if the response is successful
            if ($response->successful()) {
                $data = $response->json();  // Get JSON response

                // Extract and store the disease prediction
                $this->diseasePrediction = $data['disease'];
            } else {
                $this->errorMessage = 'Error: ' . $response->status();  // Error handling
            }

        } catch (\Exception $e) {
            // Handle any exceptions (e.g., network issues)
            $this->errorMessage = 'Error in predicting disease: ' . $e->getMessage();
        }
    }

    public function resetErrorMessage()
    {
        $this->errorMessage = '';
    }

    public function render()
    {
        return view('livewire.predict-disease-form');
    }
}
