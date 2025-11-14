<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Tambah Buku</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
<div class="container">
    <h1 class="page-title">Tambah Buku</h1>
    <p class="page-subtitle">Isi data buku dengan lengkap kemudian simpan.</p>

    @if ($errors->any())
        <div class="alert alert-error">
            <ul>
                @foreach ($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('buku.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label>Judul</label>
            <input type="text" name="judul" value="{{ old('judul') }}">
        </div>

        <div class="form-group">
            <label>Pengarang</label>
            <input type="text" name="pengarang" value="{{ old('pengarang') }}">
        </div>

        <div class="form-group">
            <label>Penerbit</label>
            <input type="text" name="penerbit" value="{{ old('penerbit') }}">
        </div>

        <div class="form-group">
            <label>Tahun Terbit</label>
            <input type="number" name="tahun_terbit" value="{{ old('tahun_terbit') }}">
        </div>

        <div class="form-group">
            <label>Jumlah Stok</label>
            <input type="number" name="jumlah_stok" value="{{ old('jumlah_stok') }}">
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('buku.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
</body>
</html>
