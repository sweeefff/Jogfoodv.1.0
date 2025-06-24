@extends('layouts.appadm')

@section('title', 'Data Kurir')

@section('content')
<div class="container-fluid" style="margin-left: 200px; padding: 30px 20px; min-height: 100vh; background-color: #f8f9fa;">
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm border-0">
                <div class="card-header d-flex justify-content-between align-items-center bg-white border-bottom">
                    <h3 class="card-title mb-0 text-dark fw-bold">Data Kurir</h3>
                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addKurirModal">
                        <i class="fas fa-plus me-1"></i> Tambah Kurir
                    </button>
                </div>
                <div class="card-body p-4">
                    <div class="table-responsive">
                        <table id="kurirTable" class="table table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th class="text-center" style="width: 60px;">ID</th>
                                    <th>Username</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th class="text-center" style="width: 80px;">Role</th>
                                    <th>Alamat</th>
                                    <th>No. HP</th>
                                    <th class="text-center" style="width: 80px;">Foto</th>
                                    <th class="text-center" style="width: 120px;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($kurir as $k)
                                <tr>
                                    <td class="text-center">{{ $k->id }}</td>
                                    <td>{{ $k->username }}</td>
                                    <td>{{ $k->name }}</td>
                                    <td>{{ $k->email }}</td>
                                    <td class="text-center">
                                        <span class="badge bg-info text-white">{{ ucfirst($k->role) }}</span>
                                    </td>
                                    <td>{{ $k->alamat ?? '-' }}</td>
                                    <td>{{ $k->no_hp ?? '-' }}</td>
                                    <td class="text-center">
                                        @if($k->foto)
                                            <img src="{{ asset('storage/kurir/' . $k->foto) }}" 
                                                 alt="Foto {{ $k->name }}" 
                                                 class="img-thumbnail rounded-circle" 
                                                 style="width: 45px; height: 45px; object-fit: cover;">
                                        @else
                                            <span class="text-muted small">Tidak ada foto</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group" role="group">
                                            <button type="button" class="btn btn-sm btn-outline-info" 
                                                    onclick="viewKurir({{ $k->id }})"
                                                    data-bs-toggle="modal" 
                                                    data-bs-target="#viewKurirModal"
                                                    title="Lihat Detail">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button type="button" class="btn btn-sm btn-outline-warning" 
                                                    onclick="editKurir({{ $k->id }})"
                                                    data-bs-toggle="modal" 
                                                    data-bs-target="#editKurirModal"
                                                    title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button type="button" class="btn btn-sm btn-outline-danger" 
                                                    onclick="deleteKurir({{ $k->id }}, '{{ $k->name }}')"
                                                    title="Hapus">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="9" class="text-center text-muted py-4">
                                        <i class="fas fa-inbox fa-2x mb-2"></i><br>
                                        Tidak ada data kurir
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah Kurir -->
<div class="modal fade" id="addKurirModal" tabindex="-1" aria-labelledby="addKurirModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content border-0 shadow">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title fw-bold" id="addKurirModalLabel">
                    <i class="fas fa-user-plus me-2"></i>Tambah Kurir Baru
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="addKurirForm" enctype="multipart/form-data">
                @csrf
                <div class="modal-body p-4">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="username" class="form-label fw-semibold">Username <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name" class="form-label fw-semibold">Nama Lengkap <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="email" class="form-label fw-semibold">Email <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="password" class="form-label fw-semibold">Password <span class="text-danger">*</span></label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="no_hp" class="form-label fw-semibold">No. HP</label>
                                <input type="text" class="form-control" id="no_hp" name="no_hp">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="role" class="form-label fw-semibold">Role <span class="text-danger">*</span></label>
                                <select class="form-select" id="role" name="role" required>
                                    <option value="">Pilih Role</option>
                                    <option value="user">User</option>
                                    <option value="admin">Admin</option>
                                    <option value="kurir">Kurir</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label fw-semibold">Alamat</label>
                        <textarea class="form-control" id="alamat" name="alamat" rows="3" placeholder="Masukkan alamat lengkap..."></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="foto" class="form-label fw-semibold">Foto</label>
                        <input type="file" class="form-control" id="foto" name="foto" accept="image/*">
                        <small class="form-text text-muted">Format: JPG, PNG, GIF. Maksimal 2MB.</small>
                    </div>
                </div>
                <div class="modal-footer bg-light">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="fas fa-times me-1"></i>Batal
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-1"></i>Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal View Kurir -->
<div class="modal fade" id="viewKurirModal" tabindex="-1" aria-labelledby="viewKurirModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content border-0 shadow">
            <div class="modal-header bg-info text-white">
                <h5 class="modal-title fw-bold" id="viewKurirModalLabel">
                    <i class="fas fa-user me-2"></i>Detail Kurir
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4" id="viewKurirContent">
                <!-- Content will be loaded here -->
            </div>
            <div class="modal-footer bg-light">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <i class="fas fa-times me-1"></i>Tutup
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit Kurir -->
<div class="modal fade" id="editKurirModal" tabindex="-1" aria-labelledby="editKurirModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content border-0 shadow">
            <div class="modal-header bg-warning text-dark">
                <h5 class="modal-title fw-bold" id="editKurirModalLabel">
                    <i class="fas fa-user-edit me-2"></i>Edit Kurir
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editKurirForm" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" id="edit_kurir_id" name="id">
                <div class="modal-body p-4">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="edit_username" class="form-label fw-semibold">Username <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="edit_username" name="username" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="edit_name" class="form-label fw-semibold">Nama Lengkap <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="edit_name" name="name" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="edit_email" class="form-label fw-semibold">Email <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" id="edit_email" name="email" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="edit_password" class="form-label fw-semibold">Password</label>
                                <input type="password" class="form-control" id="edit_password" name="password">
                                <small class="form-text text-muted">Kosongkan jika tidak ingin mengubah password</small>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="edit_no_hp" class="form-label fw-semibold">No. HP</label>
                                <input type="text" class="form-control" id="edit_no_hp" name="no_hp">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="edit_role" class="form-label fw-semibold">Role <span class="text-danger">*</span></label>
                                <select class="form-select" id="edit_role" name="role" required>
                                    <option value="">Pilih Role</option>
                                    <option value="user">User</option>
                                    <option value="admin">Admin</option>
                                    <option value="kurir">Kurir</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="edit_alamat" class="form-label fw-semibold">Alamat</label>
                        <textarea class="form-control" id="edit_alamat" name="alamat" rows="3" placeholder="Masukkan alamat lengkap..."></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="edit_foto" class="form-label fw-semibold">Foto</label>
                        <input type="file" class="form-control" id="edit_foto" name="foto" accept="image/*">
                        <small class="form-text text-muted">Format: JPG, PNG, GIF. Maksimal 2MB. Kosongkan jika tidak ingin mengubah foto.</small>
                        <div id="current_foto" class="mt-2"></div>
                    </div>
                </div>
                <div class="modal-footer bg-light">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="fas fa-times me-1"></i>Batal
                    </button>
                    <button type="submit" class="btn btn-warning text-dark">
                        <i class="fas fa-save me-1"></i>Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('styles')
