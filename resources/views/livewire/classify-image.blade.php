<div class="container mt-5">
    <h3>Classify an Image</h3>

    <!-- Display error message if exists -->
    @if ($errorMessage)
        <div class="alert alert-danger">
            {{ $errorMessage }}
        </div>
    @endif

    <!-- Image Upload Form -->
    <div class="mb-3">
        <label for="image" class="form-label">Choose an image to classify</label>
        <input type="file" wire:model="image" class="form-control" id="image" accept="image/*">
        @error('image')
            <div class="alert alert-danger mt-2">{{ $message }}</div>
        @enderror
    </div>

    <!-- Button to trigger classification -->
    <button wire:click="classifyImage" class="btn btn-primary">Classify Image</button>

    <!-- Display the classification result -->
    @if($classification)
        <div class="mt-4">
            <h4>Classification Result:</h4>
            <p>{{ $classification }}</p>
        </div>
    @endif
</div>
