@extends('layouts.app')
@section('content')
@section('title', 'Time')
<section class="hero">
    <div class="hero-overlay"></div>
    <div class="hero-content">
        <h1 class="display-4 fw-bold">Tell Time in Creole! (Ki Lè I Yé)</h1>
        <p class="lead">Learn about Time in the Kwéyòl language and its significance in Saint Lucian culture.</p>
        <div class="input-group mb-3">
            <input type="text" id="timeSearch" class="form-control" placeholder="Enter time (e.g., 1:10 or 12:00 pm)">
            <button class="btn btn-primary" id="uniqueSearchButton" title="Search" onclick="translateTime()" type="button">
                <i class="bx bx-search-alt"></i>
            </button>
        </div>
        <p class="mt-3" id="translatedTime"></p>
    </div>
</section>

<div class="container-fluid learn-more py-5">
    <div id="timeCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner"></div>
        <button class="carousel-control-prev" type="button" data-bs-target="#timeCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#timeCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>

<script>
// Number-to-word conversion for Creole (1 to 60)
const numberToCreole = {
    1: 'yonn', 2: 'dé', 3: 'twa', 4: 'kat', 5: 'senk', 6: 'sis', 7: 'sèt', 8: 'wit', 9: 'nèf', 10: 'dis',
    11: 'wonz', 12: 'douz', 13: 'trèz', 14: 'katoz', 15: 'kenz', 16: 'sèz', 17: 'disèt', 18: 'dizwit', 19: 'dinèf',
    20: 'vent', 30: 'twant', 40: 'kawant', 50: 'senkant', 60: 'swasant'
};

// Time Data with corrected asset paths
const timeData = [
    [
        { img: "{{ asset('img/time/clock.png') }}", alt: "Midnight Clock", heading: "mennwit", time: "12:00 AM" },
        { img: "{{ asset('img/time/clock(1).png') }}", alt: "Morning Clock", heading: "yonné", time: "1:00 AM" },
        { img: "{{ asset('img/time/clock(2).png') }}", alt: "Morning Clock", heading: "dézè", time: "2:00 AM" },
        { img: "{{ asset('img/time/clock(3).png') }}", alt: "Morning Clock", heading: "twazè", time: "3:00 AM" },
    ],
    [
        { img: "{{ asset('img/time/clock(4).png') }}", alt: "Morning Clock", heading: "katwè", time: "4:00 AM" },
        { img: "{{ asset('img/time/clock(5).png') }}", alt: "Morning Clock", heading: "senkè", time: "5:00 AM" },
        { img: "{{ asset('img/time/clock(6).png') }}", alt: "Morning Clock", heading: "sizè", time: "6:00 AM" },
        { img: "{{ asset('img/time/clock(7).png') }}", alt: "Morning Clock", heading: "sétè", time: "7:00 AM" },
    ],
    [
        { img: "{{ asset('img/time/clock(8).png') }}", alt: "Morning Clock", heading: "ywitè", time: "8:00 AM" },
        { img: "{{ asset('img/time/clock(9).png') }}", alt: "Morning Clock", heading: "névè", time: "9:00 AM" },
        { img: "{{ asset('img/time/clock(10).png') }}", alt: "Morning Clock", heading: "dizè", time: "10:00 AM" },
        { img: "{{ asset('img/time/clock(11).png') }}", alt: "Morning Clock", heading: "wonzè", time: "11:00 AM" },
    ],
    [
        { img: "{{ asset('img/time/clock.png') }}", alt: "Midnight Clock", heading: "midi", time: "12:00 PM" },
        { img: "{{ asset('img/time/clock(1).png') }}", alt: "Afternoon Clock", heading: "yonné", time: "1:00 PM" },
        { img: "{{ asset('img/time/clock(2).png') }}", alt: "Afternoon Clock", heading: "dézè", time: "2:00 PM" },
        { img: "{{ asset('img/time/clock(3).png') }}", alt: "Afternoon Clock", heading: "twazè", time: "3:00 PM" },
    ],
    [
        { img: "{{ asset('img/time/clock(4).png') }}", alt: "Afternoon Clock", heading: "katwè", time: "4:00 PM" },
        { img: "{{ asset('img/time/clock(5).png') }}", alt: "Afternoon Clock", heading: "senkè", time: "5:00 PM" },
        { img: "{{ asset('img/time/clock(6).png') }}", alt: "Evening Clock", heading: "sizè", time: "6:00 PM" },
        { img: "{{ asset('img/time/clock(7).png') }}", alt: "Evening Clock", heading: "sétè", time: "7:00 PM" },
    ],
    [
        { img: "{{ asset('img/time/clock(8).png') }}", alt: "Evening Clock", heading: "ywitè", time: "8:00 PM" },
        { img: "{{ asset('img/time/clock(9).png') }}", alt: "Evening Clock", heading: "névè", time: "9:00 PM" },
        { img: "{{ asset('img/time/clock(10).png') }}", alt: "Evening Clock", heading: "dizè", time: "10:00 PM" },
        { img: "{{ asset('img/time/clock(11).png') }}", alt: "Evening Clock", heading: "wonzè", time: "11:00 PM" },
    ],
    [
        { img: "{{ asset('img/time/clock(13).png') }}", alt: "Midnight Clock", heading: "yon ka apwé yonné", time: "1:15 pm" },
        { img: "{{ asset('img/time/clock(14).png') }}", alt: "Morning Clock", heading: "yonné é dimi", time: "1:30 pm" },
        { img: "{{ asset('img/time/clock(15).png') }}", alt: "Noon Clock", heading: "yon ka pou dézè", time: "1:45 pm" },
    ],
];

