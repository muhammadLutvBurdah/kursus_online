<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Materi</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h2>Daftar Materi</h2>
        <a href="{{ route('materi.create') }}" class="btn btn-primary mb-3">Tambah Materi</a>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Materi</th>
                    <th>Kursus</th>
                    <th>Deskripsi</th>
                    <th>Durasi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($materi as $key => $m)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $m->nama }}</td>
                    <td>{{ $m->kursus->nama ?? '-' }}</td>
                    <td>{{ $m->deskripsi }}</td>
                    <td>{{ $m->durasi }}</td>
                    <td>
                    <a href="{{ route('materi.edit', $m->materiid) }}" class="btn btn-warning btn-sm">Edit</a>

                        <form action="{{ route('materi.destroy', $m->materiid) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Hapus materi ini?')">Hapus</button>
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
