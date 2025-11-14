<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Daftar Buku</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
<div class="container">

    <div class="navbar-top">
        <div>
            <h1 class="page-title">Daftar Buku</h1>
            <p class="page-subtitle">Manajemen data buku perpustakaan sederhana (CRUD + Pencarian)</p>
        </div>

        <div class="navbar-links">
            {{-- Kalau nanti punya halaman lain bisa ditambah di sini --}}
            <a href="{{ route('buku.index') }}">Data Buku</a>
            {{-- <a href="{{ route('anggota.index') }}">Data Anggota</a> --}}
        </div>
    </div>

    <a href="{{ route('buku.create') }}" class="btn btn-primary">+ Tambah Buku</a>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- FORM PENCARIAN --}}
    <form action="{{ route('buku.index') }}" method="GET" class="search-bar">
        <input type="text" name="q" placeholder="Cari judul / pengarang..."
               value="{{ old('q', $search ?? '') }}">
        <button type="submit" class="btn btn-secondary">Cari</button>

        @if (!empty($search))
            <span style="font-size: 13px;">
                Hasil untuk: <strong>{{ $search }}</strong>
                &nbsp;|&nbsp;
                <a href="{{ route('buku.index') }}">Reset</a>
            </span>
        @endif
    </form>

    <div class="table-wrapper">
        <table>
            <thead>
            <tr>
                <th class="text-center">No</th>
                <th>Judul</th>
                <th>Pengarang</th>
                <th>Penerbit</th>
                <th>Tahun</th>
                <th class="text-center">Stok</th>
                <th class="text-center">Aksi</th>
            </tr>
            </thead>
            <tbody>
            @forelse ($buku as $index => $b)
                <tr>
                    <td class="text-center">{{ $index + 1 }}</td>
                    <td>{{ $b->judul }}</td>
                    <td>{{ $b->pengarang }}</td>
                    <td>{{ $b->penerbit }}</td>
                    <td>{{ $b->tahun_terbit }}</td>
                    <td class="text-center">{{ $b->jumlah_stok }}</td>
                    <td class="text-center">
                        <a href="{{ route('buku.edit', $b->id) }}" class="btn btn-sm btn-secondary">Edit</a>

                        <form action="{{ route('buku.destroy', $b->id) }}"
                              method="POST"
                              class="inline"
                              onsubmit="return confirm('Yakin mau hapus buku ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">
                        @if (!empty($search))
                            Tidak ada buku yang cocok dengan kata kunci:
                            <strong>{{ $search }}</strong>.
                        @else
                            Belum ada data buku.
                        @endif
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>

    <p class="table-info">
        Total judul buku: {{ $buku->count() }}
        {{-- Kalau mau, bisa tambahkan total stok dll di sini --}}
    </p>

</div>
</body>
</html>
