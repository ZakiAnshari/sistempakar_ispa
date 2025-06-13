@extends('layouts.admin')

@section('title', 'pertanyaan-edit')

@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Edit / </span>Pertanyaan Surfing</h4>
        <div class="card">
            <h5 class="card-header">Form Edit</h5>
            <div class="card-body">
                <div class="col text-end">
                    <a href="{{ route('surfing_pertanyaan.index') }}">
                        <button class="btn btn-primary btn-sm mb-3 d-flex align-items-center">
                            <i class="bx bx-arrow-back me-2"></i> Kembali
                        </button>
                    </a>
                </div>
                <form action="{{ url('admin/surfing/pertanyaan-edit/' . $pertanyaans->id) }}" method="post">
                    @csrf
                    @method('POST') <!-- Gunakan PUT untuk update data -->

                    <div class="row">
                        <!-- Kolom Kiri -->
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label for="pertanyaan" class="form-label">Pertanyaan</label>
                                <input type="text" name="pertanyaan" class="form-control" id="pertanyaan" value="{{ $pertanyaans->pertanyaan }}" required>
                            </div>
                
                            <div class="mb-3">
                                <label for="jawaban" class="form-label">Jawaban</label>
                                <textarea name="jawaban" class="form-control" id="jawaban" rows="3" required>{{ $pertanyaans->jawaban }}</textarea>
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