<style>
/* Responsive adjustments */
@media (max-width: 1200px) {
    .container-fluid {
        margin-left: 180px !important;
    }
}

@media (max-width: 992px) {
    .container-fluid {
        margin-left: 0px !important;
        padding-left: 10px !important;
        padding-right: 10px !important;
    }
}

@media (max-width: 768px) {
    .btn-group .btn {
        padding: 0.25rem 0.4rem;
        font-size: 0.8rem;
    }
    
    .table td, .table th {
        padding: 0.5rem 0.3rem;
        font-size: 0.85rem;
    }
}

/* Custom table styling */
.table-hover tbody tr:hover {
    background-color: #f8f9fa;
}

.card {
    border-radius: 10px;
}

.modal-content {
    border-radius: 10px;
}

/* Button improvements */
.btn-outline-info:hover {
    color: #fff;
}

.btn-outline-warning:hover {
    color: #000;
}

.btn-outline-danger:hover {
    color: #fff;
}
</style>
@endpush
@endsection

@section('scripts')
<script>
$(document).ready(function() {
    // Initialize DataTable
    $('#kurirTable').DataTable({
        responsive: true,
        language: {
            url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/id.json'
        },
        columnDefs: [
            { targets: [0, 4, 7, 8], orderable: false },
            { targets: [7, 8], searchable: false }
        ],
        pageLength: 25,
        order: [[1, 'asc']]
    });

    // Add Kurir Form Submit
    $('#addKurirForm').on('submit', function(e) {
        e.preventDefault();
        
        var formData = new FormData(this);
        var submitBtn = $(this).find('button[type="submit"]');
        var originalText = submitBtn.html();
        
        // Show loading state
        submitBtn.html('<i class="fas fa-spinner fa-spin me-1"></i>Menyimpan...').prop('disabled', true);
        
        $.ajax({
            url: '{{ route("kurir.store") }}',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                if(response.success) {
                    $('#addKurirModal').modal('hide');
                    $('#addKurirForm')[0].reset();
                    
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil!',
                        text: response.message,
                        showConfirmButton: false,
                        timer: 1500
                    }).then(() => {
                        location.reload();
                    });
                }
            },
            error: function(xhr) {
                var errors = xhr.responseJSON.errors;
                var errorMessage = '';
                
                $.each(errors, function(key, value) {
                    errorMessage += value[0] + '\n';
                });
                
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: errorMessage
                });
            },
            complete: function() {
                // Restore button state
                submitBtn.html(originalText).prop('disabled', false);
            }
        });
    });

    // Edit Kurir Form Submit
    $('#editKurirForm').on('submit', function(e) {
        e.preventDefault();
        
        var formData = new FormData(this);
        var kurirId = $('#edit_kurir_id').val();
        var submitBtn = $(this).find('button[type="submit"]');
        var originalText = submitBtn.html();
        
        // Show loading state
        submitBtn.html('<i class="fas fa-spinner fa-spin me-1"></i>Mengupdate...').prop('disabled', true);
        
        $.ajax({
            url: '{{ route("kurir.update", ":id") }}'.replace(':id', kurirId),
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                if(response.success) {
                    $('#editKurirModal').modal('hide');
                    
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil!',
                        text: response.message,
                        showConfirmButton: false,
                        timer: 1500
                    }).then(() => {
                        location.reload();
                    });
                }
            },
            error: function(xhr) {
                var errors = xhr.responseJSON.errors;
                var errorMessage = '';
                
                $.each(errors, function(key, value) {
                    errorMessage += value[0] + '\n';
                });
                
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: errorMessage
                });
            },
            complete: function() {
                // Restore button state
                submitBtn.html(originalText).prop('disabled', false);
            }
        });
    });
});

