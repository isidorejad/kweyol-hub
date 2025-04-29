@extends('layouts.app')
@section('content')
@section('title', 'Online Dictionary')

<section class="hero">
    <div class="hero-overlay"></div>
    <div class="hero-content">
        <h1 class="display-4 fw-bold">Expand your Creole Vocabulary!</h1>
        <p class="lead">Access the Online Dictionary to enhance your understanding of the Kwéyòl language.</p>
        <form id="dictionaryForm" class="d-flex custom-search-form">
            @csrf
            <input
                type="text"
                class="form-control me-2 custom-search-input"
                id="englishWordInput"
                name="englishWord"
                placeholder="Enter English word"
                required
            />
            <button class="btn custom-search-btn" id="uniqueSearchButton" title="Search" type="submit">
                <i class="bx bx-search-alt"></i>
            </button>
        </form>
    </div>
</section>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div id="resultsContainer" class="text-start mt-4 text-center">
                <div class="alert alert-info">
                    Enter a word to see its Kwéyòl translation
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid learn-more py-5 bg-light">
    <h2 class="text-center mb-4">Common Words</h2>
    
    <!-- Server-rendered common words grid -->
    <div class="common-words-section mb-5">
        <div class="words-grid">
            @foreach($commonWords as $word)
                <div class="word-card" onclick="fetchWordTranslation('{{ $word->english_word }}')">
                    <div class="card h-100">
                        <div class="card-body text-center">
                            <h5 class="card-title">{{ $word->english_word }}</h5>
                            <p class="card-text text-primary">{{ $word->creole_translation }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    
    <!-- Client-side carousel for additional words -->
    <div id="dictionaryCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner" id="carouselWordsContainer">
            <!-- Will be populated by JavaScript -->
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#dictionaryCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#dictionaryCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Fetch additional words for carousel
    fetchAdditionalWords();
    
    // Handle form submission
    document.getElementById('dictionaryForm').addEventListener('submit', function(e) {
        e.preventDefault();
        const word = document.getElementById('englishWordInput').value.trim();
        
        if(word) {
            fetchWordTranslation(word);
        }
    });
    
    // Enable search on Enter key
    document.getElementById('englishWordInput').addEventListener('keypress', function(e) {
        if(e.key === 'Enter') {
            e.preventDefault();
            document.getElementById('dictionaryForm').dispatchEvent(new Event('submit'));
        }
    });
});

function fetchWordTranslation(word) {
    fetch(`/translate-word`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify({ word: word })
    })
    .then(response => response.json())
    .then(data => {
        const resultsContainer = document.getElementById('resultsContainer');
        
        if(data.translated === data.original) {
            resultsContainer.innerHTML = `
                <div class="alert alert-warning mx-auto" style="max-width: 500px;">
                    <i class='bx bx-error-circle'></i> 
                    Translation not found for "${data.original}". Try another word.
                </div>
            `;
        } else {
            resultsContainer.innerHTML = `
                <div class="card mx-auto" style="max-width: 400px;">
                    <div class="card-body text-center">
                        <h3 class="card-title text-capitalize">${data.original}</h3>
                        <p class="card-text fs-4">${data.translated}</p>
                        <small class="text-muted">Kwéyòl translation</small>
                    </div>
                </div>
            `;
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
}

function fetchAdditionalWords() {
    fetch('/api/additional-words')
    .then(response => response.json())
    .then(data => {
        const container = document.getElementById('carouselWordsContainer');
        const wordsPerSlide = 4;
        const slideCount = Math.ceil(data.length / wordsPerSlide);
        
        for(let i = 0; i < slideCount; i++) {
            const isActive = i === 0 ? 'active' : '';
            const carouselItem = document.createElement('div');
            carouselItem.className = `carousel-item ${isActive}`;
            
            const row = document.createElement('div');
            row.className = 'row g-3';
            
            const wordsInSlide = data.slice(i * wordsPerSlide, (i + 1) * wordsPerSlide);
            
            wordsInSlide.forEach(word => {
                const col = document.createElement('div');
                col.className = 'col-md-3 col-6';
                col.innerHTML = `
                    <div class="card h-100" onclick="fetchWordTranslation('${word.english_word}')">
                        <div class="card-body text-center">
                            <h5 class="card-title">${word.english_word}</h5>
                            <p class="card-text text-primary">${word.creole_translation}</p>
                        </div>
                    </div>
                `;
                row.appendChild(col);
            });
            
            carouselItem.appendChild(row);
            container.appendChild(carouselItem);
        }
    })
    .catch(error => {
        console.error('Error fetching additional words:', error);
    });
}
</script>

<style>
    .hero-content {
        max-width: 800px;
        margin: 0 auto;
        text-align: center;
    }
    
    .custom-search-form {
        max-width: 500px;
        margin: 0 auto;
    }
    
    .custom-search-input {
        border-right: none;
    }
    
    .custom-search-btn {
        border-left: none;
        background-color: #0d6efd;
        color: white;
    }
    
    .words-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
        gap: 1.5rem;
        padding: 1rem;
    }
    
    .word-card {
        cursor: pointer;
        transition: transform 0.2s;
    }
    
    .word-card:hover {
        transform: translateY(-5px);
    }
    
    .word-card .card {
        height: 100%;
        transition: all 0.3s ease;
    }
    
    .word-card:hover .card {
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    }
    
    .card {
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        border: none;
        border-radius: 10px;
    }
    
    .carousel-control-prev, .carousel-control-next {
        width: 5%;
    }
    
    @media (max-width: 768px) {
        .carousel-item .col-md-3 {
            flex: 0 0 50%;
            max-width: 50%;
        }
        
        .words-grid {
            grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
        }
    }
</style>
@endsection