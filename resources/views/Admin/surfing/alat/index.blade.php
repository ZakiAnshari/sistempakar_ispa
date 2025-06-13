@extends('layouts.admin')

@section('title', 'Alat')

@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Data / </span>Alat Surfing</h4>
        <div class="card">
            <h5 class="card-header">Table Alat</h5>
           
            <div class="card-body">
                <div class="col text-end">
                    <button type="button" class="btn btn-success btn-sm mb-3 d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#addProductModal">
                        <i class="bx bx-plus me-2"></i> Tambah
                    </button>
                </div>
                
                <div class="table-responsive text-nowrap">
                    <!-- Modal tambah Data -->
                    <div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                                <!-- Judul -->
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addProductModalLabel">Tambah Alat Surfing</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="alat-add" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="row">
                                            <!-- Kolom Kiri -->
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="namaAlat" class="form-label">Nama Alat</label>
                                                    <input type="text" name="nama_alat" class="form-control" id="namaAlat" required>
                                                </div>
                    
                                                <div class="mb-3">
                                                    <label for="deskripsiAlat" class="form-label">Deskripsi Alat</label>
                                                    <textarea name="deskripsi_alat" class="form-control" id="deskripsiAlat" rows="3" required></textarea>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="hargaAlat" class="form-label">Harga (Rp)</label>
                                                    <div class="input-group">
                                                        <span class="input-group-text">Rp</span>
                                                        <input 
                                                            type="text" 
                                                            name="formatted_harga" 
                                                            class="form-control" 
                                                            id="hargaAlat" 
                                                            placeholder="Contoh: 50.000" 
                                                            oninput="formatRupiahTambah(this)" 
                                                            required
                                                        >
                                                    </div>
                                                    <!-- Input hidden untuk menyimpan nilai asli tanpa format -->
                                                    <input 
                                                        type="hidden" 
                                                        name="harga" 
                                                        id="hargaAlatHidden"
                                                    >
                                                </div>
                                                
                                            </div>
                    
                                            <!-- Kolom Kanan -->
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="penyewaanAlat" class="form-label">Opsi Penyewaan</label>
                                                    <select name="penyewaan" class="form-select" id="penyewaanAlat" required>
                                                        <option value="">Pilih Opsi Penyewaan</option>
                                                        <option value="Per Jam">Per Jam</option>
                                                        <option value="Per Hari">Per Hari</option>
                                                    </select>
                                                </div>
                    
                                                <div class="mb-3">
                                                    <label for="imageAlatSurfing" class="form-label">Gambar Alat Surfing</label>
                                                    <input type="file" name="image_alat_surfing" class="form-control" id="imageAlatSurfing" accept="image/jpeg, image/png, image/jpg, image/gif, image/svg+xml" onchange="previewImage(this, 'previewAlatSurfing')" required>
                                                    <img id="previewAlatSurfing" src="#" alt="Pratinjau Gambar Alat" class="img-fluid mt-3" style="max-width: 200px; display: none;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                    
                                    <!-- Tombol -->
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                    
                    <!-- Table Data -->
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 5%">No</th>
                                <th>Nama Alat</th>
                                <th>Harga Sewa</th>
                                <th>Durasi Sewa</th>
                                <th style="width: 10%">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($alats as $index => $item)
                                <tr>
                                    <td>{{ $alats->firstItem() + $index }}</td>
                                    <td>{{ $item->nama_alat }}</td>
                                    <td>Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                                    <td>{{ $item->penyewaan }}</td>
                                    <td>
                                        <!-- Tombol Edit -->
                
                                        <a href="alat-edit/{{ $item->id }}"
                                            class="btn btn-icon btn-outline-primary">
                                            <i class="bx bx-edit-alt"></i>
                                        </a>
                        
                                        <!-- Tombol Hapus -->
                                        <a href="javascript:void(0)" 
                                        onclick="confirmDeleteAlat({{ $item->id }}, '{{ $item->nama_alat }}')" 
                                        style="display:inline;">
                                            <button class="btn btn-icon btn-outline-danger">
                                                <i class="bx bx-trash"></i>
                                            </button>
                                        </a>
                                     

                                        
                                        {{-- <a  href="/admin/surfing/lokasi-destroy/{{ $item->id }}" onclick="return confirm('anda yakin data di hapus?')" class="btn btn-danger btn-action trigger--fire-modal-1" data-toggle="tooltip" data-original-title="Delete">
                                            <i class="fas fa-trash"></i>
                                        </a> --}}
                                
                                        <!-- Tombol Detail -->
                                        <a href="alat-show/{{ $item->id }}" class="btn btn-icon btn-outline-info">
                                            <i class="bx bx-show-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center">Data Kosong</td>
                                </tr>
                            @endforelse
                        </tbody>
                        
                    </table>
                    <!-- Pagination -->
                    <div class="d-flex justify-content-end mt-3">
                        {{ $alats->appends(request()->input())->links('pagination::bootstrap-5') }}
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    function confirmDeleteAlat(id, nama) {
        Swal.fire({
            title: `Apakah Anda yakin?`,
            text: `"${nama}" akan dihapus dan tidak dapat dikembalikan.`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                // URL diarahkan ke lokasi-destroy
                window.location.href = `/admin/surfing/alat-destroy/${id}`;
            }
        });
    }
</script>
<script>
    function formatRupiahTambah(input) {
        // Menghapus semua karakter selain angka
        let value = input.value.replace(/\D/g, "");

        // Menambahkan format angka dengan titik sebagai pemisah ribuan
        let formattedValue = new Intl.NumberFormat('id-ID').format(value);

        // Menampilkan nilai yang sudah diformat ke input
        input.value = formattedValue;

        // Menyimpan nilai asli (tanpa titik) ke input hidden
        document.getElementById("hargaAlatHidden").value = value;
    }
</script>
    
@include('sweetalert::alert')
@endsection
