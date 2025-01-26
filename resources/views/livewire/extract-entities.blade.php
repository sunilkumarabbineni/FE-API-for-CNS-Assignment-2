<div class="container mt-5">
    <h3>Extract Entities from Text</h3>

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

    <!-- Extract Entities Button -->
    <button wire:click="extractEntities" class="btn btn-primary">Extract Entities</button>

    <!-- Display the extracted entities result -->
    @if($entities && count($entities) > 0)
        <div class="mt-4">
            <h4>Extracted Entities:</h4>
            <ul class="list-group">
                @foreach($entities as $entity)
                    <li class="list-group-item">{{ $entity['entity'] }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Display error message if any -->
    @if($errorMessage)
        <div class="alert alert-danger mt-3">
            {{ $errorMessage }}
        </div>
    @endif
</div>
