<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Edit Buku</title>
</head>
<body>
    <h1>Edit Buku</h1>

    @if ($errors->any())
        <div style="color:red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('buku.update', $buku->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Judul</label><br>
        <input type="text" name="judul" value="{{ old('judul', $buku->judul) }}"><br><br>

        <label>Pengarang</label><br>
        <input type="text" name="pengarang" value="{{ old('pengarang', $buku->pengarang) }}"><br><br>

        <label>Penerbit</label><br>
        <input type="text" name="penerbit" value="{{ old('penerbit', $buku->penerbit) }}"><br><br>

        <label>Tahun Terbit</label><br>
        <input type="number" name="tahun_terbit" value="{{ old('tahun_terbit', $buku->tahun_terbit) }}"><br><br>

        <label>Jumlah Stok</label><br>
        <input type="number" name="jumlah_stok" value="{{ old('jumlah_stok', $buku->jumlah_stok) }}"><br><br>

        <button type="submit">Simpan Perubahan</button>
    </form>

    <br>
    <a href="{{ route('buku.index') }}">Kembali ke daftar buku</a>
</body>
</html>
