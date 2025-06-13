@extends('layouts.admin')

@section('title', 'Rule')

@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Data / </span>Rule</h4>
        <div class="card">
            <h5 class="card-header">Table Rule</h5>
            <div class="card-body">
                
                <div class="container">
                    <div class="col text-end">
                        <button type="button" class="btn btn-success btn-sm mb-3 d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#addProductModal">
                            <i class="bx bx-plus me-2"></i> Tambah
                        </button>
                    </div>
                </div>
                
                
                
                <div class="table-responsive text-nowrap">
                     <!-- Modal tambah Data -->
                     <div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-xl"> <!-- Ganti modal-lg dengan modal-xl -->
                            <div class="modal-content">
                                <!-- Judul -->
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addProductModalLabel">Tambah Rule</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="rule-add" method="POST" class="p-4 border rounded shadow-sm bg-light">
                                    @csrf
                                    <h4 class="mb-4">Tambah Aturan</h4>
                                    <div class="mb-3">
                                        <label for="kode_solusi" class="form-label fw-bold">Penyakit</label>
                                        <select name="kode_solusi" id="kode_solusi" class="form-select" required>
                                            <option value="" disabled selected>Pilih Penyakit</option>
                                            @foreach ($penyakits as $p)
                                                <option value="{{ $p->kode_solusi }}">{{ $p->penyakit }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Gejala</label>
                                        <div>
                                            @foreach ($gejalas as $g)
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="kode_gejala" value="{{ $g->kode_gejala }}" id="gejala_{{ $g->kode_gejala }}" required>
                                                    <div class="form-check-label">
                                                        <span class="fw-bold">{{ $g->kode_gejala }}</span> - {{ $g->nama_gejala }}
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary w-100">Simpan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Table Data -->
                    <table class="table table-bordered table-striped table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Kode Gejala</th>
                                <th class="text-center">Kode Solusi</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($rules as $index => $item)
                                <tr>
                                    <td style="text-align: center;">{{ $index + 1 }}</td>
                                    <td class="text-center">{{ $item->kode_gejala }}</td>
                                    <td class="text-center">{{ $item->kode_solusi }}</td>
                                    <td class="text-center">
                                        <a href="javascript:void(0)" 
                                           onclick="confirmDeleteRule({{ $item->id }}, '{{ $item->rule->kode_gejala ?? 'Data' }}')" 
                                           style="display:inline;">
                                            <button class="btn btn-outline-danger btn-sm" title="Hapus Data">
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
                        {{ $rules->appends(request()->input())->links('pagination::bootstrap-5') }}
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    function confirmDeleteRule(id, nama) {
        Swal.fire({
            title: `Apakah Anda yakin?`,
            text: ` Data akan dihapus dan tidak dapat dikembalikan.`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                // URL diarahkan ke lokasi-destroy
                window.location.href = `/admin/rule-destroy/${id}`;
            }
        });
    }
</script>

    
@include('sweetalert::alert')
@endsection
