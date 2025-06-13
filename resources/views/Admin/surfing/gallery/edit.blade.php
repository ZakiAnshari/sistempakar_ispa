@extends('layouts.admin')

@section('title', 'Gallery Edit')

@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Edit / </span>Gallery Surfing</h4>
        <div class="card">
            <h5 class="card-header">Form Edit</h5>
            <div class="card-body">
                <div class="col text-end">
                    <a href="{{ route('surfing_gallery.index') }}">
                        <button class="btn btn-primary btn-sm mb-3 d-flex align-items-center">
                            <i class="bx bx-arrow-back me-2"></i> Kembali
                        </button>
                    </a>
                </div>
                <form action="{{ url('admin/surfing/gallery-edit/' . $gallerys->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('POST') <!-- Gunakan method PUT untuk update data -->
                    <div class="row">
                        <!-- Kolom Kiri -->
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="nama_gallery" class="form-label">Nama Gallery</label>
                                <input type="text" name="nama_gallery" class="form-control" id="nama_gallery" value="{{ $gallerys->nama_gallery }}" required>
                            </div>
                        </div>
                
                        <!-- Kolom Kanan -->
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="image_gallery_surfing" class="form-label">Gambar Gallery Surfing</label>
                                <input type="file" name="image_gallery_surfing" class="form-control" id="image_gallery_surfing" accept="image/*" onchange="previewImage(this, 'previewGallerySurfing')">
                                @if($gallerys->image_gallery_surfing)
                                    <small class="form-text text-muted">File saat ini: {{ $gallerys->image_gallery_surfing }}</small>
                                    <br>
                                    <img src="{{ asset('storage/' . $gallerys->image_gallery_surfing) }}" alt="Gambar Gallery" 
                                         id="previewGallerySurfing" class="img-thumbnail mt-3" style="max-width: 200px;">
                                @else
                                    <img id="previewGallerySurfing" src="#" alt="Pratinjau Gambar Gallery" class="img-fluid mt-3" 
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
    function previewImage(input, previewId) {
        const file = input.files[0];
        const reader = new FileReader();
        reader.onload = function(e) {
            const preview = document.getElementById(previewId);
            preview.src = e.target.result;
            preview.style.display = "block";
        }
        if (file) {
            reader.readAsDataURL(file);
        }
    }
</script>

@include('sweetalert::alert')
@endsection
