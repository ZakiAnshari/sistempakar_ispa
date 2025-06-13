@extends('layouts.admin')

@section('title', 'alat-edit')

@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Edit / </span>Lokasi Surfing</h4>
        <div class="card">
            <h5 class="card-header">Form Edit</h5>
            <div class="card-body">
                <div class="col text-end">
                    <a href="{{ route('surfing_alat.index') }}">
                        <button class="btn btn-primary btn-sm mb-3 d-flex align-items-center">
                            <i class="bx bx-arrow-back me-2"></i> Kembali
                        </button>
                    </a>
                </div>
                <form action="{{ url('admin/surfing/alat-edit/' . $alats->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('POST') <!-- Gunakan method PUT untuk update data -->
                    <div class="row">
                        <!-- Kolom Kiri -->
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="nama_alat" class="form-label">Nama Alat</label>
                                <input type="text" name="nama_alat" class="form-control" id="nama_alat" value="{{ $alats->nama_alat }}" required>
                            </div>
                
                            <div class="mb-3">
                                <label for="deskripsi_alat" class="form-label">Deskripsi Alat</label>
                                <textarea name="deskripsi_alat" class="form-control" id="deskripsi_alat" rows="3" required>{{ $alats->deskripsi_alat }}</textarea>
                            </div>
                
                            <div class="mb-3">
                                <label for="harga" class="form-label">Harga (Rp)</label>
                                <input type="text" name="harga" class="form-control" id="harga"
                                       value="{{ number_format($alats->harga, 0, ',', '.') }}" 
                                       placeholder="Masukkan harga alat" 
                                       oninput="formatRupiahTambah(this)">
                                <!-- Input hidden untuk menyimpan nilai asli (tanpa titik) -->
                                <input type="hidden" name="hargaAlatHidden" id="hargaAlatHidden" value="{{ $alats->harga }}">
                            </div>
                            
                            
                            
                            
                        </div>
                
                        <!-- Kolom Kanan -->
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="penyewaan" class="form-label">Durasi Sewa</label>
                                <select name="penyewaan" class="form-select" id="penyewaan" required>
                                    <option value="">Pilih Durasi Sewa</option>
                                    <option value="Per Jam" {{ $alats->penyewaan == 'Per Jam' ? 'selected' : '' }}>Per Jam</option>
                                    <option value="Per Hari" {{ $alats->penyewaan == 'Per Hari' ? 'selected' : '' }}>Per Hari</option>
                                </select>
                            </div>
                
                            <div class="mb-3">
                                <label for="image_alat_surfing" class="form-label">Gambar Alat Surfing</label>
                                <input type="file" name="image_alat_surfing" class="form-control" id="image_alat_surfing" accept="image/*" 
                                       onchange="previewImage(this, 'previewAlatSurfing')">
                                @if($alats->image_alat_surfing)
                                    <small class="form-text text-muted">File saat ini: {{ $alats->image_alat_surfing }}</small>
                                    <br>
                                    <img src="{{ asset('storage/' . $alats->image_alat_surfing) }}" alt="Gambar Alat" 
                                         id="previewAlatSurfing" class="img-thumbnail mt-3" style="max-width: 200px;">
                                @else
                                    <img id="previewAlatSurfing" src="#" alt="Pratinjau Gambar Alat" class="img-fluid mt-3" 
                                         style="max-width: 200px; display: none;">
                                @endif
                            </div>
                        </div>
                    </div>
                    
                    <!-- Tombol -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
</div>


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
