<div class="container mt-5">
    <h3>Summarize Medical Report</h3>

    <!-- Input Text Area for the user to enter a medical report or text -->
    <div class="mb-3">
        <label for="inputText" class="form-label">Enter Text to Summarize</label>
        <textarea wire:model="inputText" class="form-control" id="inputText" rows="6" placeholder="Enter your medical report here..."></textarea>
    </div>

    <!-- Summarize Button -->
    <button wire:click="summarizeText" class="btn btn-primary">Summarize</button>

    <!-- Display the summary result -->
    @if($summary)
        <div class="mt-4">
            <h4>Summary:</h4>
            <p>{{ $summary }}</p>
        </div>
    @endif
</div>
