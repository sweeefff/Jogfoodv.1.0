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
<style>
    /* Custom scrollbar */
    .custom-scrollbar::-webkit-scrollbar {
        width: 6px;
        height: 6px;
    }

    .custom-scrollbar::-webkit-scrollbar-track {
        background: #f1f1f1;
    }

    .custom-scrollbar::-webkit-scrollbar-thumb {
        background: #888;
        border-radius: 10px;
    }

    .custom-scrollbar::-webkit-scrollbar-thumb:hover {
        background: #555;
    }

    /* Animation for table rows */
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animate-fade-in {
        animation: fadeIn 0.3s ease-out forwards;
    }
</style>
</head>
<div class="min-h-screen">
    <!-- Sidebar -->
    <nav class="fixed top-0 z-50 w-full bg-amber-800 border-b border-amber-200 dark:bg-amber-800 dark:border-amber-800">
        <div class="px-3 py-3 lg:px-5 lg:pl-3">
            <div class="flex items-center justify-between">
                <div class="flex items-center justify-start rtl:justify-end">
                    <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar"
                        aria-controls="logo-sidebar" type="button"
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
                        <span
                            class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap dark:text-white">Selamat
                            Datang, Admin</span>
                    </a>
                </div>
                <div class="flex items-center">
                    <div class="flex items-center ms-3">
                        <button type="button"
                            class="flex items-center justify-center w-10 h-10 rounded-full bg-amber-100 hover:bg-amber-200 focus:outline-none me-3">
                            <i class="fas fa-bell text-amber-600"></i>
                        </button>
                        <div>
                            <button type="button"
                                class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                                aria-expanded="false" data-dropdown-toggle="dropdown-user">
                                <span class="sr-only">Open user menu</span>
                                <img class="w-8 h-8 rounded-full"
                                    src="https://flowbite.com/docs/images/people/profile-picture-5.jpg"
                                    alt="user photo">
                            </button>
                            <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-sm shadow-sm dark:bg-gray-700 dark:divide-gray-600"
                                id="dropdown-user">
                                <div class="px-4 py-3" role="none">
                                    <p class="text-sm text-gray-900 dark:text-white" role="none">
                                        Neil Sims
                                    </p>
                                    <p class="text-sm font-medium text-gray-900 truncate dark:text-gray-300"
                                        role="none">
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
            <div class="flex items-center ps-2.5 mb-8 mt-2">
                <img src="" alt="Logo" class="mr-4">
            </div>
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
    <div class="p-6 mt-16 ml-64">
        <div class="bg-white rounded-lg shadow-md p-6">
            <!-- Header with search and add button -->
            <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">
                <div class="mb-4 md:mb-0">
                    <h2 class="text-2xl font-bold text-gray-800">Menu Items</h2>
                    <p class="text-amber-600">Manage all restaurant menu items</p>
                </div>
                <div class="flex flex-col sm:flex-row gap-3">
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <i class="fas fa-search text-amber-500"></i>
                        </div>
                        <input type="text" id="search"
                            class="bg-amber-50 border border-amber-300 text-amber-900 text-sm rounded-lg focus:ring-amber-500 focus:border-amber-500 block w-full pl-10 p-2.5"
                            placeholder="Search menus...">
                    </div>
                    <button type="button" data-modal-target="crud-modal" data-modal-toggle="crud-modal"
                        class="flex items-center justify-center text-white bg-amber-700 hover:bg-amber-800 focus:ring-4 focus:ring-amber-300 font-medium rounded-lg text-sm px-5 py-2.5">
                        <i class="fas fa-plus mr-2"></i> Add New Menu
                    </button>
                </div>
            </div>
            <!-- Main modal -->
            <div id="crud-modal" tabindex="-1" aria-hidden="true"
                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative p-4 w-full max-w-md max-h-full">
                    <!-- Modal content -->
                    <div class="relative bg-amber-300 rounded-lg shadow-sm dark:bg-amber-600">
                        <!-- Modal header -->
                        <div
                            class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-amber-600 border-amber-200">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                Create New Product
                            </h3>
                            <button type="button"
                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                data-modal-toggle="crud-modal">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <form class="p-4 md:p-5">
                            <div class="grid gap-4 mb-4 grid-cols-2">
                                <div class="col-span-2">
                                    <label for="name"
                                        class="block mb-2 text-sm font-medium text-white dark:text-white">Name</label>
                                    <input type="text" name="name" id="name"
                                        class="bg-gray-50 border border-amber-300 text-white text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-amber-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="Type product name" required="">
                                </div>
                                <div class="col-span-2 sm:col-span-1">
                                    <label for="price"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
                                    <input type="number" name="price" id="price"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-amber-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="Rp.40.000" required="">
                                </div>
                                <div class="col-span-2 sm:col-span-1">
                                    <label for="category"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                                    <select id="category"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-amber-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                        <option selected="">Select category</option>
                                        <option value="Ma">Makanan</option>
                                        <option value="Mi">Minuman</option>
                                        <option value="SD">Side Dish</option>
                                        <option value="PH">Phones</option>
                                    </select>
                                </div>
                                <div class="col-span-2">
                                    <label for="description"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product
                                        Description</label>
                                    <textarea id="description" rows="4"
                                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-amber-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Write product description here"></textarea>
                                </div>
                            </div>
                            <button type="submit"
                                class="flex items-center justify-center text-white bg-amber-700 hover:bg-amber-800 focus:ring-4 focus:ring-amber-300 font-medium rounded-lg text-sm px-5 py-2.5">
                                <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                Add new product
                            </button>
                        </form>
                    </div>
                </div>
            </div>


            <!-- Table Container -->
            <div class="table-container custom-scrollbar shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-amber-500">
                    <thead class="text-xs text-amber-700 uppercase bg-amber-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 w-16">
                                <div class="flex items-center">
                                    ID
                                    <button onclick="sortTable(0)">
                                        <i class="fas fa-sort ml-1"></i>
                                    </button>
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-3 w-48">
                                <div class="flex items-center">
                                    Name
                                    <button onclick="sortTable(1)">
                                        <i class="fas fa-sort ml-1"></i>
                                    </button>
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-3 w-32">
                                <div class="flex items-center">
                                    Category
                                    <button onclick="sortTable(2)">
                                        <i class="fas fa-sort ml-1"></i>
                                    </button>
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-3 min-w-[200px]">
                                <div class="flex items-center">
                                    Description
                                    <button onclick="sortTable(3)">
                                        <i class="fas fa-sort ml-1"></i>
                                    </button>
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-3 w-24">
                                <div class="flex items-center">
                                    Price
                                    <button onclick="sortTable(4)">
                                        <i class="fas fa-sort ml-1"></i>
                                    </button>
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-3 w-32">
                                Image
                            </th>
                            <th scope="col" class="px-6 py-3 w-32">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody id="menuTableBody">
                        <!-- Sample data rows will be inserted here by JavaScript -->
                        <tr class="bg-white border-b hover:bg-amber-50 animate-fade-in">
                            <td class="px-6 py-4">1</td>
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">Margherita Pizza</td>
                            <td class="px-6 py-4">Pizza</td>
                            <td class="px-6 py-4 truncate">Classic pizza with tomato sauce, mozzarella, and basil
                            </td>
                            <td class="px-6 py-4">$12.99</td>
                            <td class="px-6 py-4">
                                <img src="https://via.placeholder.com/50" alt="Menu item"
                                    class="w-10 h-10 rounded-full object-cover">
                            </td>
                            <td class="px-6 py-4">
                                <button class="text-amber-600 hover:text-amber-900 mr-2">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="text-red-600 hover:text-red-900">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        <!-- Add more rows as needed -->
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <nav class="flex items-center justify-between pt-4" aria-label="Table navigation">
                <span class="text-sm font-normal text-amber-500">Showing <span
                        class="font-semibold text-amber-900">1-10</span> of <span
                        class="font-semibold text-amber-900">100</span></span>
                <ul class="inline-flex -space-x-px text-sm h-8">
                    <li>
                        <a href="#"
                            class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-amber-500 bg-white border border-amber-300 rounded-s-lg hover:bg-amber-100 hover:text-amber-700">Previous</a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center justify-center px-3 h-8 leading-tight text-amber-500 bg-white border border-amber-300 hover:bg-amber-100 hover:text-amber-700">1</a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center justify-center px-3 h-8 leading-tight text-amber-500 bg-white border border-amber-300 hover:bg-amber-100 hover:text-amber-700">2</a>
                    </li>
                    <li>
                        <a href="#" aria-current="page"
                            class="flex items-center justify-center px-3 h-8 text-amber-600 border border-amber-300 bg-amber-50 hover:bg-amber-100 hover:text-amber-700">3</a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center justify-center px-3 h-8 leading-tight text-amber-500 bg-white border border-amber-300 hover:bg-amber-100 hover:text-amber-700">4</a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center justify-center px-3 h-8 leading-tight text-amber-500 bg-white border border-amber-300 hover:bg-amber-100 hover:text-amber-700">5</a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center justify-center px-3 h-8 leading-tight text-amber-500 bg-white border border-amber-300 rounded-e-lg hover:bg-amber-100 hover:text-amber-700">Next</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>

</html>