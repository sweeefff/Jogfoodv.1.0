<div id="crud-modal" tabindex="-1" aria-hidden="true"
                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative p-4 w-full max-w-md max-h-full bg-amber-50">
                    <!-- Modal content -->
                    <div class="relative bg-amber-50 rounded-lg shadow-sm">
                        <!-- Modal header -->
                        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-200">
                            <h3 class="text-lg font-semibold text-amber-600">
                                Tambahkan Menu Baru
                            </h3>
                            <button type="button"
                                class="text-amber-600 bg-transparent hover:bg-gray-200 hover:text-amber-800 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                                data-modal-toggle="crud-modal">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                <span class="sr-only">Tutup modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <form class="p-4 md:p-5">
                            <div class="grid gap-4 mb-4 grid-cols-2">
                                <div class="col-span-2">
                                    <label for="name" class="block mb-2 text-sm font-medium text-amber-600">Nama</label>
                                    <input type="text" name="name" id="name"
                                        class="bg-amber-50 border border-amber-300 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 text-amber-600"
                                        placeholder="Type nama menu" required="">
                                </div>
                                <div class="col-span-2 sm:col-span-1">
                                    <label for="price" class="block mb-2 text-sm font-medium text-amber-600">Harga</label>
                                    <input type="number" name="price" id="price"
                                        class="bg-amber-50 border border-gray-300 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 text-amber-600"
                                        placeholder="Rp.40.000" required="">
                                </div>
                                <div class="col-span-2">
                                    <label for="description"
                                        class="block mb-2 text-sm font-medium text-amber-600">Deskripsi</label>
                                    <textarea id="description" rows="4"
                                        class="bg-amber-50 block p-2.5 w-full text-sm text-amber-600 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                                        placeholder="Tulis deskripsi menu disini"></textarea>
                                </div>
                                <div class="col-span-2">
                                    <label for="media" class="block mb-2 text-sm font-medium text-amber-600">Gambar</label>
                                    <input
                                        class="flex h-10 w-full rounded-md border border-input bg-amber-50 px-3 py-2 text-sm text-amber-600 file:border-0 file:bg-transparent file:text-gray-600 file:text-sm file:font-medium"
                                        type="file" id="media" name="media" accept="image/*">
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
                                Tambahkan menu
                            </button>
                        </form>
                    </div>
                </div>
            </div>a