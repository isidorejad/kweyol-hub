@extends('layouts.app')
@section('content')
@section('title', 'Numbers')
@section('description', 'Learn numbers in Kwéyòl, the Creole language of St. Lucia. From 1 to 100,000, get familiar with the numbers you need every day.')
@section('keywords', 'Kwéyòl, St. Lucia, Numbers, Language Learning, Culture, Heritage')
@section('author', 'Kwéyòl Hub Team')

<section class="hero">
    <div class="hero-overlay"></div>
    <div class="hero-content">
        <h1 class="display-4 fw-bold">Count in Creole! (Sé Limowo-a)</h1>
        <p class="lead">Discover Numbers in the Kwéyòl language and understand their role in everyday life.</p>
        
        <div class="input-group mb-3" style="max-width: 500px; margin: 0 auto;">
            <input type="number" id="numberInput" class="form-control" 
                   placeholder="Enter a number (1 to 999,999)" 
                   min="1" max="999999">
            <button class="btn btn-primary" onclick="translateNumber()">
                <i class="bx bx-search-alt"></i> Translate
            </button>
        </div>
        
        <div id="result" class="result-box fs-4"></div>
    </div>
</section>

<div class="container mt-5 mb-5">
    <h2 class="text-center mb-4">Sé Limowo-a</h2>
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover align-middle">
            <thead class="table-dark text-center">
                <tr>
                    <th>Number in English</th>
                    <th>Creole Translation</th>
                    <th>Number in English</th>
                    <th>Creole Translation</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <tr><td>1</td><td>yonn</td><td>31</td><td>twantenyen</td></tr>
                <tr><td>2</td><td>dé</td><td>32</td><td>twant dé</td></tr>
                <tr><td>3</td><td>twa</td><td>40</td><td>kawant</td></tr>
                <tr><td>4</td><td>kat</td><td>41</td><td>kawant yonn</td></tr>
                <tr><td>5</td><td>senk</td><td>42</td><td>kawant dé</td></tr>
                <tr><td>6</td><td>sis</td><td>50</td><td>senkant</td></tr>
                <tr><td>7</td><td>sèt</td><td>51</td><td>senkantenyen</td></tr>
                <tr><td>8</td><td>wit</td><td>52</td><td>senkant dé</td></tr>
                <tr><td>9</td><td>nèf</td><td>60</td><td>swasant</td></tr>
                <tr><td>10</td><td>dis</td><td>61</td><td>swasantenyen</td></tr>
                <tr><td>11</td><td>wonz</td><td>62</td><td>swasant dé</td></tr>
                <tr><td>12</td><td>douz</td><td>70</td><td>swasant dis</td></tr>
                <tr><td>13</td><td>trèz</td><td>71</td><td>swasant onz</td></tr>
                <tr><td>14</td><td>katoz</td><td>72</td><td>swasant douz</td></tr>
                <tr><td>15</td><td>kenz</td><td>80</td><td>katwiven</td></tr>
                <tr><td>16</td><td>sèz</td><td>81</td><td>katwiven yonn</td></tr>
                <tr><td>17</td><td>disèt</td><td>82</td><td>katwiven dé</td></tr>
                <tr><td>18</td><td>divit</td><td>90</td><td>katwiven dis</td></tr>
                <tr><td>19</td><td>dinèf</td><td>91</td><td>katwiven onz</td></tr>
                <tr><td>20</td><td>vent</td><td>92</td><td>katwiven douz</td></tr>
                <tr><td>21</td><td>venten</td><td>100</td><td>san</td></tr>
                <tr><td>22</td><td>ventdé</td><td>101</td><td>santenyen</td></tr>
                <tr><td>23</td><td>venttwa</td><td>102</td><td>san dé</td></tr>
                <tr><td>24</td><td>ventkat</td><td>1000</td><td>mil</td></tr>
                <tr><td>25</td><td>vensenk</td><td>1st</td><td>pwmèyé</td></tr>
                <tr><td>26</td><td>vensis</td><td>2nd</td><td>dézyenm</td></tr>
                <tr><td>27</td><td>vensèt</td><td>3rd</td><td>twazyenm</td></tr>
                <tr><td>28</td><td>ventwit</td><td>4th</td><td>katyèm</td></tr>
                <tr><td>29</td><td>ventnèf</td><td>5th</td><td>senkyenm</td></tr>
                <tr><td>30</td><td>twant</td><td>10th</td><td>dizyèm</td></tr>
            </tbody>
        </table>
    </div>
</div>

