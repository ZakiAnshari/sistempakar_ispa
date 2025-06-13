<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Data Pasien</title>
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
        <h2>Data Pasien</h2>

        <!-- Tabel Data Pasien -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th style="width: 50px;">No</th>
                    <th>Nama Pasien</th>
                    <th>Alamat</th>
                    <th>Usia Pasien</th>
                    <th>Nama Ortu</th>
                    <th>Jenis Kelamin</th>

                    <th>Tanggal</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pasiens as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $item->nama_pasien }}</td>
                        <td>{{ $item->alamat_pasien }}</td>
                        <td>{{ $item->usia_pasien}} Tahun</td>
                        <td>{{ $item->nama_ortu}}</td>
                        <td>{{ $item->jenis_kelamin_pasien}}</td>
                       
                        <td>{{ \Carbon\Carbon::parse($item->tgl)->translatedFormat('d F Y') }}</td>
                    </tr>
                @endforeach
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
