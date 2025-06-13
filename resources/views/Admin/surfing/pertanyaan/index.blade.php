@extends('layouts.admin')

@section('title', 'Alat')

@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Data / </span>Pertanyaan Surfing</h4>
        <div class="card">
            <h5 class="card-header">Table Pertanyaan</h5>
           
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
                                    <h5 class="modal-title" id="addProductModalLabel">Tambah Pertanyaan Surfing</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="pertanyaan-add" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="row">
                                            <!-- Kolom Kiri -->
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label for="pertanyaan" class="form-label">Pertanyaan</label>
                                                    <input type="text" name="pertanyaan" class="form-control" id="pertanyaan" required>
                                                </div>
                    
                                                <div class="mb-3">
                                                    <label for="jawaban" class="form-label">Jawaban</label>
                                                    <textarea name="jawaban" class="form-control" id="jawaban" rows="3" required></textarea>
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
                                <th style="width: 5%">No</th>
                                <th>Pertanyaan</th>
                                <th >Jawaban</th>
                                <th style="width: 10%">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($pertanyaans as $index => $item)
                                <tr>
                                    <td>{{ $pertanyaans->firstItem() + $index }}</td>
                                    <td>{{ $item->pertanyaan }}</td>
                                    <td class="wrap-text">{{ $item->jawaban }}</td>
                                    <style>
                                        .wrap-text {
                                            word-wrap: break-word; /* Membungkus teks */
                                            overflow-wrap: break-word; /* Alternatif untuk browser baru */
                                            max-width: 400px; /* Atur lebar maksimum kolom */
                                            white-space: normal; /* Izinkan teks turun ke baris berikutnya */
                                        }
                                    </style>
                                    <td>
                                        <!-- Tombol Edit -->
                                        <a href="pertanyaan-edit/{{ $item->id }}"
                                            class="btn btn-icon btn-outline-primary">
                                            <i class="bx bx-edit-alt"></i>
                                        </a>
                                        <!-- Tombol Hapus -->
                                        <a href="javascript:void(0)" 
                                        onclick="confirmDeletePertanyaan({{ $item->id }}, '{{ $item->pertanyaan }}')" 
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
                        {{ $pertanyaans->appends(request()->input())->links('pagination::bootstrap-5') }}
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    function confirmDeletePertanyaan(id, nama) {
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
                window.location.href = `/admin/surfing/pertanyaan-destroy/${id}`;
            }
        });
    }
</script>

    
@include('sweetalert::alert')
@endsection