<style>
    .hero-content {
        //max-width: 1200px;
        margin: 0 auto;
        text-align: center;
    }
    
    #numberInput {
        font-size: 1.1rem;
    }
    
    .result-box {
        background-color: rgba(255, 255, 255, 0.2);
        border-radius: 8px;
        padding: 15px;
        margin-top: 20px;
        max-width: 600px;
        margin-left: auto;
        margin-right: auto;
        color: white;
        min-height: 60px;
    }
    
    table th {
        font-weight: 600;
    }
    
    table td {
        font-size: 1.05rem;
    }
    
    @media (max-width: 768px) {
        table th, table td {
            padding: 8px 4px;
            font-size: 0.95rem;
        }
    }
</style>

<script>
    // Creole numbers data with extended range
    const creoleNumbers = {
        0: "zèwo",
        1: 'yonn', 2: 'dé', 3: 'twa', 4: 'kat', 5: 'senk', 
        6: 'sis', 7: 'sèt', 8: 'wit', 9: 'nèf', 10: 'dis',
        11: 'wonz', 12: 'douz', 13: 'trèz', 14: 'katoz', 15: 'kenz',
        16: 'sèz', 17: 'disèt', 18: 'dizwit', 19: 'dinèf', 20: 'vent',
        30: 'twant', 40: 'kawant', 50: 'senkant', 60: 'swasant',
        70: 'swasant-dis', 80: 'katwiven', 90: 'katwiven-dis',
        100: 'san', 1000: 'mil', 1000000: 'milyon'
    };

    // Function to build the Creole term for large numbers
    function getCreoleNumber(num) {
        if (num === 0) return creoleNumbers[0];
        if (num <= 20) return creoleNumbers[num] || '';
        
        // Numbers 21-99
        if (num < 100) {
            const tens = Math.floor(num / 10) * 10;
            const unit = num % 10;
            if (num >= 21 && num <= 29) {
                return 'vent' + (unit === 1 ? 'en' : creoleNumbers[unit] || '');
            }
            return creoleNumbers[tens] + (unit ? (tens === 70 || tens === 90 ? '' : ' ') + 
                   (unit === 1 ? 'enyen' : creoleNumbers[unit]) : '');
        }
        
        // Numbers 100-999
        if (num < 1000) {
            const hundreds = Math.floor(num / 100);
            const remainder = num % 100;
            return (hundreds > 1 ? creoleNumbers[hundreds] + ' san' : 'san') + 
                   (remainder ? ' ' + getCreoleNumber(remainder) : '');
        }
        
        // Numbers 1,000-999,999
        if (num < 1000000) {
            const thousands = Math.floor(num / 1000);
            const remainder = num % 1000;
            return (thousands > 1 ? getCreoleNumber(thousands) + ' mil' : 'mil') + 
                   (remainder ? ' ' + getCreoleNumber(remainder) : '');
        }
        
        // Numbers 1,000,000+
        if (num < 1000000000) {
            const millions = Math.floor(num / 1000000);
            const remainder = num % 1000000;
            return getCreoleNumber(millions) + ' milyon' + 
                   (remainder ? ' ' + getCreoleNumber(remainder) : '');
        }
        
        return 'Nomb two gwan (Number too large)';
    }

    // Function to display the Creole term for the entered number
    function translateNumber() {
        const input = document.getElementById("numberInput").value.trim();
        const num = parseInt(input, 10);
        const result = document.getElementById("result");
        
        if (input === "") {
            result.innerHTML = '<i class="bx bx-info-circle"></i> Please enter a number';
            return;
        }
        
        if (isNaN(num) || num < 0 || num > 999999) {
            result.innerHTML = `<i class="bx bx-error"></i> Please enter a valid number between 0 and 999,999`;
        } else {
            const ordinalSuffixes = {
                1: 'pwmèyé', 2: 'dézyenm', 3: 'twazyenm',
                4: 'katyèm', 5: 'senkyenm', 10: 'dizyèm'
            };
            
            let ordinal = '';
            if (input.endsWith('st') || input.endsWith('nd') || input.endsWith('rd') || input.endsWith('th')) {
                ordinal = ordinalSuffixes[num] || '';
            }
            
            const creoleNumber = getCreoleNumber(num);
            result.innerHTML = ordinal 
                ? `<strong>${num}<sup>${input.match(/\D+/)?.[0] || 'th'}</sup>:</strong> ${ordinal}`
                : `<strong>${num}:</strong> ${creoleNumber}`;
        }
    }

    // Allow Enter key to trigger translation
    document.getElementById("numberInput").addEventListener("keyup", function(event) {
        if (event.key === "Enter") {
            translateNumber();
        }
    });

    // Initialize with empty result box
    document.addEventListener("DOMContentLoaded", function() {
        document.getElementById("result").innerHTML = '<i class="bx bx-info-circle"></i> Enter a number to see its translation';
    });
</script>
@endsection