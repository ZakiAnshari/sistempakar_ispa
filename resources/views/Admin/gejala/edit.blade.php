@extends('layouts.admin')

@section('title', 'gejala-edit')

@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Edit / </span> Gejala</h4>
        <div class="card">
            <h5 class="card-header">Form Edit</h5>
            <div class="card-body">
                <div class="col text-end">
                    <a href="{{ route('gejala.index') }}">
                        <button class="btn btn-primary btn-sm mb-3 d-flex align-items-center">
                            <i class="bx bx-arrow-back me-2"></i> Kembali
                        </button>
                    </a>
                </div>
                <form action="{{ url('admin/gejala-edit/' . $gejalas->id) }}" method="post">
                    @csrf
                    @method('POST') <!-- Gunakan PUT untuk update data -->

                    <div class="row">
                        <!-- Kolom Kiri -->
                        <div class="col-lg-9">
                            <div class="mb-3">
                                <label for="nama_gejala" class="form-label">Nama Gejala</label>
                                <input type="text" name="nama_gejala" class="form-control" id="nama_gejala" value="{{ $gejalas->nama_gejala }}" required>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="mb-3">
                                <label for="bobot_gejala" class="form-label">Bobot</label>
                                <input 
                                    type="number" 
                                    name="bobot_gejala" 
                                    class="form-control" 
                                    id="bobot_gejala" 
                                    value="{{ $gejalas->bobot_gejala }}" 
                                    min="1" 
                                    max="3" <!-- Maksimum bobot diubah menjadi 3 -->
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
