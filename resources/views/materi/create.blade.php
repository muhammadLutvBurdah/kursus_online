<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Materi</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-4">
        <h2>Tambah Materi</h2>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('materi.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="kursusid" class="form-label">Kursus</label>
                <select name="kursusid" id="kursusid" class="form-control" required>
                    <option value="">Pilih Kursus</option>
                    @foreach($kursus as $k)
                        <option value="{{ $k->kursusid }}">{{ $k->nama }}</option>
                    @endforeach
                </select>

            </div>

            <div class="mb-3">
                <label for="nama" class="form-label">Nama Materi</label>
                <input type="text" name="nama" id="nama" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" class="form-control" required></textarea>
            </div>

            <div class="mb-3">
                <label for="durasi" class="form-label">Durasi</label>
                <input type="text" name="durasi" id="durasi" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('materi.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>