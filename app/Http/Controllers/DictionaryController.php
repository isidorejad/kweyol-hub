<?php

namespace App\Http\Controllers;

use App\Models\Dictionary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class DictionaryController extends Controller
{
    // Store a new word
    public function store(Request $request)
    {
        $request->validate([
            'english_word' => 'required|string|unique:dictionaries',
            'part_of_speech' => 'required|string',
            'creole_translation' => 'required|string',
        ]);

        $word = Dictionary::create($request->all());

        // Clear cache when new words are added
        Cache::forget('common_words');
        Cache::forget('common_phrases');

        return response()->json([
            'message' => 'Word added successfully',
            'data' => $word
        ], 201);
    }

    // Translate a full sentence
    public function translateSentence(Request $request)
    {
        $request->validate([
            'sentence' => 'required|string',
        ]);

        $sentence = strtolower($request->sentence);
        $words = preg_split('/\s+/', $sentence); // Split by any whitespace

        $translatedWords = [];
        $unknownWords = [];

        foreach ($words as $word) {
            $translation = Dictionary::where('english_word', $word)->first();

            if ($translation) {
                $translatedWords[] = $translation->creole_translation;
            } else {
                $translatedWords[] = $word;
                $unknownWords[] = $word;
            }
        }

        $translatedSentence = implode(' ', $translatedWords);

        return response()->json([
            'original' => $sentence,
            'translated' => $translatedSentence,
            'unknown_words' => $unknownWords,
            'success' => empty($unknownWords)
        ]);
    }
    public function dictionaryView()
{
    $commonWords = Cache::remember('web_common_words', now()->addHours(6), function () {
        return Dictionary::select('english_word', 'creole_translation')
            ->whereIn('english_word', ['hello', 'goodbye', 'thank you', 'please', 'water', 'food'])
            ->orWhereIn('creole_translation', ['bonjou', 'orevwa', 'mèsi', 'souple', 'dlo', 'manje'])
            ->limit(12)
            ->get();
    });

    return view('learn.online-dictionary', compact('commonWords'));
}
    // Translate a SINGLE word
    public function translateWord(Request $request)
    {
        $request->validate([
            'word' => 'required|string',
        ]);

        $word = strtolower($request->word);
        $translation = Dictionary::where('english_word', $word)->first();

        return response()->json([
            'original' => $word,
            'translated' => $translation ? $translation->creole_translation : $word,
            'found' => (bool)$translation
        ]);
    }

    // Get common words for the dictionary
    public function getCommonWords()
    {
        $words = Cache::remember('common_words', now()->addHours(6), function () {
            return Dictionary::select('english_word', 'creole_translation')
                ->whereIn('english_word', ['hello', 'goodbye', 'thank you', 'please', 'water', 'food'])
                ->orWhereIn('creole_translation', ['bonjou', 'orevwa', 'mèsi', 'souple', 'dlo', 'manje'])
                ->limit(12)
                ->get()
                ->toArray();
        });

        return response()->json($words);
    }
    public function translationView()
    {
        $commonPhrases = Cache::remember('web_common_phrases', now()->addHours(6), function () {
            return [
                ['english' => 'Good morning', 'creole' => 'Bonjou'],
                ['english' => 'How are you?', 'creole' => 'Kouman ou yé?'],
                ['english' => 'Thank you', 'creole' => 'Mèsi'],
                ['english' => 'What is your name?', 'creole' => 'Kouman ou yé?'],
                ['english' => 'I love Saint Lucia', 'creole' => 'Mwen enmen Sent Lisi'],
                ['english' => 'Where is the beach?', 'creole' => 'Ki koté lanmè-a yé?'],
                ['english' => 'I am hungry', 'creole' => 'Mwen grangou'],
                ['english' => 'Let\'s go', 'creole' => 'Ann ale'],
                ['english' => 'See you later', 'creole' => 'A la pwòchèn'],
                ['english' => 'Goodbye', 'creole' => 'Orevwa'],
                ['english' => 'Welcome', 'creole' => 'Byenveni'],
                ['english' => 'Have a nice day', 'creole' => 'Pase yon bon jounen']
            ];
        });
    
        return view('translation', compact('commonPhrases'));
    }
// Keep your existing API methods but ensure they return JSON only
public function getCommonPhrases()
{
    $phrases = [
        ['english_phrase' => 'Good morning', 'creole_translation' => 'Bonjou'],
        ['english_phrase' => 'How are you?', 'creole_translation' => 'Kouman ou yé?'],
        ['english_phrase' => 'Thank you', 'creole_translation' => 'Mèsi'],
        ['english_phrase' => 'What is your name?', 'creole_translation' => 'Kouman ou yé?'],
        ['english_phrase' => 'I love Saint Lucia', 'creole_translation' => 'Mwen enmen Sent Lisi'],
        ['english_phrase' => 'Where is the beach?', 'creole_translation' => 'Ki koté lanmè-a yé?'],
        ['english_phrase' => 'I am hungry', 'creole_translation' => 'Mwen grangou'],
        ['english_phrase' => 'Let\'s go', 'creole_translation' => 'Ann ale'],
        ['english_phrase' => 'See you later', 'creole_translation' => 'A la pwòchèn'],
        ['english_phrase' => 'Goodbye', 'creole_translation' => 'Orevwa'],
        ['english_phrase' => 'Welcome', 'creole_translation' => 'Byenveni'],
        ['english_phrase' => 'Have a nice day', 'creole_translation' => 'Pase yon bon jounen'],
    ];

    return response()->json($phrases);
}

    // Get common phrases for the translator
    // public function getCommonPhrases()
    // {
    //     $phrases = Cache::remember('common_phrases', now()->addHours(6), function () {
    //         return [
    //             ['english' => 'Good morning', 'creole' => 'Bonjou'],
    //             ['english' => 'How are you?', 'creole' => 'Kouman ou yé?'],
    //             ['english' => 'Thank you', 'creole' => 'Mèsi'],
    //             ['english' => 'What is your name?', 'creole' => 'Kouman ou yé?'],
    //             ['english' => 'I love Saint Lucia', 'creole' => 'Mwen enmen Sent Lisi'],
    //             ['english' => 'Where is the beach?', 'creole' => 'Ki koté lanmè-a yé?'],
    //             ['english' => 'I am hungry', 'creole' => 'Mwen grangou'],
    //             ['english' => 'Let\'s go', 'creole' => 'Ann ale'],
    //             ['english' => 'See you later', 'creole' => 'A la pwòchèn'],
    //             ['english' => 'Goodbye', 'creole' => 'Orevwa'],
    //             ['english' => 'Welcome', 'creole' => 'Byenveni'],
    //             ['english' => 'Have a nice day', 'creole' => 'Pase yon bon jounen']
    //         ];
    //     });

    //     return response()->json($phrases);
    // }

    // Additional helper methods
    public function search(Request $request)
    {
        $query = $request->input('query');
        
        $results = Dictionary::where('english_word', 'like', "%$query%")
            ->orWhere('creole_translation', 'like', "%$query%")
            ->limit(10)
            ->get();

        return response()->json($results);
    }
}