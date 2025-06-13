@extends('layouts.admin')

@section('title', 'gejala-edit')

@section('content')
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Edit / </span> Penyakit</h4>
            <div class="card">
                <h5 class="card-header">Form Edit</h5>
                <div class="card-body">
                    <div class="col text-end">
                        <a href="{{ route('penyakit.index') }}">
                            <button class="btn btn-primary btn-sm mb-3 d-flex align-items-center">
                                <i class="bx bx-arrow-back me-2"></i> Kembali
                            </button>
                        </a>
                    </div>
                    <form action="{{ url('admin/penyakit-edit/' . $penyakits->id) }}" method="post">
                        @csrf
                        @method('POST') <!-- Gunakan PUT untuk update data -->

                        <div class="row">
                            <!-- Kolom Kiri -->
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="penyakit" class="form-label">Nama Penyakit</label>
                                    <input type="text" name="penyakit" class="form-control" id="penyakit"
                                        value="{{ $penyakits->penyakit }}" required>
                                </div>
                            </div>

                            <div class="col-lg-12">


                                <div class="mb-3">
                                    <label for="solusi" class="form-label">Solusi</label>
                                    <textarea name="solusi" class="form-control" id="solusi" rows="10" required>{{ $penyakits->solusi }}</textarea>
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
