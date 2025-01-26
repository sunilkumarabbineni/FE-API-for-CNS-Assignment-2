<div class="container mt-5">
    <h3>Chat with AI</h3>

    <!-- Display error message if exists -->
    @if (session()->has('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <!-- Display chat history -->
    <div class="chat-box mb-4">
        @foreach ($chatHistory as $chat)
            <div class="user-message">
                <strong>You: </strong>{{ $chat['user'] }}
            </div>
            <div class="ai-response">
                <strong>AI: </strong>{{ $chat['response'] }}
            </div>
        @endforeach
    </div>

    <!-- Input Text Area for the user to enter a message -->
    <div class="mb-3">
        <label for="message" class="form-label">Enter your message</label>
        <input type="text" wire:model="message" class="form-control" id="message" placeholder="Enter your message here...">
    </div>

    <!-- Send Button -->
    <button wire:click="sendMessage" class="btn btn-primary">Send Message</button>

    <!-- Display error message if any -->
    @if($errorMessage)
        <div class="alert alert-danger mt-3">
            {{ $errorMessage }}
        </div>
    @endif
</div>
