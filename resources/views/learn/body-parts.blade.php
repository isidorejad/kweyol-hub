@extends('layouts.app')
@section('content')
@section('title', 'Body Parts')
<section class="hero">
    <div class="hero-overlay"></div>
    <div class="hero-content">
        <h1 class="display-4 fw-bold">Body Parts Translator (Kò-a)</h1>
        <p class="lead">Explore the vocabulary for Body Parts in Kwéyòl.</p>
        
        <div class="input-group mb-3">
            <input type="text" id="bodyPartSearch" class="form-control" 
                   placeholder="Enter body part in English (e.g., 'hand', 'eye')">
            <button class="btn btn-primary" id="searchButton" title="Search" onclick="translateBodyPart()" type="button">
                <i class="bx bx-search-alt"></i>
            </button>
        </div>
        
        <p class="mt-3" id="translatedBodyPart"></p>
    </div>
</section>

<div class="container-fluid learn-more py-3">
    <div id="bodyPartCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner"></div>
        <button class="carousel-control-prev" type="button" data-bs-target="#bodyPartCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#bodyPartCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>

<script>
// Body Parts Data with images grouped by category
const bodyPartData = [
    // Head Parts
    [
        { img: "{{ asset('img/body-parts/face.jpg') }}", alt: "Face", heading: "fidji", time: "face" },
        { img: "{{ asset('img/body-parts/hair.jpg') }}", alt: "Hair", heading: "chivé", time: "hair" },
        { img: "{{ asset('img/body-parts/eye.jpg') }}", alt: "Eye", heading: "zyé", time: "eye" },
        { img: "{{ asset('img/body-parts/ear.jpg') }}", alt: "Ear", heading: "zòwèy", time: "ear" }
    ],
    // Upper Body
    [
        { img: "{{ asset('img/body-parts/shoulder.jpg') }}", alt: "Shoulder", heading: "zépòl", time: "shoulder" },
        { img: "{{ asset('img/body-parts/hand.jpg') }}", alt: "Hand", heading: "lanmen", time: "hand" },
        { img: "{{ asset('img/body-parts/stomach.jpg') }}", alt: "Stomach", heading: "lèstomak", time: "stomach" },
        { img: "{{ asset('img/body-parts/arm.jpg') }}", alt: "Arm", heading: "bwa", time: "arm" }
    ],
    // Lower Body
    [
        { img: "{{ asset('img/body-parts/foot.jpg') }}", alt: "Foot", heading: "pyé", time: "foot" },
        { img: "{{ asset('img/body-parts/knee.jpg') }}", alt: "Knee", heading: "jounou", time: "knee" },
        { img: "{{ asset('img/body-parts/thigh.jpg') }}", alt: "Thigh", heading: "janm", time: "thigh" },
        { img: "{{ asset('img/body-parts/toe.jpg') }}", alt: "Toe", heading: "zòtèy", time: "toe" }
    ]
];

// Translations object
const translations = {
    // Head Parts
    "face": {word: "fidji", img: "face.jpg"},
    "hair": {word: "chivé", img: "hair.jpg"},
    "forehead": {word: "fon", img: "forehead.jpg"},
    "eyebrow": {word: "sousi zyé", img: "eyebrow.jpg"},
    "eye": {word: "zyé", img: "eye.jpg"},
    "nose": {word: "né", img: "nose.jpg"},
    "ear": {word: "zòwèy", img: "ear.jpg"},
    "head": {word: "tèt", img: "head.jpg"},
    "mouth": {word: "bouch", img: "mouth.jpg"},
    "teeth": {word: "dan", img: "teeth.jpg"},
    "tongue": {word: "lanng", img: "tongue.jpg"},
    "lip": {word: "lèv", img: "lip.jpg"},
    "chin": {word: "maton", img: "chin.jpg"},
    "neck": {word: "kou", img: "neck.jpg"},
    "throat": {word: "gòj", img: "throat.jpg"},

    // Upper Body
    "shoulder": {word: "zépòl", img: "shoulder.jpg"},
    "elbow": {word: "koudbwa", img: "elbow.jpg"},
    "wrist": {word: "ponyèt", img: "wrist.jpg"},
    "finger": {word: "dwèt", img: "finger.jpg"},
    "nail": {word: "zonng", img: "nail.jpg"},
    "thumb": {word: "gwo pous", img: "thumb.jpg"},
    "arm": {word: "bwa", img: "arm.jpg"},
    "hand": {word: "lanmen", img: "hand.jpg"},
    "stomach": {word: "lèstomak", img: "stomach.jpg"},
    "belly": {word: "bouden", img: "belly.jpg"},
    "waist": {word: "wen", img: "waist.jpg"},

    // Lower Body
    "thigh": {word: "janm", img: "thigh.jpg"},
    "knee": {word: "jounou", img: "knee.jpg"},
    "ankle": {word: "chivi", img: "ankle.jpg"},
    "heel": {word: "talon", img: "heel.jpg"},
    "toe": {word: "zòtèy", img: "toe.jpg"},
    "foot": {word: "pyé", img: "foot.jpg"},

    // Back
    "back": {word: "do", img: "back.jpg"},
    "butt": {word: "fès", img: "butt.jpg"}
};

