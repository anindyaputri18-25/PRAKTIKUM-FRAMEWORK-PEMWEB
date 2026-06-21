<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Hasil Panen</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; }
        .btn { background: #28a745; color: white; padding: 8px 16px;
               text-decoration: none; border-radius: 4px; }
        .alert-success { background: #d4edda; color: #155724;
                         padding: 10px; border-radius: 4px; margin: 15px 0; }
    </style>
</head>
<body>

    <h2>Daftar Hasil Panen Pertanian</h2>
    <a href="/data-panen/create" class="btn">+ Tambah Data</a>
    <hr>

    {{-- Notifikasi sukses setelah simpan --}}
    @if(session('success'))
        <div class="alert-success">{{ session('success') }}</div>
    @endif

    <table border="1" cellpadding="10" cellspacing="0" width="100%">
        <thead style="background-color: #f2f2f2;">
            <tr>
                <th>No</th>
                <th>Nama Komoditas</th>
                <th>Jumlah (Kg)</th>
                <th>Tanggal Panen</th>
            </tr>
        </thead>
        <tbody>
            @foreach($dataPanen as $index => $item)
            <tr>
                <td align="center">{{ $index + 1 }}</td>
                <td>{{ $item->nama_komoditas }}</td>
                <td align="center">{{ $item->jumlah_kg }}</td>
                <td align="center">{{ $item->tanggal_panen }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>