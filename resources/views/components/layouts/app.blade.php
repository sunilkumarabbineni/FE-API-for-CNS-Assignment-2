<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Livewire App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    @livewireStyles
</head>
<body>
    <div class="container">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="{{ route('home') }}">Health Care App</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('predict.disease') }}">Predict Disease</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('summarize') }}">Summarize</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('ask.question') }}">Ask Question</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('classify.image') }}">Classify Image</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('extract.entities') }}">Extract Entities</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('sentiment') }}">Sentiment Analysis</a>
                    </li>
                    <!-- Chat Button in the Navbar -->
                    <li class="nav-item">
                        <a class="btn btn-primary ms-3" href="/chat">Chat</a>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Main Content -->
        <header class="my-4">
            <h1>Health Care App</h1>
        </header>

        <main>
            {{ $slot }}
        </main>
    </div>

    @livewireScripts
</body>
</html>
