@extends('layouts.admin')

@section('title', 'lokasi-edit')

@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Edit / </span>Lokasi Surfing</h4>
        <div class="card">
            <h5 class="card-header">Form Edit</h5>
            <div class="card-body">
                <div class="col text-end">
                    <a href="{{ route('surfing_lokasi.index') }}">
                        <button class="btn btn-primary btn-sm mb-3 d-flex align-items-center">
                            <i class="bx bx-arrow-back me-2"></i> Kembali
                        </button>
                    </a>
                </div>
                <form action="{{ url('admin/surfing/lokasi-edit/' . $surfings->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('POST') <!-- Gunakan method PUT untuk update data -->
                    <div class="row">
                        <!-- Kolom Kiri -->
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="nama_ombak" class="form-label">Nama Ombak</label>
                                <input type="text" name="nama_ombak" class="form-control" id="nama_ombak" value="{{ $surfings->nama_ombak }}" required>
                            </div>
                    
                            <div class="mb-3">
                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                <textarea name="deskripsi" class="form-control" id="deskripsi" rows="3" required>{{ $surfings->deskripsi }}</textarea>
                            </div>
                    
                            <div class="mb-3">
                                <label for="ketinggian_ombak" class="form-label">Ketinggian Ombak (m)</label>
                                <input type="number" name="ketinggian_ombak" class="form-control" id="ketinggian_ombak" value="{{ $surfings->ketinggian_ombak }}" step="0.1" placeholder="Contoh: 2.5" required>
                            </div>
                    
                            <div class="mb-3">
                                <label for="musim" class="form-label">Musim Terbaik</label>
                                <select name="musim" class="form-select" id="musim" required>
                                    <option value="">Pilih Musim Terbaik</option>
                                    <option value="Mei - September" {{ $surfings->musim == 'Mei - September' ? 'selected' : '' }}>Mei - September</option>
                                    <option value="Oktober - April" {{ $surfings->musim == 'Oktober - April' ? 'selected' : '' }}>Oktober - April</option>
                                    <option value="Sepanjang Tahun" {{ $surfings->musim == 'Sepanjang Tahun' ? 'selected' : '' }}>Sepanjang Tahun</option>
                                </select>
                            </div>
                        </div>
                    
                        <!-- Kolom Kanan -->
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="tingkat" class="form-label">Tingkat Kesulitan</label>
                                <select name="tingkat" class="form-select" id="tingkat" required>
                                    <option value="">Pilih Tingkat Kesulitan</option>
                                    <option value="Pemula" {{ $surfings->tingkat == 'Pemula' ? 'selected' : '' }}>Pemula</option>
                                    <option value="Menengah" {{ $surfings->tingkat == 'Menengah' ? 'selected' : '' }}>Menengah</option>
                                    <option value="Profesional" {{ $surfings->tingkat == 'Profesional' ? 'selected' : '' }}>Profesional</option>
                                </select>
                            </div>
                    
                            <div class="mb-3">
                                <label for="image_lokasi_surfing" class="form-label">Gambar Lokasi Surfing</label>
                                <input type="file" name="image_lokasi_surfing" class="form-control" id="image_lokasi_surfing" accept="image/*" 
                                       onchange="previewImage(this, 'previewLokasiSurfing')">
                                @if($surfings->image_lokasi_surfing)
                                    <small class="form-text text-muted">File saat ini: {{ $surfings->image_lokasi_surfing }}</small>
                                    <br>
                                    <img src="{{ asset('storage/' . $surfings->image_lokasi_surfing) }}" alt="Gambar Lokasi" 
                                         id="previewLokasiSurfing" class="img-thumbnail mt-3" style="max-width: 200px;">
                                @else
                                    <img id="previewLokasiSurfing" src="#" alt="Pratinjau Gambar Lokasi" class="img-fluid mt-3" 
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

@include('sweetalert::alert')
@endsection
