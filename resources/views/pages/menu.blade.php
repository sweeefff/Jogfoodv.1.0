@extends('layouts.app')

@section('title', 'Menu Makanan')

@section('content')
    <link rel=stylesheet href="assets/css/menu.css">
    <div class="bg-white flex justify-center py-12">
        <div class="max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">
                    MENU MAKANAN
                </h2>
                <p class="mt-3 max-w-2xl mx-auto text-xl text-gray-500 sm:mt-4">
                    Temukan berbagai kuliner khas Jogja yang lezat
                </p>
            </div>
        </div>
    </div>

    <!-- Sort by dropdown -->
    <div class="max-w-7xl mx-auto px-4 flex justify-end mb-4">
        <div class="sort-dropdown">
            <button
                class="flex items-center text-gray-700 bg-white border border-gray-300 rounded-lg px-4 py-2 hover:bg-gray-50">
                <i class="fas fa-sort mr-2"></i>
                Sort by: <span class="ml-1 font-medium">Popularity</span>
                <i class="fas fa-chevron-down ml-2 text-xs"></i>
            </button>
            <div class="sort-dropdown-content">
                <a href="#" class="sort-option font-semibold text-amber-600" data-sort="popularity"
                    onclick="sortFoodCards('popularity')">
                    <i class="fas fa-star mr-2"></i>Popularity
                </a>
                <a href="#" class="sort-option" data-sort="price-low" onclick="sortFoodCards('price-low')">
                    <i class="fas fa-arrow-down mr-2"></i>Price: Low to High
                </a>
                <a href="#" class="sort-option" data-sort="price-high" onclick="sortFoodCards('price-high')">
                    <i class="fas fa-arrow-up mr-2"></i>Price: High to Low
                </a>
                <a href="#" class="sort-option" data-sort="name" onclick="sortFoodCards('name')">
                    <i class="fas fa-sort-alpha-down mr-2"></i>Alphabetical
                </a>
            </div>
        </div>
    </div>

    <div class="food-cards-container flex flex-wrap justify-center gap-6 mt-4 max-w-7xl mx-auto px-4">
        <a href="detail"
            class="food-card block group relative bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-shadow duration-300">
            <div class="aspect-w-1 aspect-h-1 w-full overflow-hidden rounded-t-lg bg-gray-200">
                <img src="assets/img/gudeg.jpg" alt="Food Name"
                    class="h-60 w-full object-cover object-center food-image transition duration-300">
            </div>
            <div class="p-4">
                <div class="flex justify-between items-start">
                    <div>
                        <h3 class="text-lg font-medium text-gray-900">Food Name</h3>
                        <p class="mt-1 text-sm text-gray-500">Food Description</p>
                    </div>
                    <div class="flex items-center">
                        <svg class="w-4 h-4 text-yellow-300 me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 22 20">
                            <path
                                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                        </svg>
                        <svg class="w-4 h-4 text-yellow-300 me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 22 20">
                            <path
                                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                        </svg>
                        <svg class="w-4 h-4 text-yellow-300 me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 22 20">
                            <path
                                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                        </svg>
                        <svg class="w-4 h-4 text-yellow-300 me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 22 20">
                            <path
                                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                        </svg>
                        <svg class="w-4 h-4 text-gray-300 me-1 dark:text-gray-500" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                            <path
                                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                        </svg>
                        <p class="ms-1 text-sm font-medium text-gray-500 dark:text-amber-800">4.95</p>
                    </div>
                </div>
                <div class="mt-4 flex justify-between items-center">
                    <div class="flex items-center">
                        <i class="fas fa-utensils text-gray-400 text-sm mr-1"></i>
                        <span class="text-gray-500 text-sm">Merchant Name</span>
                    </div>
                    <span class="text-gray-900 font-medium">Rp 30.000</span>
                </div>
                <div class="flex items-center justify-center w-full mt-4">
                    <button type="button"
                        class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 
                                    focus:ring-green-300 font-medium rounded-lg text-sm px-16 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Add
                        to Cart</button>
                </div>
            </div>
        </a>

        <!-- Card 2 -->
        <a href="detail"
            class="food-card block group relative bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-shadow duration-300">
            <div class="aspect-w-1 aspect-h-1 w-full overflow-hidden rounded-t-lg bg-gray-200">
                <img src="assets/img/gudeg.jpg" alt="Food Name"
                    class="h-60 w-full object-cover object-center food-image transition duration-300">
            </div>
            <div class="p-4">
                <div class="flex justify-between items-start">
                    <div>
                        <h3 class="text-lg font-medium text-gray-900">Food Name</h3>
                        <p class="mt-1 text-sm text-gray-500">Food Description</p>
                    </div>
                    <div class="flex items-center">
                        <svg class="w-4 h-4 text-yellow-300 me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 22 20">
                            <path
                                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                        </svg>
                        <svg class="w-4 h-4 text-yellow-300 me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 22 20">
                            <path
                                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                        </svg>
                        <svg class="w-4 h-4 text-yellow-300 me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 22 20">
                            <path
                                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                        </svg>
                        <svg class="w-4 h-4 text-yellow-300 me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 22 20">
                            <path
                                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                        </svg>
                        <svg class="w-4 h-4 text-gray-300 me-1 dark:text-gray-500" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                            <path
                                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                        </svg>
                        <p class="ms-1 text-sm font-medium text-gray-500 dark:text-amber-800">4.95</p>
                    </div>
                </div>
                <div class="mt-4 flex justify-between items-center">
                    <div class="flex items-center">
                        <i class="fas fa-utensils text-gray-400 text-sm mr-1"></i>
                        <span class="text-gray-500 text-sm">Merchant Name</span>
                    </div>
                    <span class="text-gray-900 font-medium">Rp 30.000</span>
                </div>
                <div class="flex items-center justify-center w-full mt-4">
                    <button type="button"
                        class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 
                                    focus:ring-green-300 font-medium rounded-lg text-sm px-16 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Add
                        to Cart</button>
                </div>
            </div>
        </a>

        <!-- Card 3 -->
        <a href="detail"
            class="food-card block group relative bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-shadow duration-300">
            <div class="aspect-w-1 aspect-h-1 w-full overflow-hidden rounded-t-lg bg-gray-200">
                <img src="assets/img/gudeg.jpg" alt="Food Name"
                    class="h-60 w-full object-cover object-center food-image transition duration-300">
            </div>
            <div class="p-4">
                <div class="flex justify-between items-start">
                    <div>
                        <h3 class="text-lg font-medium text-gray-900">Food Name</h3>
                        <p class="mt-1 text-sm text-gray-500">Food Description</p>
                    </div>
                    <div class="flex items-center">
                        <svg class="w-4 h-4 text-yellow-300 me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 22 20">
                            <path
                                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                        </svg>
                        <svg class="w-4 h-4 text-yellow-300 me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 22 20">
                            <path
                                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                        </svg>
                        <svg class="w-4 h-4 text-yellow-300 me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 22 20">
                            <path
                                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                        </svg>
                        <svg class="w-4 h-4 text-yellow-300 me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 22 20">
                            <path
                                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                        </svg>
                        <svg class="w-4 h-4 text-gray-300 me-1 dark:text-gray-500" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                            <path
                                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                        </svg>
                        <p class="ms-1 text-sm font-medium text-gray-500 dark:text-amber-800">4.95</p>
                    </div>
                </div>
                <div class="mt-4 flex justify-between items-center">
                    <div class="flex items-center">
                        <i class="fas fa-utensils text-gray-400 text-sm mr-1"></i>
                        <span class="text-gray-500 text-sm">Merchant Name</span>
                    </div>
                    <span class="text-gray-900 font-medium">Rp 30.000</span>
                </div>
                <div class="flex items-center justify-center w-full mt-4">
                    <button type="button"
                        class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 
                                    focus:ring-green-300 font-medium rounded-lg text-sm px-16 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Add
                        to Cart</button>
                </div>
            </div>
        </a>


        <!-- Card 4 -->
        <a href="detail"
            class="food-card block group relative bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-shadow duration-300">
            <div class="aspect-w-1 aspect-h-1 w-full overflow-hidden rounded-t-lg bg-gray-200">
                <img src="assets/img/gudeg.jpg" alt="Food Name"
                    class="h-60 w-full object-cover object-center food-image transition duration-300">
            </div>
            <div class="p-4">
                <div class="flex justify-between items-start">
                    <div>
                        <h3 class="text-lg font-medium text-gray-900">Food Name</h3>
                        <p class="mt-1 text-sm text-gray-500">Food Description</p>
                    </div>
                    <div class="flex items-center">
                        <svg class="w-4 h-4 text-yellow-300 me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 22 20">
                            <path
                                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                        </svg>
                        <svg class="w-4 h-4 text-yellow-300 me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 22 20">
                            <path
                                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                        </svg>
                        <svg class="w-4 h-4 text-yellow-300 me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 22 20">
                            <path
                                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                        </svg>
                        <svg class="w-4 h-4 text-yellow-300 me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 22 20">
                            <path
                                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                        </svg>
                        <svg class="w-4 h-4 text-gray-300 me-1 dark:text-gray-500" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                            <path
                                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                        </svg>
                        <p class="ms-1 text-sm font-medium text-gray-500 dark:text-amber-800">4.95</p>
                    </div>
                </div>
                <div class="mt-4 flex justify-between items-center">
                    <div class="flex items-center">
                        <i class="fas fa-utensils text-gray-400 text-sm mr-1"></i>
                        <span class="text-gray-500 text-sm">Merchant Name</span>
                    </div>
                    <span class="text-gray-900 font-medium">Rp 30.000</span>
                </div>
                <div class="flex items-center justify-center w-full mt-4">
                    <button type="button"
                        class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 
                                    focus:ring-green-300 font-medium rounded-lg text-sm px-16 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Add
                        to Cart</button>
                </div>
            </div>
        </a>


        <!-- Card 5 -->
        <a href="detail"
            class="food-card block group relative bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-shadow duration-300">
            <div class="aspect-w-1 aspect-h-1 w-full overflow-hidden rounded-t-lg bg-gray-200">
                <img src="assets/img/gudeg.jpg" alt="Food Name"
                    class="h-60 w-full object-cover object-center food-image transition duration-300">
            </div>
            <div class="p-4">
                <div class="flex justify-between items-start">
                    <div>
                        <h3 class="text-lg font-medium text-gray-900">Food Name</h3>
                        <p class="mt-1 text-sm text-gray-500">Food Description</p>
                    </div>
                    <div class="flex items-center">
                        <svg class="w-4 h-4 text-yellow-300 me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 22 20">
                            <path
                                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                        </svg>
                        <svg class="w-4 h-4 text-yellow-300 me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 22 20">
                            <path
                                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                        </svg>
                        <svg class="w-4 h-4 text-yellow-300 me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 22 20">
                            <path
                                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                        </svg>
                        <svg class="w-4 h-4 text-yellow-300 me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 22 20">
                            <path
                                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                        </svg>
                        <svg class="w-4 h-4 text-gray-300 me-1 dark:text-gray-500" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                            <path
                                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                        </svg>
                        <p class="ms-1 text-sm font-medium text-gray-500 dark:text-amber-800">4.95</p>
                    </div>
                </div>
                <div class="mt-4 flex justify-between items-center">
                    <div class="flex items-center">
                        <i class="fas fa-utensils text-gray-400 text-sm mr-1"></i>
                        <span class="text-gray-500 text-sm">Merchant Name</span>
                    </div>
                    <span class="text-gray-900 font-medium">Rp 30.000</span>
                </div>
                <div class="flex items-center justify-center w-full mt-4">
                    <button type="button"
                        class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 
                                    focus:ring-green-300 font-medium rounded-lg text-sm px-16 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Add
                        to Cart</button>
                </div>
            </div>
        </a>


        <!-- Card 6 -->
        <a href="detail"
            class="food-card block group relative bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-shadow duration-300">
            <div class="aspect-w-1 aspect-h-1 w-full overflow-hidden rounded-t-lg bg-gray-200">
                <img src="assets/img/gudeg.jpg" alt="Food Name"
                    class="h-60 w-full object-cover object-center food-image transition duration-300">
            </div>
            <div class="p-4">
                <div class="flex justify-between items-start">
                    <div>
                        <h3 class="text-lg font-medium text-gray-900">Food Name</h3>
                        <p class="mt-1 text-sm text-gray-500">Food Description</p>
                    </div>
                    <div class="flex items-center">
                        <svg class="w-4 h-4 text-yellow-300 me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 22 20">
                            <path
                                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                        </svg>
                        <svg class="w-4 h-4 text-yellow-300 me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 22 20">
                            <path
                                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                        </svg>
                        <svg class="w-4 h-4 text-yellow-300 me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 22 20">
                            <path
                                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                        </svg>
                        <svg class="w-4 h-4 text-yellow-300 me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 22 20">
                            <path
                                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                        </svg>
                        <svg class="w-4 h-4 text-gray-300 me-1 dark:text-gray-500" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                            <path
                                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                        </svg>
                        <p class="ms-1 text-sm font-medium text-gray-500 dark:text-amber-800">4.95</p>
                    </div>
                </div>
                <div class="mt-4 flex justify-between items-center">
                    <div class="flex items-center">
                        <i class="fas fa-utensils text-gray-400 text-sm mr-1"></i>
                        <span class="text-gray-500 text-sm">Merchant Name</span>
                    </div>
                    <span class="text-gray-900 font-medium">Rp 30.000</span>
                </div>
                <div class="flex items-center justify-center w-full mt-4">
                    <button type="button"
                        class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 
                                    focus:ring-green-300 font-medium rounded-lg text-sm px-16 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Add
                        to Cart</button>
                </div>
            </div>
        </a>


        <!-- Pagination -->
        <div class="flex justify-center mt-8 mb-12">
            <nav class="inline-flex rounded-md shadow">
                <a href="#" class="px-3 py-2 rounded-l-md border border-gray-300 bg-white text-gray-500 hover:bg-gray-50">
                    Previous
                </a>
                <a href="#" class="px-3 py-2 border-t border-b border-gray-300 bg-white text-gray-500 hover:bg-gray-50">
                    1
                </a>
                <a href="#" class="px-3 py-2 border border-gray-300 bg-white text-gray-500 hover:bg-gray-50">
                    2
                </a>
                <a href="#" class="px-3 py-2 border border-gray-300 bg-white text-gray-500 hover:bg-gray-50">
                    3
                </a>
                <a href="#" class="px-3 py-2 rounded-r-md border border-gray-300 bg-white text-gray-500 hover:bg-gray-50">
                    Next
                </a>
            </nav>
        </div>
    </div>
@endsection