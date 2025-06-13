@extends('layouts.admin')

@section('title', 'Penginapan-detail')

@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Detail / </span>Penginapan</h4>
        <div class="card">
            <h5 class="card-header">Detail Penginapan</h5>
            <div class="card-body">
                <div class="col text-end">
                    <a href="{{ route('penginapan.index') }}">
                        <button class="btn btn-primary btn-sm mb-3 d-flex align-items-center">
                            <i class="bx bx-arrow-back me-2"></i> Kembali
                        </button>
                    </a>
                </div>
                <div class="row">
                    <!-- Nama Penginapan -->
                    <div class="col-md-6 mb-4">
                        <label for="namaPenginapan" class="form-label">Nama Penginapan</label>
                        <input type="text" name="nama_penginapan" class="form-control" value="{{ $penginapans->nama_penginapan }}" readonly>
                    </div>
                
                    <!-- Harga -->
                    <div class="col-md-6 mb-4">
                        <label for="harga" class="form-label">Harga</label>
                        <input type="text" name="harga" class="form-control" value="Rp {{ $penginapans->harga_per_malam }}" readonly>
                    </div>
                
                    <!-- Tentang Penginapan -->
                    <div class="col-md-6 mb-4">
                        <label for="tentangPenginapan" class="form-label">Tentang Penginapan</label>
                        <textarea name="tentang_penginapan" id="tentangPenginapan" class="form-control" rows="4" readonly>{{ $penginapans->tentang_penginapan }}</textarea>
                    </div>
                
                    <!-- Deskripsi -->
                    <div class="col-md-6 mb-4">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea name="deskripsi" id="deskripsi" class="form-control" rows="4" readonly>{{ $penginapans->deskripsi }}</textarea>
                    </div>
                
                    <!-- Lokasi -->
                    <div class="col-md-12 mb-4">
                        <label for="lokasi" class="form-label">Lokasi</label>
                        <input type="text" name="lokasi" class="form-control" value="{{ $penginapans->lokasi }}" readonly>
                    </div>
                
                    <!-- Gambar Section -->
                    <div class="col-md-6 mb-4">
                        <label for="gambar1" class="form-label">Gambar 1</label>
                        @if ($penginapans->image1)
                            <img src="{{ asset('storage/' . $penginapans->image1) }}" class="img-fluid rounded" alt="Gambar 1">
                        @else
                            <p>Tidak ada gambar</p>
                        @endif
                    </div>
                
                    <div class="col-md-6 mb-4">
                        <label for="gambar2" class="form-label">Gambar 2</label>
                        @if ($penginapans->image2)
                            <img src="{{ asset('storage/' . $penginapans->image2) }}" class="img-fluid rounded" alt="Gambar 2">
                        @else
                            <p>Tidak ada gambar</p>
                        @endif
                    </div>
                
                    <div class="col-md-6 mb-4">
                        <label for="gambar3" class="form-label">Gambar 3</label>
                        @if ($penginapans->image3)
                            <img src="{{ asset('storage/' . $penginapans->image3) }}" class="img-fluid rounded" alt="Gambar 3">
                        @else
                            <p>Tidak ada gambar</p>
                        @endif
                    </div>
                
                    <div class="col-md-6 mb-4">
                        <label for="gambar4" class="form-label">Gambar 4</label>
                        @if ($penginapans->image4)
                            <img src="{{ asset('storage/' . $penginapans->image4) }}" class="img-fluid rounded" alt="Gambar 4">
                        @else
                            <p>Tidak ada gambar</p>
                        @endif
                    </div>
                </div>
                
                
                

               
            </div>
           
        </div>
    </div>
</div>

@include('sweetalert::alert')
@endsection