// Function to translate body part
function translateBodyPart() {
    const input = document.getElementById("bodyPartSearch").value.toLowerCase().trim();
    const resultElement = document.getElementById("translatedBodyPart");
    
    if (!input) {
        resultElement.innerHTML = `<span class="text-muted">Enter a body part to see its translation</span>`;
        return;
    }

    const translation = translations[input];
    
    if (translation) {
        resultElement.innerHTML = `
            <div class="card mx-auto" style="max-width: 400px;">
                <div class="card-body text-center">
                    <img src="{{ asset('img/body-parts/${translation.img}') }}" 
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
                Translation not found. Try another body part (e.g., "hand", "eye").
            </div>
        `;
    }
}

// Render Carousel Items for body parts
function renderBodyPartCarousel() {
    const carouselInner = document.querySelector(".carousel-inner");
    
    bodyPartData.forEach((group, index) => {
        const isActive = index === 0 ? "active" : "";
        const carouselItem = document.createElement("div");
        carouselItem.className = `carousel-item ${isActive}`;
        
        const row = document.createElement("div");
        row.className = "row g-3 px-3 py-2";

        group.forEach((bodyPart) => {
            const col = document.createElement("div");
            col.className = "col-md-3 col-6";
            col.innerHTML = `
                <div class="card h-100">
                    <img src="${bodyPart.img}" alt="${bodyPart.alt}" class="card-img-top" style="height: 200px; object-fit: cover;">
                    <div class="card-body text-center">
                        <h3 class="card-title">${bodyPart.heading}</h3>
                        <p class="card-text">${bodyPart.time}</p>
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
    renderBodyPartCarousel();
    
    // Enable body part search on Enter key
    document.getElementById("bodyPartSearch").addEventListener("keypress", function(e) {
        if (e.key === "Enter") {
            translateBodyPart();
        }
    });
});
</script>

<style>
    .hero {
        position: relative;
    }
    
    .hero-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
    }
    
    .hero-content {
        position: relative;
        z-index: 1;
        max-width: 800px;
        margin: 0 auto;
        text-align: center;
        color: white;
        padding: 2rem;
    }
    
    .learn-more {
        background-color: #f8f9fa;
    }
    
    .carousel-control-prev, .carousel-control-next {
        width: 5%;
        background-color: rgba(0, 0, 0, 0.2);
    }
    
    .carousel-control-prev {
        left: -5%;
    }
    
    .carousel-control-next {
        right: -5%;
    }
    
    @media (max-width: 768px) {
        .carousel-item .col-md-3 {
            flex: 0 0 50%;
            max-width: 50%;
        }
        
        .carousel-control-prev {
            left: 0;
        }
        
        .carousel-control-next {
            right: 0;
        }
    }
    
    .card {
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        border: none;
        border-radius: 10px;
        transition: transform 0.3s ease;
    }
    
    .card:hover {
        transform: translateY(-5px);
    }
    
    #bodyPartSearch {
        border-radius: 0.25rem 0 0 0.25rem;
    }
    
    #searchButton {
        border-radius: 0 0.25rem 0.25rem 0;
    }
</style>
@endsection