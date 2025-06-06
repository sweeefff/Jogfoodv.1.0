<!-- Main modal -->
<div id="crud-modal" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full md:h-auto md:max-h-[calc(100vh-2rem)]">
    <div class="relative p-4 w-full max-w-md md:max-w-[550px] md:min-w-[400px] md:h-auto max-h-full bg-white m-4 md:m-8">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow-sm">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-200">
                <h3 class="text-lg font-semibold text-amber-600">
                    Tambahkan {{ $kategori }}
                </h3>
                <button type="button"
                    class="text-amber-600 bg-transparent hover:bg-gray-200 hover:text-amber-800 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                    data-modal-toggle="crud-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Tutup modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form class="p-4 md:p-5" method="POST" action="{{ route('tblmenu.store') }}" id="createForm"
                enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" id="id" value="">
                <input type="hidden" name="kategori" id="kategori" value="{{ $kategori }}">

                <!-- Tampilkan notifikasi error validasi jika ada -->
                @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                        <ul class="list-disc pl-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="grid gap-4 mb-4 grid-cols-2">
                    <div class="col-span-2">
                        <label for="name" class="block mb-2 text-sm font-medium text-amber-600">Nama</label>
                        <input type="text" name="nama" id="name"
                            class="bg-amber-50 border border-amber-300 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 text-amber-600"
                            placeholder="Gudeg" required>
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="price" class="block mb-2 text-sm font-medium text-amber-600">Harga</label>
                        <input type="number" name="harga" id="price"
                            class="bg-amber-50 border border-gray-300 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 text-amber-600"
                            placeholder="Rp.40000" required>
                    </div>
                    <div class="col-span-2">
                        <label for="description" class="block mb-2 text-sm font-medium text-amber-600">Deskripsi</label>
                        <textarea id="description" name="deskripsi_menu" rows="4"
                            class="bg-amber-50 block p-2.5 w-full text-sm text-amber-600 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Tulis deskripsi menu disini"></textarea>
                    </div>
                    <div class="col-span-2">
                        <label for="gambar_menu" class="block mb-2 text-sm font-medium text-amber-600">Gambar</label>
                        <input
                            class="flex h-10 w-full rounded-md border border-input bg-amber-50 px-3 py-2 text-sm text-amber-600 file:border-0 file:bg-transparent file:text-gray-600 file:text-sm file:font-medium"
                            type="file" id="gambar_menu" name="gambar_menu" accept="image/png, image/jpeg, image/jpg"
                            required>
                    </div>
                </div>
                <button type="submit"
                    class="flex items-center justify-center text-white bg-amber-700 hover:bg-amber-800 focus:ring-4 focus:ring-amber-300 font-medium rounded-lg text-sm px-5 py-2.5">
                    <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path>
                        <path fill-rule="evenodd"
                            d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                            clip-rule="evenodd"></path>
                    </svg>
                    Simpan Perubahan
                </button>
            </form>
        </div>
    </div>
</div>

