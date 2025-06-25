<!-- Modal Tambah Kurir -->
<div id="addKurirModal"
    class="fixed inset-0 z-50 hidden overflow-y-auto bg-black bg-opacity-40 flex items-center justify-center">
    <div class="bg-white rounded-lg shadow-lg w-full max-w-2xl mx-4 my-8 overflow-hidden">
        <!-- Modal header -->
        <div class="flex items-center justify-between px-6 py-4 bg-blue-600 text-white">
            <h3 class="text-lg font-semibold">
                <i class="fas fa-user-plus mr-2"></i>Tambah Kurir
            </h3>
            <button type="button" onclick="closeAddModal()" class="hover:text-gray-300">
                <i class="fas fa-times"></i>
            </button>
        </div>

        <!-- Modal body -->
        <form action="{{ route('kurir.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="p-6 space-y-4 max-h-[70vh] overflow-y-auto">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block font-medium mb-1 text-gray-700">Username <span
                                class="text-red-500">*</span></label>
                        <input type="text" name="username" class="w-full border rounded px-3 py-2" required>
                    </div>
                    <div>
                        <label class="block font-medium mb-1 text-gray-700">Nama Lengkap <span
                                class="text-red-500">*</span></label>
                        <input type="text" name="name" class="w-full border rounded px-3 py-2" required>
                    </div>
                    <div>
                        <label class="block font-medium mb-1 text-gray-700">Email <span
                                class="text-red-500">*</span></label>
                        <input type="email" name="email" class="w-full border rounded px-3 py-2" required>
                    </div>
                    <div>
                        <label class="block font-medium mb-1 text-gray-700">Password <span
                                class="text-red-500">*</span></label>
                        <input type="password" name="password" class="w-full border rounded px-3 py-2" required>
                    </div>
                    <div>
                        <label class="block font-medium mb-1 text-gray-700">No. HP</label>
                        <input type="text" name="no_hp" class="w-full border rounded px-3 py-2">
                    </div>
                </div>
                <div>
                    <label class="block font-medium mb-1 text-gray-700">Alamat</label>
                    <textarea name="alamat" rows="2" class="w-full border rounded px-3 py-2"></textarea>
                </div>
                <div>
                    <label class="block font-medium mb-1 text-gray-700">Foto</label>
                    <input type="file" name="foto" accept="image/*" class="w-full border rounded px-3 py-2">
                    <p class="text-sm text-gray-400 mt-1">Format: JPG, PNG. Maks: 2MB.</p>
                </div>
            </div>

            <!-- Modal footer -->
            <div class="flex justify-end px-6 py-4 bg-gray-100 border-t">
                <button type="button" onclick="closeAddModal()"
                    class="mr-3 px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-800 rounded">
                    <i class="fas fa-times mr-1"></i>Batal
                </button>
                <button type="submit" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded">
                    <i class="fas fa-save mr-1"></i>Simpan
                </button>
            </div>
        </form>
    </div>
</div>