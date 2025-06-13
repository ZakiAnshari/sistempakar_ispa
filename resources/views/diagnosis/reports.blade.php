@extends('Layouts.admin')
@section('title','Laporan')
@section('content')
<div class="container my-5">
    <h2 class="fw-bold text-center">Laporan Diagnosis Pasien</h2>

    <table class="table table-bordered mt-4">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <th>Pekerjaan</th>
                <th>Tanggal Diagnosa</th>
                <th>Penyakit</th>
               
            </tr>
        </thead>
        <tbody>
            @foreach ($reports as $report)
                <tr>
                    <td>{{ $report->nama }}</td>
                    <td>{{ $report->jenis_kelamin }}</td>
                    <td>{{ $report->alamat }}</td>
                    <td>{{ $report->pekerjaan }}</td>
                    <td>{{ $report->tanggal_diagnosa->format('d M Y') }}</td>
                    <td>{{ $report->penyakit }}</td>
                    
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
