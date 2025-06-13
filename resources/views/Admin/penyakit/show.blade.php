@extends('layouts.admin')

@section('title', 'Penyakit-detail')

@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Detail / </span>Penyakit</h4>
        <div class="card">
            <h5 class="card-header">Detail Penyakit</h5>
            <div class="card-body">
                <div class="col text-end">
                    <a href="{{ route('penyakit.index') }}">
                        <button class="btn btn-primary btn-sm mb-3 d-flex align-items-center">
                            <i class="bx bx-arrow-back me-2"></i> Kembali
                        </button>
                    </a>
                </div>
                <div class="row">
                    <!-- Kode Solusi -->
                    <div class="col-lg-6 mb-2">
                        <label for="kode_solusi" class="form-label">Kode Solusi</label>
                        <input type="text" name="kode_solusi" class="form-control" value="{{ $penyakits->kode_solusi }}" readonly>
                    </div>
                    <!-- Nama Penyakit -->
                    <div class="col-lg-6 mb-2">
                        <label for="penyakit" class="form-label">Nama Penyakit</label>
                        <input type="text" name="penyakit" class="form-control" value="{{ $penyakits->penyakit }}" readonly>
                    </div>
                    <!-- Definisi -->
                   
                    <!-- Solusi -->
                    <div class="col-lg-12 mb-4">
                        <label for="solusi" class="form-label">Solusi</label>
                        <textarea name="solusi" class="form-control" rows="10" readonly>{{ $penyakits->solusi }}</textarea>
                    </div>
                </div>
                
        </div>
    </div>
</div>

@include('sweetalert::alert')
@endsection
