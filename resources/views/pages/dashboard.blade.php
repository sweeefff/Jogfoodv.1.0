<!DOCTYPE html>
<html lang="en">
<title>Jogfood</title>
<!-- favicon-->
<link rel="icon" href="assets/icon/favicon.png" type="image/x-icon">

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!--Bootstrap4 link -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
<link href="assets/css/flowbite.min.css" rel="stylesheet" />
<script src="assets/css/flowbite.min.js"></script>
<script>
  tailwind.config = {
    theme: {
      extend: {
        colors: {
          amber: {
            100: "#f7dccd",
            200: "#efb99b",
            300: "#e6976a",
            400: "#de7438",
            500: "#d65106",
            600: "#ab4105",
            700: "#803104",
            800: "#562002",
            900: "#2b1001"
          },
        }
      }
    }
  }
</script>

<body>
  <!-- Navbar -->

  <nav class="fixed top-0 z-50 w-full bg-amber-800 border-b border-amber-200 dark:bg-amber-800 dark:border-amber-800">
    <div class="px-3 py-3 lg:px-5 lg:pl-3">
      <div class="flex items-center justify-between">
        <div class="flex items-center justify-start rtl:justify-end">
          <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar"
            type="button"
            class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
            <span class="sr-only">Open sidebar</span>
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
              xmlns="http://www.w3.org/2000/svg">
              <path clip-rule="evenodd" fill-rule="evenodd"
                d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
              </path>
            </svg>
          </button>
          <a href="#" class="flex ms-2 md:me-24">
            <img src="assets/icon/jogfood.png" class="h-8 me-3" alt="FlowBite Logo" />
            <span class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap dark:text-white">Selamat
              Datang, Admin</span>
          </a>
        </div>
        <div class="flex items-center">
          <div class="flex items-center ms-3">
            <div>
              <button type="button"
                class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                aria-expanded="false" data-dropdown-toggle="dropdown-user">
                <span class="sr-only">Open user menu</span>
                <img class="w-8 h-8 rounded-full" src="https://flowbite.com/docs/images/people/profile-picture-5.jpg"
                  alt="user photo">
              </button>
            </div>
            <div
              class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-sm shadow-sm dark:bg-gray-700 dark:divide-gray-600"
              id="dropdown-user">
              <div class="px-4 py-3" role="none">
                <p class="text-sm text-gray-900 dark:text-white" role="none">
                  Neil Sims
                </p>
                <p class="text-sm font-medium text-gray-900 truncate dark:text-gray-300" role="none">
                  neil.sims@flowbite.com
                </p>
              </div>
              <ul class="py-1" role="none">
                <li>
                  <a href="#"
                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                    role="menuitem">Dashboard</a>
                </li>
                <li>
                  <a href="#"
                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                    role="menuitem">Settings</a>
                </li>
                <li>
                  <a href="#"
                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                    role="menuitem">Earnings</a>
                </li>
                <li>
                  <a href="#"
                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                    role="menuitem">Sign out</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </nav>

  <aside
        class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0 bg-white shadow-lg">
        <div class="h-full px-3 py-4 overflow-y-auto bg-amber-800">
            <ul class="space-y-2 font-medium">
                <li>
                    <a href="#" class="flex items-center p-2 text-white rounded-lg bg-amber-700 group">
                        <i class="fas fa-table w-5 h-5 text-white transition duration-75 group-hover:text-white"></i>
                        <span class="ms-3">Menu Items</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center p-2 text-white rounded-lg hover:bg-amber-700 group">
                        <i class="fas fa-store w-5 h-5 text-white transition duration-75 group-hover:text-white"></i>
                        <span class="ms-3">Restaurants</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center p-2 text-white rounded-lg hover:bg-amber-700 group">
                        <i class="fas fa-tags w-5 h-5 text-white transition duration-75 group-hover:text-white"></i>
                        <span class="ms-3">Categories</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center p-2 text-white rounded-lg hover:bg-amber-700 group">
                        <i
                            class="fas fa-chart-line w-5 h-5 text-white transition duration-75 group-hover:text-white"></i>
                        <span class="ms-3">Analytics</span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>



  <!-- Content -->
  <div class="p-4 sm:ml-64 pt-20"> <!-- Margin left responsif dan padding top -->
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



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>