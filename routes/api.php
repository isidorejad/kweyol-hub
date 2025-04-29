<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DictionaryController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

Route::prefix('v1')->group(function () {
    // Public endpoints
    Route::post('/translate-word', [DictionaryController::class, 'translateWord']);
    Route::post('/translate-sentence', [DictionaryController::class, 'translateSentence']);
    Route::get('/common-words', [DictionaryController::class, 'getCommonWords']);
    Route::get('/common-phrases', [DictionaryController::class, 'getCommonPhrases']);
    Route::get('/search', [DictionaryController::class, 'search']);
    
    // Protected endpoints (require authentication)
    Route::middleware('auth:sanctum')->group(function () {
        Route::post('/dictionary', [DictionaryController::class, 'store']);
        Route::put('/dictionary/{word}', [DictionaryController::class, 'update']);
        Route::delete('/dictionary/{word}', [DictionaryController::class, 'destroy']);
    });
});

    // Authenticated endpoints
    Route::middleware(['auth:sanctum', 'throttle:120,1'])->group(function () {
        Route::apiResource('dictionary', DictionaryController::class)
            ->except(['index', 'show']);
    });

// Fallback route
Route::fallback(function () {
    return response()->json([
        'message' => 'Endpoint not found',
        'documentation' => url('/api-docs')
    ], 404);
});