<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class ClassifyImage extends Component
{
    use WithFileUploads;

    public $image;              // The image file uploaded by the user
    public $classification = ''; // The classification result from the API
    public $errorMessage = '';   // Error message (if any)

    // Method to upload and classify the image
    public function classifyImage()
    {
        $this->resetErrorMessage();  // Reset any previous errors

        // Validate the uploaded image
        $this->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10240',  // 10MB max
        ]);

        try {
            // Store the uploaded image in the 'public' disk
            $path = $this->image->store('images', 'public');
            // Generate the temporary URL for the uploaded image (valid for 5 minutes)
            $temporaryUrl = url($path);
            // Send a POST request to the external API using Laravel's HTTP client
            $response = Http::post(env('API_URL') . '/classify_image', [
                'image_url' => $temporaryUrl  // Pass the temporary URL
            ]);
            // Check if the response is successful
            if ($response->successful()) {
                $data = $response->json();  // Get JSON response
                // Extract and store the classification result
                $this->classification = $data['predictions'][0]['label'] ?? 'Classification not available';
            } else {
                $this->errorMessage = 'Error: ' . $response->status();  // Error handling
            }

        } catch (\Exception $e) {
            // Handle any exceptions (e.g., network issues)
            $this->errorMessage = 'Error in classifying image: ' . $e->getMessage();
        }
    }

    // Method to reset the error message
    public function resetErrorMessage()
    {
        $this->errorMessage = '';
    }

    // Render method to display the Livewire component
    public function render()
    {
        return view('livewire.classify-image');
    }
}
