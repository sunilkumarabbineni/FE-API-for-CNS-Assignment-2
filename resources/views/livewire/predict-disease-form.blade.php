<div class="container mt-5">
    <h2>Predict Disease Based on Symptoms</h2>

    <form wire:submit.prevent="predictDisease">
        <div class="mb-3">
            <label for="symptoms" class="form-label">Enter Symptoms (comma-separated):</label>
            <input type="text" class="form-control" id="symptoms" wire:model="symptoms" required>
        </div>

        @if ($errorMessage)
            <div class="alert alert-danger">
                {{ $errorMessage }}
            </div>
        @endif

        <button type="submit" class="btn btn-primary">Predict Disease</button>
    </form>

    @if ($diseasePrediction)
        <div class="mt-3 alert alert-success">
            <strong>Predicted Disease:</strong> {{ $diseasePrediction }}
        </div>
    @endif
</div>
