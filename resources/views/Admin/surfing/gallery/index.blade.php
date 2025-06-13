@extends('layouts.admin')

@section('title', 'Gallery')

@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Data / </span>Gallery Surfing</h4>
        <div class="card">
            <h5 class="card-header">Table Gallery</h5>
           
            <div class="card-body">
                <div class="col text-end">
                    <button type="button" class="btn btn-success btn-sm mb-3 d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#addGalleryModal">
                        <i class="bx bx-plus me-2"></i> Tambah
                    </button>
                </div>
                
                <div class="table-responsive text-nowrap">
                    <!-- Modal tambah Data -->
                    <div class="modal fade" id="addGalleryModal" tabindex="-1" aria-labelledby="addGalleryModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                                <!-- Judul -->
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addGalleryModalLabel">Tambah Gallery</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="gallery-add" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="namaGallery" class="form-label">Nama Gallery</label>
                                            <input type="text" name="nama_gallery" class="form-control" id="namaGallery" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="imageGallerySurfing" class="form-label">Gambar Gallery</label>
                                            <input type="file" name="image_gallery_surfing" class="form-control" id="imageGallerySurfing" accept="image/*" onchange="previewImage(this, 'previewGallerySurfing')" required>
                                            <img id="previewGallerySurfing" src="#" alt="Pratinjau Gambar" class="img-fluid mt-3" style="max-width: 200px; display: none;">
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
                                <th style="width: 5%; text-align: center; vertical-align: middle;">No</th>
                                <th style="text-align: left; vertical-align: middle;">Nama Gallery</th>
                                <th style="text-align: center; vertical-align: middle;">Gambar</th>
                                <th style="width: 10%; text-align: center; vertical-align: middle;">Actions</th>
                            </tr>
                            
                        </thead>
                        <tbody>
                            @forelse ($gallerys as $index => $item)
                                <tr>
                                    <td>{{ $gallerys->firstItem() + $index }}</td>
                                    <td>{{ $item->nama_gallery }}</td>
                                    <td style="display: flex; justify-content: center; align-items: center; vertical-align: middle;">
                                        <img src="{{ asset('storage/' . $item->image_gallery_surfing) }}" 
                                             alt="{{ $item->nama_gallery }}" 
                                             class="img-thumbnail" 
                                             style="width: 150px; height: 150px; object-fit: cover;">
                                    </td>
                                    <td>
                                        <!-- Tombol Edit -->
                                        <a href="gallery-edit/{{ $item->id }}" class="btn btn-icon btn-outline-primary">
                                            <i class="bx bx-edit-alt"></i>
                                        </a>
                        
                                        <!-- Tombol Hapus -->
                                        <a href="javascript:void(0)" onclick="confirmDeleteGallery({{ $item->id }}, '{{ $item->nama_gallery }}')" style="display:inline;">
                                            <button class="btn btn-icon btn-outline-danger">
                                                <i class="bx bx-trash"></i>
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">Data Kosong</td>
                                </tr>
                            @endforelse
                        </tbody>
                        
                    </table>
                    <!-- Pagination -->
                    <div class="d-flex justify-content-end mt-3">
                        {{ $gallerys->appends(request()->input())->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function confirmDeleteGallery(id, nama) {
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
                window.location.href = `/admin/surfing/gallery-destroy/${id}`;
            }
        });
    }
</script>

@include('sweetalert::alert')
@endsection