// Function to translate entered time to Creole
function translateTime() {
    const userInput = document.getElementById("timeSearch").value.trim();
    const translated = convertToCreole(userInput);

    if (translated) {
        document.getElementById("translatedTime").innerText = "In Creole: " + translated;
    } else {
        document.getElementById("translatedTime").innerText = "Invalid time format. Please try again (e.g., 1:10 or 12:00 pm)";
    }
}

// Function to convert time into Creole (realistic format)
function convertToCreole(time) {
    // Regex for matching time like 1:10, 12:15, or 1:00 pm
    const timeRegex = /^(\d{1,2}):(\d{2})(?:\s?(am|pm))?$/i;
    const match = time.match(timeRegex);

    if (match) {
        let hours = parseInt(match[1]);
        let minutes = parseInt(match[2]);
        let period = match[3];

        // Convert to 24-hour format
        if (period) {
            period = period.toLowerCase();
            if (period === "pm" && hours < 12) {
                hours += 12;
            } else if (period === "am" && hours === 12) {
                hours = 0;
            }
        }

        // Handle hour and minute conversion
        let hourInCreole = convertHourToCreole(hours);
        let minuteInCreole = convertMinuteToCreole(minutes, hours);

        // Return realistic Creole time representation
        return formatCreoleTime(hourInCreole, minuteInCreole);
    }
    return null;
}

// Function to convert hours to Creole (1 to 12 hours)
function convertHourToCreole(hour) {
    if (hour === 0 || hour === 24) {
        return "minwit";
    } else if (hour === 12) {
        return "midi";
    }
    return numberToCreole[hour % 12] || hour;
}

// Function to convert minutes to Creole (0 to 59 minutes)
function convertMinuteToCreole(minute, hour) {
    if (minute === 0) {
        return "neditan";
    } else if (minute === 15) {
        return "yon ka apwé " + numberToCreole[hour % 12];
    } else if (minute === 30) {
        return "é dimi";
    } else if (minute === 45) {
        return "yon ka pou " + numberToCreole[(hour + 1) % 12];
    }
    return numberToCreole[minute] ? numberToCreole[minute] + " minit" : minute + " minit";
}

// Function to format the Creole time output
function formatCreoleTime(hour, minute) {
    if (minute === "neditan") {
        return `${hour} ${minute}`;
    }
    return `${hour} ${minute}`;
}

// Render Carousel Items
function renderCarousel() {
    const carouselInner = document.querySelector(".carousel-inner");
    
    timeData.forEach((group, index) => {
        const isActive = index === 0 ? "active" : "";
        const carouselItem = document.createElement("div");
        carouselItem.className = `carousel-item ${isActive}`;
        
        const row = document.createElement("div");
        row.className = "row g-3";

        group.forEach((time) => {
            const col = document.createElement("div");
            col.className = "col-md-3 col-6";
            col.innerHTML = `
                <div class="card h-100">
                    <img src="${time.img}" alt="${time.alt}" class="card-img-top">
                    <div class="card-body text-center">
                        <h3 class="card-title">${time.heading}</h3>
                        <p class="card-text">${time.time}</p>
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
    renderCarousel();
    
    // Enable time search on Enter key
    document.getElementById("timeSearch").addEventListener("keypress", function(e) {
        if (e.key === "Enter") {
            translateTime();
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
    
    .time-img {
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
</style>
@endsection