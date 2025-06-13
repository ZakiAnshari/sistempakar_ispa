<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Data Diagnosa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @media print {
            body {
                font-family: Arial, sans-serif;
                margin: 0;
                padding: 0;
            }

            .container {
                max-width: 100%;
            }

            .table {
                width: 100%;
                border-collapse: collapse;
            }

            .table th, .table td {
                padding: 8px 12px;
                text-align: center;
            }

            .table th {
                background-color: #f8f9fa;
            }

            .table td {
                background-color: #ffffff;
            }

            .btn {
                display: none; /* Hide print button during printing */
            }

            h2 {
                text-align: center;
                margin-bottom: 20px;
                font-size: 24px;
                font-weight: bold;
            }
        }

        /* For the web view */
        .table th, .table td {
            text-align: left;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2>Data Diagnosa</h2>

        <!-- Tabel Data Pasien -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th style="width: 50px; text-align: center;">No</th>
                    <th>Nama Pasien</th>
                    <th>Umur</th>
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
                        <td style="text-align: center;">{{ $loop->iteration }}</td>
        
                        <!-- Nama Pasien -->
                        <td>{{ $item->nama_pasien }}</td>
                        <td>{{ $item->usia_pasien }} Th</td>
                        <!-- Jenis Kelamin -->
                        <td>{{ $item->jenis_kelamin_pasien }}</td>
        
                        <!-- Alamat -->
                        <td>{{ $item->alamat_pasien }}</td>
        
                        <!-- Tanggal Diagnosa -->
                        <td>{{ \Carbon\Carbon::parse($item->tgl)->translatedFormat('d F Y') }}</td>
        
                        <!-- Penyakit -->
                        <td style="text-align: center;">
                            {{ $item->penyakit_terdeteksi ?? 'Tidak terdeteksi' }}
                        </td>
                        <td>{{ $item->definisi ?? 'Tidak ada '}}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">Data Kosong</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Automatically trigger print when the page loads
        window.onload = function() {
            window.print();
        };
    </script>
</body>
</html>
