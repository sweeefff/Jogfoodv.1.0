<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Rating</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .star-rating {
            display: inline-flex;
            direction: rtl;
        }
        .star-rating input {
            display: none;
        }
        .star-rating label {
            color: #e5e7eb;
            font-size: 2.5rem;
            padding: 0 5px;
            cursor: pointer;
            transition: all 0.2s ease;
        }
        .star-rating input:checked ~ label,
        .star-rating label:hover,
        .star-rating label:hover ~ label {
            color: #f97316;
            transform: scale(1.1);
        }
        .animate-pulse {
            animation: pulse 2s infinite;
        }
        @keyframes pulse {
            0%, 100% {
                opacity: 1;
            }
            50% {
                opacity: 0.7;
            }
        }
    </style>
</head>
<body>
@extends('layouts.app')

@section('title', 'Detail')

@section('content')

<script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        amber: {
                            50: '#fff7ed',
                            100: '#ffedd5',
                            200: '#fed7aa',
                            300: '#fdba74',
                            400: '#fb923c',
                            500: '#f97316',
                            600: '#ea580c',
                            700: '#c2410c',
                            800: '#9a3412',
                            900: '#7c2d12',
                        }
                    }
                }
            }
        }
    </script>

<div class="min-h-screen bg-gradient-to-b from-orange-50 to-orange-100 flex items-center justify-center p-4">
    <div class="max-w-md w-full bg-white rounded-2xl shadow-lg overflow-hidden transition-all duration-300 hover:shadow-xl">
        <!-- Header with decorative orange bar -->
        <div class="h-2 bg-gradient-to-r from-orange-400 to-orange-600"></div>
        
        <div class="p-6">
            <!-- Thank you message -->
            <div class="text-center mb-6">
                <i class="fas fa-heart text-orange-500 text-4xl mb-3 animate-pulse"></i>
                <h2 class="text-2xl font-bold text-gray-800">Terima Kasih!</h2>
                <p class="text-gray-600 mt-1">Silakan berikan penilaian untuk produk ini</p>
            </div>

            <!-- Product Info -->
            <div class="flex items-center space-x-4 p-4 bg-orange-50 rounded-xl">
                <img src="https://via.placeholder.com/100" class="w-16 h-16 object-cover rounded-lg border-2 border-orange-200" alt="Product Image">
                <div>
                    <h3 class="text-lg font-semibold text-gray-800">Gudeg</h3>
                    <p class="text-sm text-gray-500">Pedas</p>
                    <div class="flex items-center mt-1">
                        <span class="text-yellow-400 text-sm">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </span>
                        <span class="text-gray-500 text-xs ml-1">(4.5)</span>
                    </div>
                </div>
            </div>

            <!-- Rating Section -->
            <div class="mt-8">
                <h2 class="text-xl font-bold text-center text-orange-600 mb-6">Bagaimana kualitas produknya?</h2>
                
                <!-- Star Rating -->
                <div class="flex justify-center">
                    <div class="star-rating">
                        <input id="star5" type="radio" name="rating" value="5">
                        <label for="star5" title="Sangat Baik">★</label>
                        
                        <input id="star4" type="radio" name="rating" value="4">
                        <label for="star4" title="Baik">★</label>
                        
                        <input id="star3" type="radio" name="rating" value="3">
                        <label for="star3" title="Cukup">★</label>
                        
                        <input id="star2" type="radio" name="rating" value="2">
                        <label for="star2" title="Kurang">★</label>
                        
                        <input id="star1" type="radio" name="rating" value="1">
                        <label for="star1" title="Buruk">★</label>
                    </div>
                </div>
                
                <p class="text-center text-gray-500 text-sm mt-3">Pilih 1-5 bintang</p>
                
                <!-- Optional comment -->
                <div class="mt-6">
                    <label for="comment" class="block text-sm font-medium text-gray-700 mb-1">Komentar (opsional)</label>
                    <textarea id="comment" rows="2" class="w-full px-3 py-2 text-gray-700 border border-orange-200 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition" placeholder="Bagaimana pengalaman Anda dengan produk ini?"></textarea>
                </div>
            </div>

            <!-- Buttons -->
            <div class="mt-8 flex justify-between">
                <button class="px-6 py-2 text-gray-600 font-medium rounded-lg border border-gray-300 hover:bg-gray-50 transition flex items-center">
                    <i class="far fa-clock mr-2"></i> Nanti Saja
                </button>
                <button id="submitBtn" class="px-6 py-2 bg-gradient-to-r from-orange-500 to-orange-600 text-white font-medium rounded-lg hover:from-orange-600 hover:to-orange-700 transition flex items-center disabled:opacity-50 disabled:cursor-not-allowed" disabled>
                    <i class="fas fa-check mr-2"></i> Kirim Penilaian
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    // Star rating interaction
    const stars = document.querySelectorAll('.star-rating input');
    const submitBtn = document.getElementById('submitBtn');
    
    stars.forEach(star => {
        star.addEventListener('change', function() {
            const ratingValue = this.value;
            console.log(`Selected rating: ${ratingValue}`);
            
            // Enable submit button when rating is selected
            submitBtn.disabled = false;
            
            // Add visual feedback
            const labels = document.querySelectorAll('.star-rating label');
            labels.forEach(label => label.style.transform = 'scale(1)');
            this.nextElementSibling.style.transform = 'scale(1.2)';
        });
    });
    
    // Optional: Add hover effect for stars
    document.querySelectorAll('.star-rating label').forEach(label => {
        label.addEventListener('mouseenter', function() {
            if (!document.querySelector('.star-rating input:checked')) {
                this.style.transform = 'scale(1.2)';
                const nextLabels = getAllNextSiblings(this);
                nextLabels.forEach(label => label.style.transform = 'scale(1.2)');
            }
        });
        
        label.addEventListener('mouseleave', function() {
            if (!document.querySelector('.star-rating input:checked')) {
                const labels = document.querySelectorAll('.star-rating label');
                labels.forEach(label => label.style.transform = 'scale(1)');
            }
        });
    });
    
    function getAllNextSiblings(element) {
        const siblings = [];
        let next = element.nextElementSibling;
        while (next) {
            siblings.push(next);
            next = next.nextElementSibling;
        }
        return siblings;
    }
</script>
@endsection
</body>
</html>