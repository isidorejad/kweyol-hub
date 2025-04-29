@extends('layouts.app')
@section('content')
@section('title', 'Saint Lucian Locations')
<section class="hero">
    <div class="hero-overlay"></div>
    <div class="hero-content">
        <h1 class="display-4 fw-bold">Saint Lucian Locations Translator</h1>
        <p class="lead">Discover how locations in Saint Lucia are called in Kwéyòl.</p>
        
        <div class="input-group mb-3">
            <input type="text" id="locationSearch" class="form-control" 
                   placeholder="Enter location in English (e.g., 'Castries', 'Canaries')">
            <button class="btn btn-primary" id="searchButton" title="Search" onclick="translateLocation()" type="button">
                <i class="bx bx-search-alt"></i>
            </button>
        </div>
        
        <p class="mt-3" id="translatedLocation"></p>
    </div>
</section>

<div class="container-fluid learn-more py-5">
    <div id="locationCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner"></div>
        <button class="carousel-control-prev" type="button" data-bs-target="#locationCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#locationCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>

<script>
// Location Data with images
const locationData = [
    [
        { img: "{{ asset('img/locations/castries.svg') }}", alt: "Castries", heading: "Kastwi", time: "Castries" },
        { img: "{{ asset('img/locations/babonneau.svg') }}", alt: "Babonneau", heading: "Babonno", time: "Babonneau" },
        { img: "{{ asset('img/locations/anse-la-raye.svg') }}", alt: "Anse La Raye", heading: "Lanslawé", time: "Anse La Raye" },
        { img: "{{ asset('img/locations/bexon.svg') }}", alt: "Bexon", heading: "Béson", time: "Bexon" }
    ],
    [
        { img: "{{ asset('img/locations/canaries.svg') }}", alt: "Canaries", heading: "Kannawi", time: "Canaries" },
        { img: "{{ asset('img/locations/soufriere.svg') }}", alt: "Soufriere", heading: "Southviyè", time: "Soufriere" },
        { img: "{{ asset('img/locations/saint-lucia.svg') }}", alt: "Saint Lucia", heading: "Sent Lisi", time: "Saint Lucia" },
        { img: "{{ asset('img/locations/micoud.svg') }}", alt: "Micoud", heading: "Mikou", time: "Micoud" }
    ],
    [
        { img: "{{ asset('img/locations/choiseul.svg') }}", alt: "Choiseul", heading: "Chwazëy", time: "Choiseul" },
        { img: "{{ asset('img/locations/laborie.svg') }}", alt: "Laborie", heading: "Labowi", time: "Laborie" },
        { img: "{{ asset('img/locations/vieux-fort.svg') }}", alt: "Vieux Fort", heading: "Vyé Fò", time: "Vieux Fort" },
        { img: "{{ asset('img/locations/sea.svg') }}", alt: "The Sea", heading: "Lanmè-a", time: "The Sea" }
    ]
];

// Translations object
const translations = {
    "the sea": {word: "Lanmè-a", svg: "sea.svg"},
    "castries": {word: "Kastwi", svg: "castries.svg"},
    "babonneau": {word: "Babonno", svg: "babonneau.svg"},
    "anse la raye": {word: "Lanslawé", svg: "anse-la-raye.svg"},
    "bexon": {word: "Béson", svg: "bexon.svg"},
    "canaries": {word: "Kannawi", svg: "canaries.svg"},
    "soufriere": {word: "Southviyè", svg: "soufriere.svg"},
    "saint lucia": {word: "Sent Lisi", svg: "saint-lucia.svg"},
    "micoud": {word: "Mikou", svg: "micoud.svg"},
    "choiseul": {word: "Chwazëy", svg: "choiseul.svg"},
    "laborie": {word: "Labowi", svg: "laborie.svg"},
    "vieux fort": {word: "Vyé Fò", svg: "vieux-fort.svg"}
};

// Function to translate location
function translateLocation() {
    const input = document.getElementById("locationSearch").value.toLowerCase().trim();
    const resultElement = document.getElementById("translatedLocation");
    
    if (!input) {
        resultElement.innerHTML = `<span class="text-muted">Enter a location to see its Kwéyòl translation</span>`;
        return;
    }

    const translation = translations[input];
    
    if (translation) {
        resultElement.innerHTML = `
            <div class="card mx-auto" style="max-width: 400px;">
                <div class="card-body text-center">
                    <img src="{{ asset('img/locations/${translation.svg}') }}" 
                         alt="${input}" 
                         class="img-fluid mb-3" 
                         style="height: 200px; object-fit: contain;">
                    <h3 class="card-title text-capitalize">${input}</h3>
                    <p class="card-text fs-4">${translation.word}</p>
                    <small class="text-muted">Kwéyòl translation</small>
                </div>
            </div>
        `;
    } else {
        resultElement.innerHTML = `
            <div class="alert alert-warning mx-auto" style="max-width: 500px;">
                <i class='bx bx-error-circle'></i> 
                Translation not found. Try another location (e.g., "Castries", "Canaries").
            </div>
        `;
    }
}

// Render Carousel Items for locations
function renderLocationCarousel() {
    const carouselInner = document.querySelector(".carousel-inner");
    
    locationData.forEach((group, index) => {
        const isActive = index === 0 ? "active" : "";
        const carouselItem = document.createElement("div");
        carouselItem.className = `carousel-item ${isActive}`;
        
        const row = document.createElement("div");
        row.className = "row g-3";

        group.forEach((location) => {
            const col = document.createElement("div");
            col.className = "col-md-3 col-6";
            col.innerHTML = `
                <div class="card h-100">
                    <img src="${location.img}" alt="${location.alt}" class="card-img-top">
                    <div class="card-body text-center">
                        <h3 class="card-title">${location.heading}</h3>
                        <p class="card-text">${location.time}</p>
                    </div>
                </div>
            `;
            row.appendChild(col);
        });

        carouselItem.appendChild(row);
        carouselInner.appendChild(carouselItem);
    });
}

// Initialize when DOM is loaded
document.addEventListener("DOMContentLoaded", function() {
    renderLocationCarousel();
    
    // Enable location search on Enter key
    document.getElementById("locationSearch").addEventListener("keypress", function(e) {
        if (e.key === "Enter") {
            translateLocation();
        }
    });
});
</script>

<style>
    .hero-content {
        max-width: 800px;
        margin: 0 auto;
        text-align: center;
    }
    
    .location-img {
        max-height: 200px;
        object-fit: contain;
    }
    
    .learn-more {
        background-color: #f8f9fa;
    }
    
    .carousel-control-prev, .carousel-control-next {
        width: 5%;
    }
    
    @media (max-width: 768px) {
        .carousel-item .col-md-3 {
            flex: 0 0 50%;
            max-width: 50%;
        }
    }
    
    .card {
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        border: none;
        border-radius: 10px;
    }
    
    #locationSearch {
        border-right: none;
    }
    
    #searchButton {
        border-left: none;
    }
</style>
@endsection