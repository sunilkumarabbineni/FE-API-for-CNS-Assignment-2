<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Healthcare AI Frontend</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light my-4">
            <a class="navbar-brand" href="{{ route('home') }}">Healthcare AI App</a>
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

        <!-- Heading -->
        <h1 class="my-5">Healthcare AI Application</h1>

        <!-- Colorful Boxes for Navigation -->
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card bg-primary text-white h-100">
                    <div class="card-body">
                        <h5 class="card-title">Predict Disease</h5>
                        <p class="card-text">Predict potential diseases based on symptoms.</p>
                        <a href="{{ route('predict.disease') }}" class="btn btn-light">Go</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card bg-success text-white h-100">
                    <div class="card-body">
                        <h5 class="card-title">Summarize Medical Report</h5>
                        <p class="card-text">Summarize medical documents and reports.</p>
                        <a href="{{ route('summarize') }}" class="btn btn-light">Go</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card bg-info text-white h-100">
                    <div class="card-body">
                        <h5 class="card-title">Ask Question</h5>
                        <p class="card-text">Get answers to medical-related questions.</p>
                        <a href="{{ route('ask.question') }}" class="btn btn-light">Go</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card bg-warning text-white h-100">
                    <div class="card-body">
                        <h5 class="card-title">Classify Image</h5>
                        <p class="card-text">Classify medical images into categories.</p>
                        <a href="{{ route('classify.image') }}" class="btn btn-light">Go</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card bg-danger text-white h-100">
                    <div class="card-body">
                        <h5 class="card-title">Extract Entities</h5>
                        <p class="card-text">Extract relevant entities from medical text.</p>
                        <a href="{{ route('extract.entities') }}" class="btn btn-light">Go</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card bg-dark text-white h-100">
                    <div class="card-body">
                        <h5 class="card-title">Sentiment Analysis</h5>
                        <p class="card-text">Analyze the sentiment of medical feedback.</p>
                        <a href="{{ route('sentiment') }}" class="btn btn-light">Go</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
