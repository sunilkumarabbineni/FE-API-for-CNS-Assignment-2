<div class="container mt-5">
    <h3>Ask a Question</h3>

    <!-- Display error message if exists -->
    @if (session()->has('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <!-- Input Text Area for the user to enter a question -->
    <div class="mb-3">
        <label for="question" class="form-label">Ask your question</label>
        <input type="text" wire:model="question" class="form-control" id="question" placeholder="Enter your question here...">
    </div>

    <!-- Ask Button -->
    <button wire:click="askQuestion" class="btn btn-primary">Ask Question</button>

    <!-- Display the answer result -->
    @if($answer)
        <div class="mt-4">
            <h4>Answer:</h4>
            <p>{{ $answer }}</p>
        </div>
    @endif

    <!-- Display error message if any -->
    @if($errorMessage)
        <div class="alert alert-danger mt-3">
            {{ $errorMessage }}
        </div>
    @endif
</div>
