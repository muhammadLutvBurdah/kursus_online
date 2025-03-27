<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Kursus</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-4">
        <h2>Daftar Kursus</h2>
        <a href="{{ route('kursus.create') }}" class="btn btn-primary mb-3">Tambah Kursus</a>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Deskripsi</th>
                    <th>Harga</th>
                    <th>Poto</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($kursus as $key => $k)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $k->nama }}</td>
                        <td>{{ $k->deskripsi ?? '-' }}</td>
                        <td>Rp{{ number_format($k->harga, 2) }}</td>
                        <td>
                            @if($k->poto)
                                <img src="{{ asset($k->poto) }}" alt="Foto Kursus" width="100">
                            @else
                                Tidak ada gambar
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('kursus.edit', $k->kursusid) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('kursus.destroy', $k->kursusid) }}" method="POST"
                                style="display:inline;">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Hapus kursus ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>