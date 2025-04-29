<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DictionaryController;
use App\Http\Controllers\ContactController;


// Main Routes
Route::get('/', function () {
    return view('home');
})->name('home');

// Learn Routes Group
Route::prefix('learn')->name('learn.')->group(function () {
    Route::get('/time', function () {
        return view('learn.time');
    })->name('time');

    Route::get('/body-parts', function () {
        return view('learn.body-parts');
    })->name('body-parts');

    Route::get('/numbers', function () {
        return view('learn.numbers');
    })->name('numbers');

    // Route::get('/online-dictionary', function () {
    //     return view('learn.online-dictionary', [
    //         'commonWords' => app(DictionaryController::class)->getCommonWords()
    //     ]);
    // })->name('online-dictionary');
    Route::get('/online-dictionary', [DictionaryController::class, 'dictionaryView'])->name('online-dictionary');
    Route::get('/saint-lucia', function () {
        return view('learn.stlucia');
    })->name('saint-lucia');
});


// Dictionary & Translation Routes
Route::post('/translate-word', [DictionaryController::class, 'translateWord'])->name('translate.word');
Route::post('/translate-sentence', [DictionaryController::class, 'translateSentence'])->name('translate.sentence');
Route::get('/common-words', [DictionaryController::class, 'getCommonWords'])->name('common.words');
Route::get('/common-phrases', [DictionaryController::class, 'getCommonPhrases'])->name('common.phrases');

// Static Pages
// Route::get('/translation', function () {
//     return view('translation', [
//         'commonPhrases' => app(DictionaryController::class)->getCommonPhrases()
//     ]);
// })->name('translation');
Route::get('/translation', [DictionaryController::class, 'translationView'])->name('translation');
Route::get('/contribute', function () {
    return view('contribute');
})->name('contribute');

Route::get('/contact-us', [ContactController::class, 'show'])->name('contact-us');
Route::post('/contact-us', [ContactController::class, 'submit'])->name('contact.submit');

Route::get('/terms-of-service', function () {
    return view('terms-of-service');
})->name('terms-of-service');

Route::get('/privacy-policy', function () {
    return view('privacy-policy');
})->name('privacy-policy');


Route::get('/contact-us', [ContactController::class, 'show'])->name('contact-us');
Route::post('/contact-us', [ContactController::class, 'submit'])->name('contact.submit');
Route::get('/error/404', function () {
    abort(404);
});

Route::get('/error/403', function () {
    abort(403);
});

Route::get('/error/500', function () {
    abort(500);
});

Route::get('/error/419', function () {
    abort(419);
});

Route::get('/error/503', function () {
    abort(503);
});
