@extends('layouts.admin')

@section('title', 'Diagnosa')

@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Data / </span>Diagnosa</h4>
        <div class="card">
            <h5 class="card-header">Table Diagnosa</h5>
            <div class="card-body">
                
                <div class="container">
                    <div class="row justify-content-end">
                        <div class="col-auto">
                            <a href="{{ route('diagnosa.cetak') }}" class="btn btn-primary btn-sm mb-3 d-flex align-items-center" target="_blank">
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
                                <th>Jenis Kelamin</th>
                                <th>Alamat</th>
                                <th>Tanggal Diagnosa</th>
                                <th>Penyakit</th>
                                <th>Diagnosa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($pasiens as $index => $item)
                                <tr>
                                    <!-- Nomor Urut -->
                                    <td style="text-align: center;">{{ $pasiens->firstItem() + $index }}</td>
                                    
                                    <!-- Nama Pasien -->
                                    <td>{{ $item->nama_pasien }}</td>
                                    
                                    <!-- Jenis Kelamin -->
                                    <td>{{ $item->jenis_kelamin_pasien }}</td>
                                    
                                    <!-- Alamat -->
                                    <td>{{ $item->alamat_pasien }}</td>
                                    
                                    <!-- Tanggal Diagnosa -->
                                    <td>
                                        {{ \Carbon\Carbon::parse($item->tgl)->locale('id')->isoFormat('dddd, D MMMM YYYY') }}
                                    </td>
                                    
                                    <!-- Penyakit -->
                                    <td style="text-align: center;">
                                        {{ $item->penyakit_terdeteksi ?? 'Alhamdulillah Anda sehat! 😊' }}
                                    </td>
                                    <td>{{ $item->definisi ?? 'Tidak ada 😊'}}</td>
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



@include('sweetalert::alert')
@endsection
