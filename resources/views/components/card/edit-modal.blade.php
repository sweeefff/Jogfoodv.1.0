<!-- Edit modal -->
<div id="edit-modal" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full bg-white">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow-sm">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-200">
                <h3 class="text-lg font-semibold text-amber-600">
                    Edit {{ $kategori }}
                </h3>
                <button type="button"
                    class="text-amber-600 bg-transparent hover:bg-gray-200 hover:text-amber-800 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                    data-modal-toggle="edit-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Tutup modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form class="p-4 md:p-5" method="POST" action="" id="editForm" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="id_menu" id="edit_id_menu" value="">
                <input type="hidden" name="kategori" id="edit_kategori" value="{{ $kategori }}">

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
                        <label for="edit_name" class="block mb-2 text-sm font-medium text-amber-600">Nama</label>
                        <input type="text" name="nama" id="edit_name"
                            class="bg-amber-50 border border-amber-300 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 text-amber-600"
                            placeholder="Gudeg" required>
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="edit_price" class="block mb-2 text-sm font-medium text-amber-600">Harga</label>
                        <input type="number" name="harga" id="edit_price"
                            class="bg-amber-50 border border-gray-300 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 text-amber-600"
                            placeholder="Rp.40000" required>
                    </div>
                    <div class="col-span-2">
                        <label for="edit_description"
                            class="block mb-2 text-sm font-medium text-amber-600">Deskripsi</label>
                        <textarea id="edit_description" name="deskripsi_menu" rows="4"
                            class="bg-amber-50 block p-2.5 w-full text-sm text-amber-600 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Tulis deskripsi menu disini"></textarea>
                    </div>
                    <div class="col-span-2">
                        <label for="edit_gambar_menu"
                            class="block mb-2 text-sm font-medium text-amber-600">Gambar</label>
                        <div class="mb-3" id="current_image_container">
                            <p class="text-xs mb-1 text-amber-600">Gambar saat ini:</p>
                            <img id="current_image" src="" alt="Current Image" class="w-32 h-auto rounded mb-2">
                        </div>
                        <input
                            class="flex h-10 w-full rounded-md border border-input bg-amber-50 px-3 py-2 text-sm text-amber-600 file:border-0 file:bg-transparent file:text-gray-600 file:text-sm file:font-medium"
                            type="file" id="edit_gambar_menu" name="gambar_menu" accept="image/*">
                        <p class="text-xs mt-1 text-amber-600">Biarkan kosong jika tidak ingin mengubah gambar</p>
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

<!-- JavaScript untuk mengisi form edit -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const editButtons = document.querySelectorAll('.edit-button');
        editButtons.forEach(button => {
            button.addEventListener('click', function () {
                // Ambil data dari data-atribut
                const data = {
                    id_menu: this.dataset.id,
                    nama: this.dataset.nama,
                    harga: this.dataset.harga,
                    deskripsi_menu: this.dataset.deskripsi,
                    gambar_menu: this.dataset.image,
                    kategori: this.dataset.kategori,
                    action: this.dataset.action
                };
                // Panggil fungsi untuk mengisi form modal
                populateEditForm(data);

                // Manually toggle the modal visibility
                const modal = document.getElementById('edit-modal');
                modal.classList.remove('hidden');
                modal.classList.add('flex');
            });
        });
    });

    function populateEditForm(data) {
        // Set action URL form
        const form = document.getElementById('editForm');
        form.action = data.action;

        // Set id_menu
        document.getElementById('edit_id_menu').value = data.id_menu;

        // Isi field form
        document.getElementById('edit_name').value = data.nama;
        document.getElementById('edit_price').value = data.harga;
        document.getElementById('edit_description').value = data.deskripsi_menu;

        // Set kategori dengan nilai yang benar
        document.getElementById('edit_kategori').value = data.kategori;

        // Tampilkan gambar saat ini jika ada
        const currentImage = document.getElementById('current_image');
        const currentImageContainer = document.getElementById('current_image_container');

        if (data.gambar_menu && data.gambar_menu !== "null" && data.gambar_menu !== "") {
            currentImage.src = 'assets/img/menu/' + data.gambar_menu; // Pastikan path gambar benar
            currentImageContainer.classList.remove('hidden');
        } else {
            currentImageContainer.classList.add('hidden');
        }
    }
</script>