function viewKurir(id) {
    // Show loading
    $('#viewKurirContent').html('<div class="text-center py-4"><i class="fas fa-spinner fa-spin fa-2x"></i><br><small>Memuat data...</small></div>');
    
    $.ajax({
        url: '{{ route("kurir.show", ":id") }}'.replace(':id', id),
        type: 'GET',
        success: function(response) {
            if(response.success) {
                var kurir = response.data;
                var fotoHtml = kurir.foto ? 
                    `<img src="{{ asset('storage/kurir/') }}/${kurir.foto}" class="img-fluid rounded shadow" style="max-width: 200px;">` : 
                    '<div class="bg-light rounded p-4 text-center"><i class="fas fa-user fa-3x text-muted"></i><br><small class="text-muted">Tidak ada foto</small></div>';
                
                var content = `
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card border-0 bg-light">
                                <div class="card-body">
                                    <table class="table table-borderless mb-0">
                                        <tr>
                                            <td class="fw-semibold" style="width: 120px;">ID:</td>
                                            <td>${kurir.id}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-semibold">Username:</td>
                                            <td>${kurir.username}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-semibold">Nama:</td>
                                            <td>${kurir.name}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-semibold">Email:</td>
                                            <td>${kurir.email}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-semibold">Role:</td>
                                            <td><span class="badge bg-info">${kurir.role}</span></td>
                                        </tr>
                                        <tr>
                                            <td class="fw-semibold">No. HP:</td>
                                            <td>${kurir.no_hp || '-'}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-semibold">Alamat:</td>
                                            <td>${kurir.alamat || '-'}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 text-center">
                            <h6 class="fw-semibold mb-3">Foto Profil</h6>
                            ${fotoHtml}
                        </div>
                    </div>
                `;
                
                $('#viewKurirContent').html(content);
            }
        },
        error: function() {
            $('#viewKurirContent').html('<div class="alert alert-danger">Gagal memuat data kurir</div>');
        }
    });
}

