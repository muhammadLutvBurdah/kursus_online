<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar pembayaran</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-4">
        <h2>Daftar pembayaran</h2>
        <a href="{{ route('pembayaran.create') }}" class="btn btn-primary mb-3">Tambah pembayaran</a>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Kursus</th>
                    <th>Tujuan Transfer</th>
                    <th>Tanggal Transfer</th>
                    <th>Jumlah Pembayaran</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pembayaran as $key => $m)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $m->kursus->nama ?? 'Tidak Ada Data' }}</td>
                        <td>{{ $m->tujuan_tf }}</td>
                        <td>{{ $m->tanggal_tf }}</td>
                        <td>Rp {{ number_format($m->jumlah_pembayaran, 0, ',', '.') }}</td>
                        <td>
                            <a href="{{ route('pembayaran.edit', $m->pembayaranid) }}"
                                class="btn btn-warning btn-sm">Edit</a>

                            <form action="{{ route('pembayaran.destroy', $m->pembayaranid) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Hapus pembayaran ini?')">Hapus</button>
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