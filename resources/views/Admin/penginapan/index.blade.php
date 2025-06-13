@extends('layouts.admin')

@section('title', 'Penginapan')

@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Data / </span>Penginapan</h4>
        <div class="card">
            <h5 class="card-header">Data Penginapan</h5>
           
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
                                    <h5 class="modal-title" id="addProductModalLabel">Tambah Penginapan</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form  action="penginapan-add" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="row">
                                            <!-- Kolom Kiri -->
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="namaPenginapan" class="form-label">Nama Penginapan</label>
                                                    <input type="text" name="nama_penginapan" class="form-control" id="namaPenginapan" required>
                                                </div>
                                
                                                <div class="mb-3">
                                                    <label for="deskripsi" class="form-label">Deskripsi</label>
                                                    <textarea name="deskripsi" class="form-control" id="deskripsi" rows="3" required></textarea>
                                                </div>
                                
                                                <div class="mb-3">
                                                    <label for="tentangPenginapan" class="form-label">Tentang Penginapan</label>
                                                    <textarea name="tentang_penginapan" class="form-control" id="tentangPenginapan" rows="3" required></textarea>
                                                </div>
                                
                                                <div class="mb-3">
                                                    <label for="lokasi" class="form-label">Lokasi</label>
                                                    <input type="text" name="lokasi" class="form-control" id="lokasi" required>
                                                </div>
                                
                                               
                                            </div>
                                
                                            <!-- Kolom Kanan -->
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="hargaPerMalam" class="form-label">Harga Per Malam</label>
                                                    <div class="input-group">
                                                        <span class="input-group-text">Rp</span>
                                                        <input 
                                                            type="text" 
                                                            name="formatted_harga_per_malam" 
                                                            class="form-control" 
                                                            id="hargaPerMalam" 
                                                            placeholder="Masukkan harga per malam" 
                                                            oninput="formatRupiahTambah(this)" 
                                                            required
                                                        >
                                                    </div>
                                                    <!-- Input hidden untuk menyimpan nilai asli tanpa format -->
                                                    <input 
                                                        type="hidden" 
                                                        name="harga_per_malam" 
                                                        id="hargaPerMalamHidden"
                                                    >
                                                </div>
                                                
                                                
                                                
                                            
                                                <div class="mb-3">
                                                    <label for="image1" class="form-label">Gambar 1</label>
                                                    <input type="file" name="image1" class="form-control" id="image1" accept="image/jpeg, image/png, image/jpg, image/gif, image/svg+xml" onchange="previewImage(this, 'preview1')">
                                                    <img id="preview1" src="#" alt="Pratinjau Gambar 1" class="img-fluid mt-3" style="max-width: 200px; display: none;">
                                                </div>
                                                
                                                <div class="mb-3">
                                                    <label for="image2" class="form-label">Gambar 2</label>
                                                    <input type="file" name="image2" class="form-control" id="image2" accept="image/jpeg, image/png, image/jpg, image/gif, image/svg+xml" onchange="previewImage(this, 'preview2')">
                                                    <img id="preview2" src="#" alt="Pratinjau Gambar 2" class="img-fluid mt-3" style="max-width: 200px; display: none;">
                                                </div>
                                                
                                                <div class="mb-3">
                                                    <label for="image3" class="form-label">Gambar 3</label>
                                                    <input type="file" name="image3" class="form-control" id="image3" accept="image/jpeg, image/png, image/jpg, image/gif, image/svg+xml" onchange="previewImage(this, 'preview3')">
                                                    <img id="preview3" src="#" alt="Pratinjau Gambar 3" class="img-fluid mt-3" style="max-width: 200px; display: none;">
                                                </div>
                                                
                                                <div class="mb-3">
                                                    <label for="image4" class="form-label">Gambar 4</label>
                                                    <input type="file" name="image4" class="form-control" id="image4" accept="image/jpeg, image/png, image/jpg, image/gif, image/svg+xml" onchange="previewImage(this, 'preview4')">
                                                    <img id="preview4" src="#" alt="Pratinjau Gambar 4" class="img-fluid mt-3" style="max-width: 200px; display: none;">
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
                            <th style="width: 5%">No</th>
                            <th>Nama Penginapan</th>
                            <th>Lokasi</th>
                            <th>Harga Per Malam</th>
                            
                            <th style="width: 10%">Actions</th>
                        </thead>
                        <tbody>
                            @forelse ($penginapans as $index => $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->nama_penginapan }}</td>
                                    <td>{{ $item->lokasi }}</td>
                                    <td>Rp {{ number_format($item->harga_per_malam, 0, ',', '.') }}</td>


                                    <td>
                                        
                                        <!-- Tombol Edit -->
                                        <a href="penginapan-edit/{{ $item->id }}"
                                            class="btn btn-icon btn-outline-primary">
                                            <i class="bx bx-edit-alt"></i>
                                        </a>

                                    
                                        <!-- Tombol Hapus -->
                                        <a href="javascript:void(0)" onclick="confirmDelete({{ $item->id }}, '{{ $item->nama_penginapan }}')" style="display:inline;">
                                            <button class="btn btn-icon btn-outline-danger">
                                                <i class="bx bx-trash"></i>
                                            </button>
                                        </a>
                                        
                                        <!-- Tombol Detail -->
                                        <a href="penginapan-show/{{ $item->id }}" class="btn btn-icon btn-outline-info">
                                            <i class="bx bx-show-alt"></i>
                                        </a>
                                    </td>
                                    
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">Data Kosong</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function formatRupiahTambah(input) {
    // Menghapus semua karakter selain angka
    let value = input.value.replace(/\D/g, "");

    // Menambahkan format angka dengan titik sebagai pemisah ribuan
    input.value = new Intl.NumberFormat('id-ID').format(value);

    // Menyimpan nilai asli tanpa format ke input hidden
    document.getElementById("hargaPerMalamHidden").value = value;
}

</script>
@include('sweetalert::alert')
@endsection
