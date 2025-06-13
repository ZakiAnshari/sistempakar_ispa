@extends('layouts.admin')

@section('title', 'Penyakit')

@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Data / </span>Penyakit</h4>
        <div class="card">
            <h5 class="card-header">Table Penyakit</h5>
            <div class="card-body">
                
                <div class="container">
                    <div class="col text-end">
                        <div class="d-flex justify-content-end align-items-center gap-2 mb-3">
                            <!-- Tombol Tambah -->
                            <button type="button" class="btn btn-success btn-sm d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#addProductModal">
                                <i class="bx bx-plus me-2"></i> Tambah
                            </button>
                    
                            <!-- Tombol Cetak -->
                            <a href="{{ route('penyakit.cetak') }}" class="btn btn-primary btn-sm d-flex align-items-center" target="_blank">
                                <i class="bx bx-printer me-2"></i> Cetak
                            </a>
                        </div>
                    </div>
                </div>
                
                
                
                <div class="table-responsive text-nowrap">
                     <!-- Modal tambah Data -->
                     <div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                                <!-- Judul -->
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addProductModalLabel">Tambah Penyakit</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="penyakit-add" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="row">
                                            <!-- Kolom Kiri -->
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label for="penyakit" class="form-label">Penyakit </label>
                                                    <input type="text" name="penyakit" class="form-control" id="penyakit " required>
                                                </div>
                                            </div>
                                            {{-- <div class="col-lg-3">
                                                <div class="mb-3">
                                                    <label for="definisi" class="form-label">Diagnosis</label>
                                                    <select name="definisi" class="form-control" id="definisi" required>
                                                        <option value="" disabled selected>Pilih Diagnosis</option>
                                                        <option value="Ispa Ringan">ISPA Ringan</option>
                                                        <option value="Ispa Sedang">ISPA Sedang</option>
                                                        <option value="Ispa Berat">ISPA Berat</option>
                                                    </select>
                                                </div>
                                                
                                            </div> --}}
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label for="solusi" class="form-label">Solusi</label>
                                                    <textarea name="solusi" class="form-control" id="solusi" rows="10" required></textarea>
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
                                <th style="width: 50px; text-align: center;">No</th>
                                <th>Kode Solusi</th>
                                <th>Penyakit</th>
                                <th style="width: 50px; text-align: center;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($penyakits as $index => $item)
                                <tr>
                                    <td style="text-align: center;">{{ $penyakits->firstItem() + $index }}</td>
                                    <td>{{ $item->kode_solusi  }}</td> <!-- Memperbaiki nama kolom -->
                                    <td class="text-wrap">{{ $item->penyakit }}</td> <!-- Menampilkan data jenis kelamin -->
                                    <td style="text-align: center;">
                                        <a href="penyakit-edit/{{ $item->id }}" class="btn btn-icon btn-outline-primary">
                                            <i class="bx bx-edit-alt"></i>
                                        </a>
                                        <!-- Tombol Hapus -->
                                        <a href="javascript:void(0)" 
                                           onclick="confirmDeletePenyakit({{ $item->id }}, '{{ $item->penyakit }}')" 
                                           style="display:inline;">
                                            <button class="btn btn-icon btn-outline-danger">
                                                <i class="bx bx-trash"></i>
                                            </button>
                                        </a>

                                         <!-- Tombol Detail -->
                                         <a href="penyakit-show/{{ $item->id }}" class="btn btn-icon btn-outline-info">
                                            <i class="bx bx-show-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">Data Kosong</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    
                    
                    <!-- Pagination -->
                    <div class="d-flex justify-content-end mt-3">
                        {{ $penyakits->appends(request()->input())->links('pagination::bootstrap-5') }}
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    function confirmDeletePenyakit(id, nama) {
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
                window.location.href = `/admin/penyakit-destroy/${id}`;
            }
        });
    }
</script>

    
@include('sweetalert::alert')
@endsection
