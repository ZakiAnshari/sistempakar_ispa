@extends('layouts.admin')

@section('title', 'Lokasi-detail')

@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Detail / </span>Lokasi Surfing</h4>
        <div class="card">
            <h5 class="card-header">Detail Lokasi</h5>
            <div class="card-body">
                <div class="col text-end">
                    <a href="{{ route('surfing_lokasi.index') }}">
                        <button class="btn btn-primary btn-sm mb-3 d-flex align-items-center">
                            <i class="bx bx-arrow-back me-2"></i> Kembali
                        </button>
                    </a>
                </div>
                <div class="row">
                    <!-- Nama Ombak -->
                    <div class="col-md-3 mb-4">
                        <label for="namaOmbak" class="form-label">Nama Ombak</label>
                        <input type="text" name="nama_ombak" class="form-control" value="{{ $surfings->nama_ombak }}" readonly>
                    </div>
                     <!-- Ketinggian Ombak -->
                     <div class="col-md-3 mb-4">
                        <label for="ketinggianOmbak" class="form-label">Ketinggian Ombak</label>
                        <input type="text" name="ketinggian_ombak" class="form-control" value="{{ $surfings->ketinggian_ombak }} meter" readonly>
                    </div>

                      <!-- Musim -->
                      <div class="col-md-3 mb-4">
                        <label for="musim" class="form-label">Musim Terbaik</label>
                        <input type="text" name="musim" class="form-control" value="{{ $surfings->musim }}" readonly>
                    </div>
                    
                    <!-- Tingkat Kesulitan -->
                    <div class="col-md-3 mb-4">
                        <label for="tingkatKesulitan" class="form-label">Tingkat Kesulitan</label>
                        <input type="text" name="tingkat" class="form-control" value="{{ $surfings->tingkat }}" readonly>
                    </div>
                    
                    <!-- Deskripsi -->
                    <div class="col-md-12 mb-4">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea name="deskripsi" id="deskripsi" class="form-control" rows="3" readonly>{{ $surfings->deskripsi }}</textarea>
                    </div>
                    
                   
                  
                    
                    <!-- Foto Lokasi -->
                    <div class="row justify-content-center">
                        <div class="col-md-6 mb-4 text-center">
                            <label for="fotoLokasi" class="form-label">Foto Lokasi</label>
                            @if ($surfings->image_lokasi_surfing)
                                <img src="{{ asset('storage/' . $surfings->image_lokasi_surfing) }}" class="img-fluid rounded" alt="Foto Lokasi">
                            @else
                                <p>Tidak ada foto lokasi</p>
                            @endif
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>

@include('sweetalert::alert')
@endsection
