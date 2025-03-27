<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pembayaran</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-4">
        <h2>Tambah Pembayaran</h2>
        <a href="{{ route('pembayaran.index') }}" class="btn btn-secondary mb-3">Kembali</a>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('pembayaran.store') }}" method="POST">
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
                <label for="tujuan_tf" class="form-label">Tujuan Transfer</label>
                <input type="text" name="tujuan_tf" id="tujuan_tf" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="tanggal_tf" class="form-label">Tanggal Transfer</label>
                <input type="date" name="tanggal_tf" id="tanggal_tf" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="jumlah_pembayaran" class="form-label">Jumlah Pembayaran</label>
                <input type="number" name="jumlah_pembayaran" id="jumlah_pembayaran" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</body>

</html>
