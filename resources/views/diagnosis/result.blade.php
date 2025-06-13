@extends('Layouts.Frontend')
@section('title', 'Hasil Diagnosis')
@section('content')
<br>

<div class="container">
    <h1 class="text-center mb-4" style=" text-transform: uppercase;">Hasil Diagnosis ISPA</h1>
    
    <!-- Tampilkan Data Pasien -->
    @if (!empty($pasiens))
    <div class="card mb-4">
        <div class="card-body">
            <h3 class="text-info mb-4">Informasi Pasien</h3>
            <div class="row">
                <!-- Data Pasien -->
                <div class="col-md-6">
                    <h4 class="text-primary">Data Pasien</h4>
                    <table class="table table-bordered">
                        <tr>
                            <th>Nama Pasien</th>
                            <td>{{ $pasiens['nama_pasien'] }}</td>
                        </tr>
                        <tr>
                            <th>Usia Pasien</th>
                            <td>{{ $pasiens['usia_pasien'] }} tahun</td>
                        </tr>
                        <tr>
                            <th>Alamat Pasien</th>
                            <td>{{ $pasiens['alamat_pasien'] }}</td>
                        </tr>
                        <tr>
                            <th>Jenis Kelamin Pasien</th>
                            <td>{{ $pasiens['jenis_kelamin_pasien'] }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal Pemeriksaan</th>
                            <td>
                                {{ \Carbon\Carbon::parse($pasiens['tgl_pemeriksaan'])->locale('id')->isoFormat('dddd, D MMMM YYYY') }}
                            </td>
                        </tr>
                        <tr>
                            <th>Penyakit Terdeteksi</th>
                            <td>
                                @if (isset($topResult['probabilitas']) && $topResult['probabilitas'] == 0)
                                    -
                                @else
                                    {{ $topResult['penyakit'] ?? 'Tidak ada penyakit yang terdeteksi' }}
                                @endif
                            </td>
                        </tr>
                        
                        
                    </table>
                </div>
        
                <!-- Data Orang Tua -->
                <div class="col-md-6">
                    <h4 class="text-primary">Data Orang Tua</h4>
                    <table class="table table-bordered">
                        <tr>
                            <th>Nama Orang Tua</th>
                            <td>{{ $pasiens['nama_ortu'] }}</td>
                        </tr>
                        <tr>
                            <th>Jenis Kelamin Orang Tua</th>
                            <td>{{ $pasiens['jenis_kelamin_ortu'] }}</td>
                        </tr>
                        <tr>
                            <th>Pekerjaan</th>
                            <td>{{ $pasiens['pekerjaan'] }}</td>
                        </tr>
                        <tr>
                            <th>Alamat Orang Tua</th>
                            <td>{{ $pasiens['alamat_ortu'] }}</td>
                        </tr>
                        <tr>
                            <th>No. NIK</th>
                            <td>{{ $pasiens['no_nik'] }}</td>
                        </tr>
                        <tr>
                            <th>No. HP</th>
                            <td>{{ $pasiens['no_hp'] }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @endif
    {{-- Hasil Presentase --}}
    <div class="card">
        <div class="card-body">
            <h3 class="text-info">Presentase kemungkinan penyakit :</h3>
            <!-- Tampilan Tabel Hasil Diagnosis -->
            <table class="table table-bordered">
                <thead>
                    <tr>
                       
                        <th>Penyakit</th>
                        <th>Probabilitas (%)</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($result as $index => $hasil)
                        <tr>
                            
                            <td>{{ $hasil['penyakit'] }}</td>
                          
                            <td>{{ number_format($hasil['probabilitas'], 2) }} %</td> <!-- Format ke 2 desimal -->
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <br>
    <!-- Gejala yang Dipilih -->
    @if (!empty($selectedGejalasNames))
    <div class="card mb-4">
        <div class="card-body">
            <h3 class="text-info">Gejala yang Dipilih :</h3>
            <ul class="list-group">
                @foreach ($selectedGejalasNames as $gejala)
                    <li class="list-group-item">{{ $gejala->nama_gejala }}</li>
                @endforeach
            </ul>
        </div>
    </div>
    @else
    <div class="alert alert-warning">
        <div class="alert alert-info text-center">
            <h4 class="alert-heading">Hore! Balita Anda Sehat!</h4>
            <p>Tidak ada diagnosis yang cocok berdasarkan gejala yang dipilih. Tetap jaga kesehatan ya!</p>
        </div>
    </div>
    @endif

    <!-- Hasil Diagnosis -->
    @if (!empty($topResult))
    <div class="card mb-4">
        <div class="card-body">
            <h4 class="text-info">Penyakit yang Terdeteksi :</h4>
            @php
                // Definisikan kategori penyakit
                $ispaRingan = [
                    'Demam',
                    'Mata Merah , Sakit Tenggorokan , Hidung Tersumbat',
                    'Batuk , Pilek , Suara Serak',
                    'Pilek , Suara Serak , Hidung Tersumbat',
                    'Batuk , Suara Serak , Hidung Tersumbat',
                    'Pilek , Mata Merah , Hidung Tersumbat',
                    'Demam , Pilek , Hidung Tersumbat',
                    'Demam , Batuk , Mata Merah',
                    'Demam , Batuk , Muntah',
                    'Batuk , Sakit Tenggorokan , Hidung Tersumbat'
                ];

                $ispaSedang = [
                    'Demam , Batuk , Suara Bengek',
                    'Sesak Nafas , Muntah , Suara Bengek',
                    'Demam , Batuk , Suara Serak',
                    'Batuk , Sesak Nafas , Suara Serak',
                    'Demam , Sakit Tenggorokan , Suara Serak',
                    'Demam , Sakit Tenggorokan , Muntah',
                    'Batuk , Suara Serak , Hidung Tersumbat',
                ];

                $ispaBerat = [
                    'Demam , Batuk , Suara Serak',
                    'Demam , Sesak Nafas , Muntah',
                    'Demam , Mata Merah , Suara Serak , Muntah',
                    'Demam , Sesak Nafas , Muntah , Suara Bengek , Hidung Tersumbat',
                    'Batuk , Sesak Nafas , Suara Bengek',
                    'Demam , Sesak Nafas , Suara Bengek',
                    'Suara Serak , Muntah , Suara Bengek'
                ];
            @endphp

            <table class="table table-bordered table-striped mt-4">
                <thead>
                    <tr>
                        <th>Penyakit</th>
                        <th>Probabilitas</th>
                        <th>Diagnosis</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        @if (!isset($topResult) || empty($topResult))
                            <td>-</td>
                            <td>0%</td>
                            <td>-</td>
                        @else
                            <td>
                                @if ($topResult['probabilitas'] == 0)
                                    -
                                @else
                                    {{ $topResult['penyakit'] }}
                                @endif
                            </td>
                            <td>{{ number_format($topResult['probabilitas'], 2) }}%</td>
                            <td>
                                @if ($topResult['probabilitas'] == 0)
                                    -
                                @else
                                    @if (in_array(trim($topResult['penyakit']), $ispaRingan))
                                        ISPA RINGAN
                                    @elseif (in_array(trim($topResult['penyakit']), $ispaSedang))
                                        ISPA SEDANG
                                    @elseif (in_array(trim($topResult['penyakit']), $ispaBerat))
                                        ISPA BERAT
                                    @else
                                        Tidak Terdeteksi
                                    @endif
                                @endif
                            </td>
                            
                        @endif
                    </tr>
                </tbody>
            </table>

            
            
            <div class="mt-4">
                <h5>Solusi</h5>
                <p style="text-align: justify;">{{ $topResult['solusi'] }}</p>

            </div>
        </div>
    </div>
@else
    <div class="alert alert-info text-center">
        <h4 class="alert-heading">Hore! Balita Anda Sehat!</h4>
        <p>Tidak ada diagnosis yang cocok berdasarkan gejala yang dipilih. Tetap jaga kesehatan ya!</p>
    </div>
@endif


    <!-- Menu Riwayat Kesehatan -->
    <div class="row">
        <div class="col-lg-6">
          <!-- Riwayat Kesehatan -->
            <div class="card mb-4">
                <div class="card-body">
                    <h4 class="text-info">Riwayat Kesehatan</h4>
                    <ul class="list-group">
                        @if (in_array('Apakah anak Anda memiliki riwayat alergi, seperti alergi debu atau makanan tertentu?', array_column($selectedGejalasNames, 'nama_gejala')))
                        <li class="list-group-item">Alergi</li>
                        @endif
                        @if (in_array('Apakah anak Anda sering terpapar asap rokok di rumah atau lingkungan sekitar?', array_column($selectedGejalasNames, 'nama_gejala')))
                        <li class="list-group-item">Paparan asap rokok</li>
                        @endif
                        @if (in_array('Bagaimana kondisi lingkungan tempat tinggal Anda? Apakah terdapat banyak polusi udara?', array_column($selectedGejalasNames, 'nama_gejala')))
                        <li class="list-group-item">Kondisi lingkungan</li>
                        @endif
                        @if (in_array('Apakah anak Anda pernah menjalani rawat inap sebelumnya karena gangguan pernapasan?', array_column($selectedGejalasNames, 'nama_gejala')))
                        <li class="list-group-item">Riwayat Rawat Inap</li>
                        @endif
                        @if (in_array('Apakah anak Anda sudah mendapatkan imunisasi lengkap, terutama untuk campak dan influenza?', array_column($selectedGejalasNames, 'nama_gejala')))
                        <li class="list-group-item">Status imunisasi</li>
                        @endif
                    </ul>
                </div>
            </div>

            
        </div>

        <div class="col-lg-6">
            <!-- Menu Nutrisi -->
            <div class="card mb-4">
               <!-- Nutrisi -->
                <div class="card-body">
                    <h4 class="text-info">Nutrisi</h4>
                    <ul class="list-group">
                        @if (in_array('Bagaimana status gizi anak Anda? Apakah berat badannya sesuai dengan usia?', array_column($selectedGejalasNames, 'nama_gejala')))
                            <li class="list-group-item">Status gizi</li>
                        @endif
                        @if (in_array('Apakah anak Anda sering mengonsumsi makanan kaya vitamin A, seperti wortel, bayam, atau ubi?', array_column($selectedGejalasNames, 'nama_gejala')))
                            <li class="list-group-item">Konsumsi vitamin A</li>
                        @endif
                        @if (in_array('Apakah anak Anda sering makan buah-buahan yang mengandung vitamin C, seperti jeruk, mangga, atau kiwi?', array_column($selectedGejalasNames, 'nama_gejala')))
                            <li class="list-group-item">Konsumsi vitamin C</li>
                        @endif
                        @if (in_array('Apakah anak Anda mengonsumsi cukup sayur dan buah setiap hari?', array_column($selectedGejalasNames, 'nama_gejala')))
                            <li class="list-group-item">Asupan serat</li>
                        @endif
                        @if (in_array('Apakah anak Anda mengonsumsi makanan tinggi protein, seperti telur, ikan, ayam, atau tahu?', array_column($selectedGejalasNames, 'nama_gejala')))
                            <li class="list-group-item">Asupan protein</li>
                        @endif
                    </ul>
                </div>

            </div>
        </div>
    </div>
   

    <div class="text-center mt-4">
        <a href="javascript:void(0);" class="btn btn-secondary" onclick="goBack()">Kembali ke Form</a>

    </div>
</div>
<script>
    function goBack() {
        window.history.back();
    }
</script>

<br><br><br><br>
@endsection
