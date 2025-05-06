<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status Pemesanan</title>
    <!-- CDN Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <!-- Navbar -->
    <div class="bg-gray-300 px-4 py-2 flex items-center space-x-2">
        <button class="text-xl">&larr;</button>
        <button class="text-xl">&#8635;</button>
        <button class="text-xl">&#8962;</button>
        <input type="text" placeholder="Search..." class="ml-4 flex-1 px-2 py-1 rounded border">
    </div>

    <!-- Container -->
    <div class="max-w-xl mx-auto mt-6 bg-white shadow-md rounded">
        <!-- Header -->
        <div class="text-center p-6 border-b">
            <h2 class="text-xl font-bold">Status Pemesanan</h2>
            <p class="text-gray-500">Sedang Diproses</p>
        </div>

        <!-- Item List -->
        <div class="flex items-center p-4 border-b">
            <div class="w-16 h-16 bg-gray-300 rounded mr-4 flex items-center justify-center">
                <img class="rounded-t-lg" src="images/gudeh.jpeg" alt="" />
            </div>
            <div>
                <h3 class="font-semibold">Gudeg</h3>
                <p class="text-gray-600">Rp.30.000</p>
            </div>
        </div>

        <div class="flex items-center p-4 border-b">
            <div class="w-16 h-16 bg-gray-300 rounded mr-4 flex items-center justify-center">
                <img class="rounded-t-lg" src="images/wedangjahe.jpeg" alt="" />
            </div>
            <div>
                <h3 class="font-semibold">Wedang Jahe</h3>
                <p class="text-gray-600">Rp.10.000</p>
            </div>
        </div>

        <!-- Order Summary -->
        <div class="p-4">
            <h3 class="font-bold text-lg mb-2">Pesanan</h3>

            <div class="flex justify-between mb-1">
                <span>Gudeg</span>
                <span>Rp.30.000</span>
            </div>
            <div class="flex justify-between mb-1">
                <span>Wedang Jahe</span>
                <span>Rp.10.000</span>
            </div>
            <div class="flex justify-between mb-1">
                <span>Biaya Pengiriman</span>
                <span>Rp.0.00</span>
            </div>

            <div class="flex justify-between font-bold border-t pt-2 mt-2">
                <span>Total</span>
                <span>Rp.40.000</span>
            </div>
        </div>
    </div>

</body>
</html>
