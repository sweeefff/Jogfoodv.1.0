<!-- Modal Hapus Kurir -->
<div class="modal fade" id="deleteKurirModal" tabindex="-1" aria-labelledby="deleteKurirModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-xl">
            <div class="modal-header bg-red-600 text-white rounded-t-xl">
                <h5 class="modal-title font-bold" id="deleteKurirModalLabel">
                    <i class="fas fa-trash-alt mr-2"></i>Hapus Kurir
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="deleteKurirForm" method="POST" action="#">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    <p class="text-gray-700 text-center">
                        Apakah Anda yakin ingin menghapus kurir <span id="deleteKurirName" class="font-bold text-red-600"></span>?
                    </p>
                </div>
                <div class="modal-footer bg-gray-50 rounded-b-xl">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="fas fa-times mr-1"></i>Batal
                    </button>
                    <button type="submit" class="btn btn-danger bg-red-600 hover:bg-red-700 text-white">
                        <i class="fas fa-trash mr-1"></i>Hapus
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function openDeleteKurirModal(id, name) {
        const form = document.getElementById('deleteKurirForm');
        form.action = '/admin/kurir/' + id;
        document.getElementById('deleteKurirName').textContent = name;
        const myModal = new bootstrap.Modal(document.getElementById('deleteKurirModal'));
        myModal.show();
    }
</script>
