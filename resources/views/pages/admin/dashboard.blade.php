@extends('layouts.appadm')

@section('title', 'Dashboard')
@section('content')
  <!-- Content -->
  <div class="p-4 sm:ml-64 pt-20 bg-amber-50"> <!-- Margin left responsif dan padding top -->
    <h3 class="text-xl font-semibold mb-4 flex items-center">
    <i class="fas fa-tachometer-alt mr-2"></i> Dashboard
    </h3>

    <!-- Dashboard Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 text-white">
    <div class="bg-blue-600 rounded-lg p-4">
      <h5 class="text-lg font-bold flex items-center">
      <i class="fas fa-mortar-pestle mr-2"></i> Kuliner
      </h5>
      <p class="mt-2">Total: <strong>1000</strong></p>
    </div>

    <div class="bg-red-600 rounded-lg p-4">
      <h5 class="text-lg font-bold flex items-center">
      <i class="fas fa-wine-glass mr-2"></i> Minuman
      </h5>
      <p class="mt-2">Total: <strong>1000</strong></p>
    </div>

    <div class="bg-green-700 rounded-lg p-4">
      <h5 class="text-lg font-bold flex items-center">
      <i class="fas fa-utensils mr-2"></i> Restoran
      </h5>
      <p class="mt-2">Total: <strong>1000</strong></p>
    </div>

    <div class="bg-yellow-500 rounded-lg p-4 text-black">
      <h5 class="text-lg font-bold flex items-center">
      <i class="fas fa-users mr-2"></i> User
      </h5>
      <p class="mt-2">Total: <strong>10000</strong></p>
    </div>
    </div>
  </div>
@endsection