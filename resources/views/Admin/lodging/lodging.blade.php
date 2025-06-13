@extends('layouts.admin')
@section('title','lodging')
@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
        <h5 class="card-header">Table Penginapan</h5>
        <div class="card-body">
            <div class="mb-3">
                <a href="/lodging-add" class="btn btn-primary">
                    <i class="fas fa-plus me-1"></i> <!-- Ikon Tambah -->
                    Tambah
                </a> <!-- Tombol Tambah -->
            </div>
          <div class="table-responsive text-nowrap">
            <table class="table table-bordered">
              <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Penginapan</th>
                    <th>Detail</th>
                    <th>Okomodasi</th>
                    <th>Foto</th>
                    <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                    <td>1</td>
                    <td>Albert Cook</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a>
                            </div>
                        </div>
                    </td>
                </tr>
                
              </tbody>
            </table>
            <br>
            <div class="demo-inline-spacing">
                <!-- Basic Pagination -->
                <nav aria-label="Page navigation" class="d-flex justify-content-end">
                    <ul class="pagination">
                        <li class="page-item prev">
                            <a class="page-link" href="javascript:void(0);">
                                <i class="tf-icon bx bx-chevron-left"></i>
                            </a>
                        </li>
                        <li class="page-item active">
                            <a class="page-link" href="javascript:void(0);">1</a>
                        </li>
                        <li class="page-item next">
                            <a class="page-link" href="javascript:void(0);">
                                <i class="tf-icon bx bx-chevron-right"></i>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!--/ Basic Pagination -->
            </div>
            
          </div>
        </div>
    </div>
</div>

@include('sweetalert::alert')
@endsection