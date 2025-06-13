@extends('layouts.admin')

@section('title', 'Pasien')

@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Data / </span>Pasien</h4>
        <div class="card">
            <h5 class="card-header">Table Gejala</h5>
            <div class="card-body">
                
                <div class="container">
                    <div class="row justify-content-end">
                        <div class="col-auto">
                            <a href="{{ route('pasien.cetak') }}" class="btn btn-primary btn-sm mb-3 d-flex align-items-center" target="_blank">
                                <i class="bx bx-printer me-2"></i> Cetak
                            </a>
                            
                            
                            
                        </div>
                    </div>
                </div>
                
                
                
                <div class="table-responsive text-nowrap">
                    <!-- Table Data -->
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 50px; text-align: center;">No</th>
                                <th>Nama Pasien</th>
                                <th>Usia Pasien</th>
                                <th>Nama Ortu</th>
                                <th>Jenis Kelamin</th>
                                
                               
                                <th style="width: 50px; text-align: center;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($pasiens as $index => $item)
                                <tr>
                                    <td style="text-align: center;">{{ $pasiens->firstItem() + $index }}</td>
                                    <td>{{ $item->nama_pasien }}</td> <!-- Memperbaiki nama kolom -->
                                    <td>{{ $item->usia_pasien }} Tahun</td> 
                                    <td>{{ $item->nama_ortu }}</td><!-- Menampilkan data jenis kelamin -->
                                    <td>{{ $item->jenis_kelamin_pasien }}</td> 
                                   
                                    
                                   
                                  <!-- Menampilkan data pekerjaan -->
                                    <td style="text-align: center;">
                                        <!-- Tombol Hapus -->
                                        <a href="javascript:void(0)" 
                                           onclick="confirmDeletePasien({{ $item->id }}, '{{ $item->nama_pasien }}')" 
                                           style="display:inline;">
                                            <button class="btn btn-icon btn-outline-danger">
                                                <i class="bx bx-trash"></i>
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">Data Kosong</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    
                    
                    <!-- Pagination -->
                    <div class="d-flex justify-content-end mt-3">
                        {{ $pasiens->appends(request()->input())->links('pagination::bootstrap-5') }}
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    function confirmDeletePasien(id, nama) {
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
                window.location.href = `/admin/pasien-destroy/${id}`;
            }
        });
    }
</script>

<script>
    function printTable() {
        var printContents = document.querySelector(".table-responsive").innerHTML; // Ambil konten tabel
        var originalContents = document.body.innerHTML; // Simpan konten asli halaman
        
        // Setel halaman untuk mencetak
        document.body.innerHTML = printContents;

        window.print(); // Panggil fungsi print

        // Kembalikan konten asli halaman setelah pencetakan
        document.body.innerHTML = originalContents;
    }
</script>

@include('sweetalert::alert')
@endsection
