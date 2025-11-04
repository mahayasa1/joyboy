<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Laporan Stok Barang</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #000; padding: 6px; text-align: center; }
        th { background-color: #f2f2f2; }
        h3 { text-align: center; margin-bottom: 10px; }
    </style>
</head>
<body>
    <h3>Laporan Stok Barang</h3>
    <table>
        <thead>
            <tr>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Satuan</th>
                <th>Stok</th>
            </tr>
        </thead>
        <tbody>
            @foreach($laporan as $data)
            <tr>
                <td>{{ $data->kode_barang }}</td>
                <td>{{ $data->nama_barang }}</td>
                <td>{{ $data->satuan->nama_satuan ?? '-' }}</td>
                <td>{{ $data->stok }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
