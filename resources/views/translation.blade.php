@extends('layouts.app')
@section('content')
@section('title', 'Translation')

<section class="hero">
    <div class="hero-overlay"></div>
    <div class="hero-content">
        <h1 class="display-4 fw-bold">English to Kwéyòl Translator</h1>
        <p class="lead">Translate full sentences from English to Saint Lucian Creole (Kwéyòl)</p>
        <form id="translationForm" class="d-flex flex-column align-items-center">
            @csrf
            <div class="input-group mb-3" style="max-width: 600px;">
                <textarea 
                    class="form-control" 
                    id="sentenceInput" 
                    name="sentence" 
                    rows="3" 
                    placeholder="Enter English sentence to translate"
                    required></textarea>
            </div>
            <button class="btn btn-primary px-4" type="submit">
                <i class="bx bx-transfer-alt me-2"></i> Translate
            </button>
        </form>
    </div>
</section>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div id="translationResults" class="text-center mt-4">
                <div class="alert alert-info">
                    Enter a sentence to see its Kwéyòl translation
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid py-5 bg-light">
    <h2 class="text-center mb-4">Common Phrases</h2>
    
    <!-- Server-rendered phrases table -->
    <div class="common-phrases-section mb-4">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table phrases-table">
                                <thead class="table-light">
                                    <tr>
                                        <th width="45%">English</th>
                                        <th width="45%">Kwéyòl</th>
                                        <th width="10%"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($commonPhrases as $phrase)
                                <tr onclick="usePhrase('{{ $phrase['english'] }}')">
                                    <td>{{ $phrase['english'] }}</td>
                                    <td>{{ $phrase['creole'] }}</td>
                                    <td class="text-end">
                                        <button class="btn btn-sm btn-outline-primary" 
                                                onclick="event.stopPropagation();fetchSentenceTranslation('{{ $phrase['english'] }}')">
                                            <i class="bx bx-transfer"></i>
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Client-side additional phrases -->
    <div id="additionalPhrasesContainer" class="mt-4">
        <!-- Will be populated by JavaScript if needed -->
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Fetch additional phrases if needed
    fetchAdditionalPhrases();
    
    // Handle form submission
    document.getElementById('translationForm').addEventListener('submit', function(e) {
        e.preventDefault();
        const sentence = document.getElementById('sentenceInput').value.trim();
        
        if(sentence) {
            fetchSentenceTranslation(sentence);
        }
    });
});

function usePhrase(phrase) {
    document.getElementById('sentenceInput').value = phrase;
}

function fetchSentenceTranslation(sentence) {
    fetch(`/translate-sentence`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify({ sentence: sentence })
    })
    .then(response => response.json())
    .then(data => {
        const resultsContainer = document.getElementById('translationResults');
        
        resultsContainer.innerHTML = `
            <div class="card mx-auto" style="max-width: 800px;">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 border-end">
                            <h4 class="text-muted mb-3">English</h4>
                            <p class="fs-5">${data.original}</p>
                        </div>
                        <div class="col-md-6">
                            <h4 class="text-muted mb-3">Kwéyòl</h4>
                            <p class="fs-5">${data.translated}</p>
                        </div>
                    </div>
                </div>
            </div>
        `;
    })
    .catch(error => {
        console.error('Error:', error);
    });
}

function fetchAdditionalPhrases() {
    // Only fetch if we don't have enough server-side rendered phrases
    if(document.querySelectorAll('.phrases-table tbody tr').length < 5) {
        fetch('/api/additional-phrases')
        .then(response => response.json())
        .then(data => {
            const container = document.getElementById('additionalPhrasesContainer');
            if(data.length > 0) {
                container.innerHTML = `
                    <div class="row justify-content-center">
                        <div class="col-md-10">
                            <div class="card">
                                <div class="card-header">
                                    More Common Phrases
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                                ${data.map(phrase => `
                                                    <tr onclick="usePhrase('${phrase.english_phrase}')">
                                                        <td width="45%">${phrase.english_phrase}</td>
                                                        <td width="45%">${phrase.creole_translation}</td>
                                                        <td width="10%" class="text-end">
                                                            <button class="btn btn-sm btn-outline-primary" 
                                                                    onclick="event.stopPropagation();fetchSentenceTranslation('${phrase.english_phrase}')">
                                                                <i class="bx bx-transfer"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                `).join('')}
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
            }
        })
        .catch(error => {
            console.error('Error fetching additional phrases:', error);
        });
    }
}
</script>

<style>
    .hero-content {
        max-width: 800px;
        margin: 0 auto;
        text-align: center;
    }
    
    textarea {
        min-height: 120px;
        resize: none;
    }
    
    .phrases-table tbody tr {
        cursor: pointer;
        transition: background-color 0.2s;
    }
    
    .phrases-table tbody tr:hover {
        background-color: rgba(13, 110, 253, 0.05);
    }
    
    .phrases-table .btn-outline-primary {
        opacity: 0;
        transition: opacity 0.2s;
    }
    
    .phrases-table tr:hover .btn-outline-primary {
        opacity: 1;
    }
    
    .card {
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        border: none;
        border-radius: 10px;
    }
    
    .table {
        margin-bottom: 0;
    }
    
    @media (max-width: 768px) {
        .phrases-table .btn-outline-primary {
            opacity: 1;
        }
    }
</style>
@endsection