<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>TailAdmin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    />
  </head>
  <body class="bg-gray-100 font-sans">
    <div class="flex h-screen">
      <!-- Sidebar -->
      <aside class="w-64 bg-white shadow-md p-4 hidden md:block">
        <h1 class="text-xl font-bold mb-6">TailAdmin</h1>
        <nav class="space-y-2">
          <a href="#" class="flex items-center gap-2 text-blue-600 font-semibold">
            <i class="fas fa-chart-line"></i> Dashboard
          </a>
          <a href="#" class="flex items-center gap-2 text-gray-700">
            <i class="fas fa-user"></i> User Profile
          </a>
          <a href="#" class="flex items-center gap-2 text-gray-700">
            <i class="fas fa-tasks"></i> Task
          </a>
          <a href="#" class="flex items-center gap-2 text-gray-700">
            <i class="fas fa-table"></i> Tables
          </a>
          <a href="#" class="flex items-center gap-2 text-gray-700">
            <i class="fas fa-envelope"></i> Email
          </a>
        </nav>
      </aside>

      <!-- Main content -->
      <main class="flex-1 p-6 overflow-auto">
        <!-- Top bar -->
        <div class="flex justify-between items-center mb-6">
          <input
            type="text"
            placeholder="Search..."
            class="px-4 py-2 border rounded-md w-1/3"
          />
          <div class="flex items-center gap-4">
            <button class="text-gray-600"><i class="fas fa-bell"></i></button>
            <img src="https://i.pravatar.cc/32" class="rounded-full" />
          </div>
        </div>

        <!-- Summary cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 mb-6">
          <div class="bg-white p-4 rounded shadow">
            <h4 class="text-sm text-gray-500">Customers</h4>
            <p class="text-2xl font-bold">3,782</p>
          </div>
          <div class="bg-white p-4 rounded shadow">
            <h4 class="text-sm text-gray-500">Orders</h4>
            <p class="text-2xl font-bold">5,359</p>
          </div>
          <div class="bg-white p-4 rounded shadow">
            <h4 class="text-sm text-gray-500">Monthly Target</h4>
            <p class="text-2xl font-bold">75.55%</p>
          </div>
        </div>

        <!-- Charts -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 mb-6">
          <div class="bg-white p-4 rounded shadow">
            <h4 class="font-semibold mb-2">Monthly Sales</h4>
            <div class="bg-blue-100 h-32 flex items-center justify-center text-blue-600">
              [Chart Placeholder]
            </div>
          </div>
          <div class="bg-white p-4 rounded shadow">
            <h4 class="font-semibold mb-2">Statistics</h4>
            <div class="bg-purple-100 h-32 flex items-center justify-center text-purple-600">
              [Chart Placeholder]
            </div>
          </div>
        </div>

        <!-- Bottom Section -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
          <div class="bg-white p-4 rounded shadow">
            <h4 class="font-semibold mb-2">Customer Demographic</h4>
            <div class="h-32 bg-gray-100 flex items-center justify-center">
              [Map Placeholder]
            </div>
          </div>
          <div class="bg-white p-4 rounded shadow">
            <h4 class="font-semibold mb-2">Recent Orders</h4>
            <table class="w-full text-sm">
              <thead>
                <tr class="text-left">
                  <th>Product</th>
                  <th>Category</th>
                  <th>Price</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Macbook Pro</td>
                  <td>Laptop</td>
                  <td>$2199</td>
                  <td class="text-green-600">Delivered</td>
                </tr>
                <tr>
                  <td>Apple Watch Ultra</td>
                  <td>Watch</td>
                  <td>$899</td>
                  <td class="text-yellow-500">Pending</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </main>
    </div>
  </body>
</html>
