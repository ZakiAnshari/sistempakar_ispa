@extends('layouts.admin')

@section('title', 'Penginapan-edit')

@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Edit / </span>Penginapan</h4>
        <div class="card">
            <h5 class="card-header">Form Edit</h5>
            <div class="card-body">
                <div class="col text-end">
                    <a href="{{ route('penginapan.index') }}">
                        <button class="btn btn-primary btn-sm mb-3 d-flex align-items-center">
                            <i class="bx bx-arrow-back me-2"></i> Kembali
                        </button>
                    </a>
                </div>
                <form action="penginapan-edit/{{$penginapans->id}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="nama_penginapan" class="form-label">Nama Penginapan</label>
                                <input type="text" name="nama_penginapan" class="form-control" id="nama_penginapan" placeholder="Nama penginapan" value="{{ $penginapans->nama_penginapan }}">
                            </div>
                            <div class="mb-3">
                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                <textarea name="deskripsi" class="form-control" id="deskripsi" rows="3" placeholder="Deskripsi singkat penginapan">{{ $penginapans->deskripsi }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="tentang_penginapan" class="form-label">Tentang Penginapan</label>
                                <textarea name="tentang_penginapan" class="form-control" id="tentang_penginapan" rows="3" placeholder="Detail tentang penginapan">{{ $penginapans->tentang_penginapan }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="lokasi" class="form-label">Lokasi</label>
                                <input type="text" name="lokasi" class="form-control" id="lokasi" placeholder="Lokasi penginapan" value="{{ $penginapans->lokasi }}">
                            </div>
                         
                        </div>
                        <div class="col-lg-6">
                        
                            <div class="mb-3">
                                <label for="harga_per_malam" class="form-label">Harga per Malam</label>
                                <div class="input-group">
                                    <span class="input-group-text">Rp</span>
                                    <input type="text" name="harga_per_malam" class="form-control" id="harga_per_malam" placeholder="Harga per malam" value="{{ number_format($penginapans->harga_per_malam, 0, ',', '.') }}">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="image1" class="form-label">Gambar 1</label>
                                <input type="file" name="image1" class="form-control" id="image1" accept="image/*">
                                @if($penginapans->image1)
                                    <small class="form-text text-muted">Current file: {{ $penginapans->image1 }}</small>
                                    <br>
                                    <img src="{{ asset('storage/' . $penginapans->image1) }}" alt="Gambar 1" class="img-thumbnail" style="width: 200px; height: auto;">
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="image2" class="form-label">Gambar 2</label>
                                <input type="file" name="image2" class="form-control" id="image2" accept="image/*">
                                @if($penginapans->image2)
                                    <small class="form-text text-muted">Current file: {{ $penginapans->image2 }}</small>
                                    <br>
                                    <img src="{{ asset('storage/' . $penginapans->image2) }}" alt="Gambar 2" class="img-thumbnail" style="width: 200px; height: auto;">
                                @endif
                            </div>
                            <div class="mb-3">
                                              
                        </div>
                        
                    </div>
                    
                    <!-- Tombol -->
                    <div class="modal-footer ">
                        
                        <button type="submit" class="btn btn-primary ">Edit</button>
                    </div>
                </form>

                 
          </div>
        
        </div>
       
    </div>
</div>

@include('sweetalert::alert')
@endsection
