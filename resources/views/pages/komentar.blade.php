@extends('layouts.app')

@section('title', 'Detail')

@section('content')
    <style>
        .star-filled {
            color: #f97316;
        }
        .star-empty {
            color: #d1d5db;
        }
        .star-white {
            color: white;
        }
    </style>
</head>
<body>
<div class="bg-gray-50 min-h-screen font-sans">
    <!-- Header -->
    <div class="bg-gradient-to-r from-orange-500 to-amber-500 py-8 text-center border-b border-orange-200 shadow-sm">
        <div class="max-w-4xl mx-auto px-4">
            <h1 class="text-3xl font-bold text-white">Gudeg</h1>
            <div class="flex items-center justify-center mt-2">
                <div class="flex">
                    <i class="fas fa-star star-white text-xl"></i>
                    <i class="fas fa-star star-white text-xl"></i>
                    <i class="fas fa-star star-white text-xl"></i>
                    <i class="fas fa-star star-white text-xl"></i>
                    <i class="fas fa-star-half-alt star-white text-xl"></i>
                </div>
                <span class="ml-2 text-white font-semibold">4.5 (128 reviews)</span>
            </div>
        </div>
    </div>

    <!-- Comments Section -->
    <div class="max-w-4xl mx-auto px-4 py-8 space-y-6">
        <!-- Comment 1 -->
        <div class="bg-white rounded-lg shadow-md p-6 border border-orange-100 hover:shadow-lg transition-shadow duration-200">
            <div class="flex items-start space-x-4">
                <!-- Avatar -->
                <div class="w-14 h-14 bg-orange-100 rounded-full flex items-center justify-center text-orange-500">
                    <i class="fas fa-user text-2xl"></i>
                </div>

                <!-- Comment Content -->
                <div class="flex-1">
                    <div class="flex justify-between items-center">
                        <h3 class="font-semibold text-gray-800 text-lg">John Doe</h3>
                        <span class="text-sm text-gray-500">2 days ago</span>
                    </div>
                    
                    <!-- Rating -->
                    <div class="flex space-x-1 my-2">
                        <i class="fas fa-star star-filled"></i>
                        <i class="fas fa-star star-filled"></i>
                        <i class="fas fa-star star-filled"></i>
                        <i class="fas fa-star star-filled"></i>
                        <i class="fas fa-star star-empty"></i>
                    </div>
                    
                    <!-- Comment Text -->
                    <p class="text-gray-600 mt-2">
                        The Gudeg here is absolutely delicious! The flavors are perfectly balanced between sweet and savory. The meat was so tender it practically melted in my mouth. Highly recommend!
                    </p>
                </div>
            </div>
        </div>

        <!-- Comment 2 -->
        <div class="bg-white rounded-lg shadow-md p-6 border border-orange-100 hover:shadow-lg transition-shadow duration-200">
            <div class="flex items-start space-x-4">
                <!-- Avatar -->
                <div class="w-14 h-14 bg-orange-100 rounded-full flex items-center justify-center text-orange-500">
                    <i class="fas fa-user text-2xl"></i>
                </div>

                <!-- Comment Content -->
                <div class="flex-1">
                    <div class="flex justify-between items-center">
                        <h3 class="font-semibold text-gray-800 text-lg">Jane Smith</h3>
                        <span class="text-sm text-gray-500">1 week ago</span>
                    </div>
                    
                    <!-- Rating -->
                    <div class="flex space-x-1 my-2">
                        <i class="fas fa-star star-filled"></i>
                        <i class="fas fa-star star-filled"></i>
                        <i class="fas fa-star star-filled"></i>
                        <i class="fas fa-star star-filled"></i>
                        <i class="fas fa-star star-filled"></i>
                    </div>
                    
                    <!-- Comment Text -->
                    <p class="text-gray-600 mt-2">
                        Best Gudeg I've ever had! The portion size was generous and the price was very reasonable. The atmosphere of the place was also very cozy and traditional. Will definitely come back!
                    </p>
                </div>
            </div>
        </div>

        <!-- Add Comment Form -->
        <div class="bg-white rounded-lg shadow-md p-6 border border-orange-100">
            <h3 class="font-semibold text-gray-800 text-lg mb-4">Add Your Review</h3>
            <form>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-medium mb-2" for="rating">
                        Your Rating
                    </label>
                    <div class="flex space-x-2" id="rating">
                        <i class="far fa-star text-2xl cursor-pointer star-rating" data-rating="1"></i>
                        <i class="far fa-star text-2xl cursor-pointer star-rating" data-rating="2"></i>
                        <i class="far fa-star text-2xl cursor-pointer star-rating" data-rating="3"></i>
                        <i class="far fa-star text-2xl cursor-pointer star-rating" data-rating="4"></i>
                        <i class="far fa-star text-2xl cursor-pointer star-rating" data-rating="5"></i>
                    </div>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-medium mb-2" for="comment">
                        Your Review
                    </label>
                    <textarea id="comment" rows="4" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-orange-500" placeholder="Share your experience..."></textarea>
                </div>
                <button type="submit" class="bg-orange-500 hover:bg-orange-600 text-white font-medium py-2 px-6 rounded-md transition-colors duration-200">
                    Submit Review
                </button>
            </form>
        </div>
    </div>
</div>

<script>
    // Star rating functionality
    document.querySelectorAll('.star-rating').forEach(star => {
        star.addEventListener('click', function() {
            const rating = parseInt(this.getAttribute('data-rating'));
            const stars = document.querySelectorAll('.star-rating');
            
            stars.forEach((s, index) => {
                if (index < rating) {
                    s.classList.remove('far');
                    s.classList.add('fas', 'star-filled');
                } else {
                    s.classList.remove('fas', 'star-filled');
                    s.classList.add('far');
                }
            });
        });
    });
</script>
</body>
@endsection