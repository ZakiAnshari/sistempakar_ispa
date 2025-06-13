@extends('layouts.admin')

@section('title', 'Detail Alat Surfing')

@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Detail / </span>Alat Surfing</h4>
        <div class="card">
            <h5 class="card-header">Detail Alat</h5>
            <div class="card-body">
                <div class="col text-end">
                    <a href="{{ route('surfing_alat.index') }}">
                        <button class="btn btn-primary btn-sm mb-3 d-flex align-items-center">
                            <i class="bx bx-arrow-back me-2"></i> Kembali
                        </button>
                    </a>
                </div>
                <div class="row">
                    <!-- Nama Alat -->
                    <div class="col-md-4 mb-4">
                        <label for="namaAlat" class="form-label">Nama Alat</label>
                        <input type="text" name="nama_alat" class="form-control" value="{{ $alats->nama_alat }}" readonly>
                    </div>
                    
                     <!-- Penyewaan -->
                     <div class="col-md-4 mb-4">
                        <label for="penyewaan" class="form-label">Penyewaan</label>
                        <input type="text" name="penyewaan" class="form-control" value="{{ $alats->penyewaan }}" readonly>
                    </div>

                    <!-- Harga -->
                    <div class="col-md-4 mb-4">
                        <label for="harga" class="form-label">Harga (Rp)</label>
                        <input type="text" name="harga" class="form-control" 
                               value="Rp {{ number_format($alats->harga, 0, ',', '.') }}" readonly>
                    </div>
                    
                    <!-- Deskripsi -->
                    <div class="col-md-12 mb-4">
                        <label for="deskripsiAlat" class="form-label">Deskripsi Alat</label>
                        <textarea name="deskripsi_alat" id="deskripsiAlat" class="form-control" rows="3" readonly>{{ $alats->deskripsi_alat }}</textarea>
                    </div>
                    
                   
                    
                    <!-- Foto Alat -->
                    <div class="row justify-content-center">
                        <div class="col-md-6 mb-4 text-center">
                            <label for="fotoAlat" class="form-label">Foto Alat</label>
                            @if ($alats->image_alat_surfing)
                                <img src="{{ asset('storage/' . $alats->image_alat_surfing) }}" class="img-fluid rounded" alt="Foto Alat">
                            @else
                                <p>Tidak ada foto alat</p>
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
