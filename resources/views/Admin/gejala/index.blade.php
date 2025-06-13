@extends('layouts.admin')

@section('title', 'Gejala')

@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Data / </span>Gejala</h4>
        <div class="card">
            <h5 class="card-header">Table Gejala</h5>
            <div class="card-body">
                <div class="col text-end">
                    <div class="d-flex justify-content-end align-items-center gap-2 mb-3">
                        <!-- Tombol Tambah -->
                        <button type="button" class="btn btn-success btn-sm d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#addProductModal">
                            <i class="bx bx-plus me-2"></i> Tambah
                        </button>
                
                        <!-- Tombol Cetak -->
                        <a href="{{ route('gejala.cetak') }}" class="btn btn-primary btn-sm d-flex align-items-center" target="_blank">
                            <i class="bx bx-printer me-2"></i> Cetak
                        </a>
                    </div>
                </div>
                
                
                <div class="table-responsive text-nowrap">
                    <!-- Modal tambah Data -->
                    <div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                                <!-- Judul -->
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addProductModalLabel">Tambah Gejala</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="gejala-add" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="row">
                                            <!-- Kolom Kiri -->
                                            <div class="col-lg-9">
                                                <div class="mb-3">
                                                    <label for="nama_gejala	" class="form-label">Nama Gejala</label>
                                                    <input type="text" name="nama_gejala" class="form-control" id="nama_gejala" required>
                                                </div>
                                                
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="mb-3">
                                                    <label for="bobot_gejala" class="form-label">Bobot Gejala</label>
                                                    <input 
                                                        type="number" 
                                                        name="bobot_gejala" 
                                                        class="form-control" 
                                                        id="bobot_gejala" 
                                                        min="1" 
                                                        max="3"  <!-- Batas maksimal bobot diubah menjadi 3 -->
                                                
                                                </div>
                                            </div>
                                            
                                            
                                            <!-- Kolom Kanan -->
                                           
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
                                <th style="width: 5px; text-align: center;">No</th>
                                <th style="width: 5px; text-align: center;">Kode Gejala</th>
                                <th>Nama Gejala</th>
                                <th>Bobot</th>
                                <th style="width: 120px; text-align: center;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($gejalas as $index => $item)
                                <tr>
                                    <td style="text-align: center;">{{ $gejalas->firstItem() + $index }}</td>
                                    <td style="text-align: center;">{{ $item->kode_gejala }}</td>
                                    <td>{{ $item->nama_gejala }}</td>
                                    <td>{{ $item->bobot_gejala }}</td>
                                    <td>
                                        <!-- Tombol Edit -->
                                        <a href="gejala-edit/{{ $item->id }}" class="btn btn-icon btn-outline-primary">
                                            <i class="bx bx-edit-alt"></i>
                                        </a>
                                        <!-- Tombol Hapus -->
                                        <a href="javascript:void(0)" 
                                           onclick="confirmDeleteGejala({{ $item->id }}, '{{ $item->nama_gejala }}')" 
                                           style="display:inline;">
                                            <button class="btn btn-icon btn-outline-danger">
                                                <i class="bx bx-trash"></i>
                                            </button>
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
                        {{ $gejalas->appends(request()->input())->links('pagination::bootstrap-5') }}
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    function confirmDeleteGejala(id, nama) {
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
                window.location.href = `/admin/gejala-destroy/${id}`;
            }
        });
    }
</script>

    
@include('sweetalert::alert')
@endsection
