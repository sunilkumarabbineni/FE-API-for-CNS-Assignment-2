<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\PredictDiseaseForm;
use App\Livewire\Summarize;
use App\Livewire\AskQuestion;
use App\Livewire\ClassifyImage;
use App\Livewire\ExtractEntities;
use App\Livewire\SentimentAnalysis;
use App\Livewire\Chat;


Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/predict-disease', PredictDiseaseForm::class)->name('predict.disease');
Route::get('/summarize', Summarize::class)->name('summarize');
Route::get('/ask-question', AskQuestion::class)->name('ask.question');
Route::get('/classify-image', ClassifyImage::class)->name('classify.image');
Route::get('/extract-entities', ExtractEntities::class)->name('extract.entities');
Route::get('/sentiment', SentimentAnalysis::class)->name('sentiment');
Route::get('/chat', Chat::class)->name('chat');
