<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Data Panen</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input[type="text"], input[type="number"], input[type="date"] {
            width: 100%; padding: 8px; border: 1px solid #ccc;
            border-radius: 4px; box-sizing: border-box;
        }
        button { background: #007bff; color: white; padding: 10px 20px;
                 border: none; border-radius: 4px; cursor: pointer; }
        button:hover { background: #0056b3; }
        .error { color: red; font-size: 13px; margin-top: 4px; }
        .alert-success { background: #d4edda; color: #155724;
                         padding: 10px; border-radius: 4px; margin-bottom: 15px; }
    </style>
</head>
<body>

    <h2>Tambah Data Hasil Panen</h2>
    <a href="/data-panen">← Kembali ke Daftar</a>
    <hr>

    {{-- Tampilkan error validasi --}}
    @if ($errors->any())
        <div style="background:#f8d7da; color:#721c24; padding:10px;
                    border-radius:4px; margin-bottom:15px;">
            <strong>Data tidak valid!</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="/data-panen/store">
        @csrf

        <div class="form-group">
            <label>Nama Komoditas *</label>
            <input type="text" name="nama_komoditas"
                   value="{{ old('nama_komoditas') }}"
                   placeholder="Contoh: Padi, Jagung, Kedelai">
            @error('nama_komoditas')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label>Jumlah (Kg) *</label>
            <input type="number" name="jumlah_kg"
                   value="{{ old('jumlah_kg') }}"
                   placeholder="Contoh: 500">
            @error('jumlah_kg')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label>Tanggal Panen</label>
            <input type="date" name="tanggal_panen"
                   value="{{ old('tanggal_panen') }}">
        </div>

        <button type="submit">💾 Simpan Data</button>
    </form>

</body>
</html>