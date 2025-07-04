<!-- Main Modal -->
<div id="crud-modal" tabindex="-1" aria-hidden="true"
    class="fixed top-0 right-0 left-0 z-50 hidden w-full h-full overflow-y-auto overflow-x-hidden justify-center items-center">
    <div class="relative w-full max-w-lg p-4 mx-4 my-8 bg-white rounded-lg shadow">
        <!-- Modal Content -->
        <div class="relative">
            <!-- Modal Header -->
            <div class="flex items-center justify-between p-4 border-b rounded-t border-gray-200">
                <h3 class="text-lg font-semibold text-amber-600">
                    Tambahkan {{ $kategori }}
                </h3>
                <button type="button"
                    class="text-amber-600 hover:bg-gray-200 hover:text-amber-800 rounded-lg text-sm w-8 h-8 flex justify-center items-center"
                    data-modal-toggle="crud-modal">
                    <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 1l6 6m0 0l6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>

            <!-- Modal Body -->
            <form class="p-4" method="POST" action="{{ route('tblmenu.store') }}" enctype="multipart/form-data">
                @csrf

                <!-- Error Validation -->
                @if ($errors->any())
                    <div class="mb-4 px-4 py-3 text-red-700 bg-red-100 border border-red-400 rounded">
                        <ul class="list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="grid grid-cols-2 gap-4">
                    <!-- Nama -->
                    <div class="col-span-2">
                        <label for="name" class="block mb-2 text-sm font-medium text-amber-600">Nama</label>
                        <input type="text" name="nama" id="name" placeholder="Gudeg"
                            class="w-full p-2.5 text-sm text-amber-600 bg-amber-50 border border-amber-300 rounded-lg focus:ring-amber-500 focus:border-amber-500"
                            required>
                    </div>

                    <!-- Harga -->
                    <div class="col-span-2 sm:col-span-1">
                        <label for="price" class="block mb-2 text-sm font-medium text-amber-600">Harga</label>
                        <input type="number" name="harga" id="price" placeholder="Rp.40000"
                            class="w-full p-2.5 text-sm text-amber-600 bg-amber-50 border border-gray-300 rounded-lg focus:ring-amber-500 focus:border-amber-500"
                            required>
                    </div>

                    <!-- Kategori -->
                    <div class="col-span-2 sm:col-span-1">
                        <label class="block mb-2 text-sm font-medium text-amber-600">Kategori</label>
                        <div id="kategoriOptions" class="flex gap-2 flex-wrap">
                            @foreach(['Makanan', 'Minuman', 'Side Dish'] as $kat)
                                <div onclick="selectKategori('{{ $kat }}')"
                                    class="kategori-option px-4 py-2 text-sm font-medium border rounded-lg cursor-pointer text-amber-600 bg-amber-50 border-amber-300 hover:bg-amber-100 transition duration-150 ease-in-out">
                                    {{ $kat }}
                                </div>
                            @endforeach
                        </div>
                        <input type="hidden" name="kategori" id="kategoriInput" value="{{ old('kategori', $kategori ?? '') }}">
                    </div>

                    <!-- Deskripsi -->
                    <div class="col-span-2">
                        <label for="description" class="block mb-2 text-sm font-medium text-amber-600">Deskripsi</label>
                        <textarea name="deskripsi_menu" id="description" rows="3"
                            class="w-full p-2.5 text-sm text-amber-600 bg-amber-50 border border-gray-300 rounded-lg focus:ring-amber-500 focus:border-amber-500"
                            placeholder="Tulis deskripsi menu di sini"></textarea>
                    </div>

                    <!-- Gambar -->
                    <div class="col-span-2">
                        <label for="gambar_menu" class="block mb-2 text-sm font-medium text-amber-600">Gambar</label>
                        <input type="file" name="gambar_menu" id="gambar_menu"
                            accept="image/png, image/jpeg, image/jpg"
                            class="block w-full p-2.5 text-sm text-amber-600 bg-amber-50 border border-gray-300 rounded-lg file:bg-amber-50 file:text-amber-600 file:border-gray-300 file:px-3 file:py-1.5 file:mr-4 file:text-sm file:font-medium"
                            required>
                    </div>
                </div>

                <!-- Submit -->
                <button type="submit"
                    class="mt-6 w-full flex justify-center items-center px-5 py-2.5 text-sm font-medium text-white bg-amber-700 rounded-lg hover:bg-amber-800 focus:ring-4 focus:ring-amber-300">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path>
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"></path>
                    </svg>
                    Simpan Perubahan
                </button>
            </form>
        </div>
    </div>
</div>

<style>
    .kategori-option.active {
        background-color: #f59e0b !important; /* amber-500 */
        color: white !important;
        border-color: #d97706 !important;
    }
</style>

<!-- Script Pilihan Kategori -->
<script>
    function selectKategori(value) {
        document.getElementById('kategoriInput').value = value;
        document.querySelectorAll('.kategori-option').forEach(el => {
            el.classList.toggle('active', el.textContent.trim() === value);
        });
    }

    document.addEventListener("DOMContentLoaded", () => {
        const defaultValue = document.getElementById('kategoriInput').value;
        if (defaultValue) {
            selectKategori(defaultValue);
        }
    });
</script>
