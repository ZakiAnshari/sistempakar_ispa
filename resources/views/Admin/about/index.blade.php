@extends('layouts.admin')

@section('title', 'about')

@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <h5 class="card-header">Tentang Kami</h5>

            <div class="card-body">
                <div class="table-responsive text-nowrap">
                   <!-- Modal Edit Data -->
                    <div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <!-- Tambahkan judul -->
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addProductModalLabel">Edit Tentang Kami</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form id="editForm" action="" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT') <!-- Menentukan metode PUT -->
                                    <div class="modal-body">
                                        <div>
                                            <label for="exampleFormControlTextarea1" class="form-label">Deskripsi</label>
                                            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                                        </div>
                                        <div class="row">
                                            <!-- Kolom kiri -->
                                            <div class="col-md-6">
                                              <small class="text-light fw-semibold">Checkboxes (Kiri)</small>
                                              <div class="form-check mt-3">
                                                <input class="form-check-input" type="checkbox" value="" id="check1">
                                                <label class="form-check-label" for="check1">Checkbox 1</label>
                                              </div>
                                              <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="check2">
                                                <label class="form-check-label" for="check2">Checkbox 2</label>
                                              </div>
                                              <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="check3">
                                                <label class="form-check-label" for="check3">Checkbox 3</label>
                                              </div>
                                              <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="check4">
                                                <label class="form-check-label" for="check4">Checkbox 4</label>
                                              </div>
                                            </div>
                                          
                                            <!-- Kolom kanan -->
                                            <div class="col-md-6">
                                              <small class="text-light fw-semibold">Checkboxes (Kanan)</small>
                                              <div class="form-check mt-3">
                                                <input class="form-check-input" type="checkbox" value="" id="check5">
                                                <label class="form-check-label" for="check5">Checkbox 5</label>
                                              </div>
                                              <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="check6">
                                                <label class="form-check-label" for="check6">Checkbox 6</label>
                                              </div>
                                              <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="check7">
                                                <label class="form-check-label" for="check7">Checkbox 7</label>
                                              </div>
                                            </div>
                                          </div>
                                          
                                    </div>
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
                                <th style="width: 5px">No</th>
                                <th>Deskripsi</th>
                                <th style="width:25px">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($abouts as $index => $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->discription }}</td> <!-- Pastikan kolom ini sesuai dengan yang ada di database -->
                                    <td>
                                        <button type="button" class="btn btn-icon btn-outline-primary" data-bs-toggle="modal" data-bs-target="#addProductModal" data-id="{{ $item->id }}" data-description="{{ $item->description }}">
                                            <i class="bx bx-edit-alt"></i>
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center">Data Kosong</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@include('sweetalert::alert')
@endsection
