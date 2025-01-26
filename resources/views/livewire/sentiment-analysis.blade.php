<div class="container mt-5">
    <h3>Sentiment Analysis</h3>

    <!-- Display error message if exists -->
    @if (session()->has('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <!-- Input Text Area for the user to enter text -->
    <div class="mb-3">
        <label for="textInput" class="form-label">Enter your text</label>
        <textarea wire:model="textInput" class="form-control" id="textInput" rows="4" placeholder="Enter text here..."></textarea>
    </div>

    <!-- Analyze Sentiment Button -->
    <button wire:click="analyzeSentiment" class="btn btn-primary">Analyze Sentiment</button>

    <!-- Display the sentiment result -->
    @if($sentimentResult)
        <div class="mt-4">
            <h4>Sentiment Analysis Result:</h4>
            <p><strong>Sentiment:</strong> {{ $sentimentResult['sentiment'] }}</p>
        </div>
    @endif

    <!-- Display error message if any -->
    @if($errorMessage)
        <div class="alert alert-danger mt-3">
            {{ $errorMessage }}
        </div>
    @endif
</div>
