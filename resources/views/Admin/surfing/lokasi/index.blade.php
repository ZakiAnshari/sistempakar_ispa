@extends('layouts.admin')

@section('title', 'Lokasi')

@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Data / </span>Surfing</h4>
        <div class="card">
            <h5 class="card-header">Table Lokasi</h5>
           
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
                                <!-- Tambahkan judul -->
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addProductModalLabel">Tambah Lokasi</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form  action="lokasi-add" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="row">
                                            <!-- Kolom Kiri -->
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="namaOmbak" class="form-label">Nama Ombak</label>
                                                    <input type="text" name="nama_ombak" class="form-control" id="namaOmbak" required>
                                                </div>
                                        
                                                <div class="mb-3">
                                                    <label for="deskripsi" class="form-label">Deskripsi</label>
                                                    <textarea name="deskripsi" class="form-control" id="deskripsi" rows="3" required></textarea>
                                                </div>
                                        
                                                <div class="mb-3">
                                                    <label for="ketinggianOmbak" class="form-label">Ketinggian Ombak (m)</label>
                                                    <input type="number" name="ketinggian_ombak" class="form-control" id="ketinggianOmbak" step="0.1" placeholder="Contoh: 2.5" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="musim" class="form-label">Musim Terbaik</label>
                                                    <select name="musim" class="form-select" id="musim" required>
                                                        <option value="">Pilih Musim Terbaik</option>
                                                        <option value="Mei - September">Mei - September</option>
                                                        <option value="Oktober - April">Oktober - April</option>
                                                        <option value="Sepanjang Tahun">Sepanjang Tahun</option>
                                                    </select>
                                                </div>
                                            </div>
                                        
                                            <!-- Kolom Kanan -->
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="tingkat" class="form-label">Tingkat Kesulitan</label>
                                                    <select name="tingkat" class="form-select" id="tingkat" required>
                                                        <option value="">Pilih Tingkat Kesulitan</option>
                                                        <option value="Pemula">Pemula</option>
                                                        <option value="Menengah">Menengah</option>
                                                        <option value="Profesional">Profesional</option>
                                                    </select>
                                                </div>
                                        
                                                <div class="mb-3">
                                                    <label for="imageLokasiSurfing" class="form-label">Gambar Lokasi Surfing</label>
                                                    <input type="file" name="image_lokasi_surfing" class="form-control" id="imageLokasiSurfing" accept="image/jpeg, image/png, image/jpg, image/gif, image/svg+xml" onchange="previewImage(this, 'previewLokasiSurfing')" required>
                                                    <img id="previewLokasiSurfing" src="#" alt="Pratinjau Gambar Lokasi" class="img-fluid mt-3" style="max-width: 200px; display: none;">
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
                                <th>Nama Ombak</th>
                                {{-- <th>Deskripsi</th> --}}
                                <th>Tinggi Ombak</th>
                                <th>Musim Terbaik</th>
                                <th>Kesulitan</th>
                                {{-- <th>Foto Lokasi</th> --}}
                                <th style="width: 10%">Actions</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            @forelse ($surfings as $index => $item)
                                <tr>
                                    <!-- Nomor -->
                                    <td>
                                        <strong>{{ $surfings->firstItem() + $index }}</strong>
                                    </td>
                                    <!-- Nama Ombak -->
                                    <td>{{ $item->nama_ombak }}</td>
                                    <!-- Deskripsi -->
                                    {{-- <td>{{ $item->deskripsi }}</td> --}}
                                    <!-- Ketinggian Ombak -->
                                    <td>{{ $item->ketinggian_ombak }} M</td>
                                    <!-- Musim Terbaik -->
                                    <td>{{ $item->musim }}</td>
                                    <!-- Tingkat Kesulitan -->
                                    <td>{{ $item->tingkat }}</td>
                                    
                                    <td>
                                        <!-- Tombol Edit -->
                
                                        <a href="lokasi-edit/{{ $item->id }}"
                                            class="btn btn-icon btn-outline-primary">
                                            <i class="bx bx-edit-alt"></i>
                                        </a>
                        
                                        <!-- Tombol Hapus -->
                                        <a href="javascript:void(0)" 
                                        onclick="confirmDeleteLokasi({{ $item->id }}, '{{ $item->nama_ombak }}')" 
                                        style="display:inline;">
                                            <button class="btn btn-icon btn-outline-danger">
                                                <i class="bx bx-trash"></i>
                                            </button>
                                        </a>
                                     

                                        
                                        {{-- <a  href="/admin/surfing/lokasi-destroy/{{ $item->id }}" onclick="return confirm('anda yakin data di hapus?')" class="btn btn-danger btn-action trigger--fire-modal-1" data-toggle="tooltip" data-original-title="Delete">
                                            <i class="fas fa-trash"></i>
                                        </a> --}}
                                
                                        <!-- Tombol Detail -->
                                        <a href="lokasi-show/{{ $item->id }}" class="btn btn-icon btn-outline-info">
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
                        {{ $surfings->appends(request()->input())->links('pagination::bootstrap-5') }}
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function confirmDeleteLokasi(id, nama) {
        Swal.fire({
            title: `Apakah Anda yakin?`,
            text: `Data lokasi "${nama}" akan dihapus dan tidak dapat dikembalikan.`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                // URL diarahkan ke lokasi-destroy
                window.location.href = `/admin/surfing/lokasi-destroy/${id}`;
            }
        });
    }
</script>

    
@include('sweetalert::alert')
@endsection
