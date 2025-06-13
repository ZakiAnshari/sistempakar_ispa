@extends('layouts.admin')

@section('title', 's')

@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Data / </span>User</h4>
        <div class="card">
            <h5 class="card-header">Table User</h5>
            <div class="card-body">
                
             
                
                
                
                <div class="table-responsive text-nowrap">
                     <!-- Modal tambah Data -->
                     <div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                                <!-- Judul -->
                            
                               
                            </div>
                        </div>
                    </div>
                    
                    <!-- Table Data -->
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 50px; text-align: center;">No</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th style="width: 50px; text-align: center;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $index => $item)
                                <tr>
                                    <td style="text-align: center;">{{ $index + 1 }}</td> <!-- Menampilkan nomor urut -->
                                    <td>{{ $item->name }}</td> <!-- Menampilkan sname -->
                                    <td class="text-wrap">{{ $item->email }}</td> <!-- Menampilkan email -->
                                    <td style="text-align: center;">
                                        <!-- Tombol Hapus -->
                                        <a href="javascript:void(0)" 
                                           onclick="confirmDeleteuser({{ $item->id }}, '{{ $item->name }}')" 
                                           style="display:inline;">
                                            <button class="btn btn-icon btn-outline-danger">
                                                <i class="bx bx-trash"></i>
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">Data Kosong</td> <!-- Memperbaiki jumlah kolom -->
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    
                    <!-- Pagination -->
                   
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    function confirmDeleteuser(id, nama) {
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
                // URL diarahkan ke lokasi-destroy
                window.location.href = `/admin/user-destroy/${id}`;
            }
        });
    }
</script>

    
@include('sweetalert::alert')
@endsection