function editKurir(id) {
    $.ajax({
        url: '{{ route("kurir.show", ":id") }}'.replace(':id', id),
        type: 'GET',
        success: function(response) {
            if(response.success) {
                var kurir = response.data;
                
                $('#edit_kurir_id').val(kurir.id);
                $('#edit_username').val(kurir.username);
                $('#edit_name').val(kurir.name);
                $('#edit_email').val(kurir.email);
                $('#edit_role').val(kurir.role);
                $('#edit_no_hp').val(kurir.no_hp);
                $('#edit_alamat').val(kurir.alamat);
                
                if(kurir.foto) {
                    $('#current_foto').html(`
                        <div class="d-flex align-items-center p-2 bg-light rounded">
                            <img src="{{ asset('storage/kurir/') }}/${kurir.foto}" 
                                 class="img-thumbnail me-3 rounded-circle" 
                                 style="width: 50px; height: 50px; object-fit: cover;">
                            <div>
                                <small class="text-muted d-block">Foto saat ini</small>
                                <small class="text-success">✓ Tersedia</small>
                            </div>
                        </div>
                    `);
                } else {
                    $('#current_foto').html('<small class="text-muted">Belum ada foto</small>');
                }
            }
        }
    });
}

function deleteKurir(id, name) {
    Swal.fire({
        title: 'Apakah Anda yakin?',
        html: `Anda akan menghapus kurir <strong>"${name}"</strong><br><small class="text-muted">Tindakan ini tidak dapat dibatalkan</small>`,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#dc3545',
        cancelButtonColor: '#6c757d',
        confirmButtonText: '<i class="fas fa-trash me-1"></i>Ya, Hapus!',
        cancelButtonText: '<i class="fas fa-times me-1"></i>Batal',
        customClass: {
            confirmButton: 'btn btn-danger',
            cancelButton: 'btn btn-secondary'
        },
        buttonsStyling: false
    }).then((result) => {
        if (result.isConfirmed) {
            // Show loading
            Swal.fire({
                title: 'Menghapus...',
                html: 'Sedang memproses permintaan Anda',
                allowOutsideClick: false,
                showConfirmButton: false,
                willOpen: () => {
                    Swal.showLoading();
                }
            });
            
            $.ajax({
                url: '{{ route("kurir.destroy", ":id") }}'.replace(':id', id),
                type: 'DELETE',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    if(response.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil!',
                            text: response.message,
                            showConfirmButton: false,
                            timer: 1500
                        }).then(() => {
                            location.reload();
                        });
                    }
                },
                error: function(xhr) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'Gagal menghapus data kurir'
                    });
                }
            });
        }
    });
}
</script>
@endsection