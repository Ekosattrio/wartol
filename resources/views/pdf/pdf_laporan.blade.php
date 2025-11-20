<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Penjualan</title>

    <style>
        body {
            font-family: sans-serif;
            font-size: 12px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        table th, table td {
            border: 1px solid #000;
            padding: 6px 8px;
            text-align: left;
        }

        table th {
            background: #eee;
        }
    </style>
</head>

<body>

    <h2>Laporan Penjualan</h2>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Transaksi</th>
                <th>No Hp</th>
                <th>Total Harga</th>
                <th>Metode</th>
                <th>Status</th>
                <th>Tanggal</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->transaction_code }}</td>
                    <td>{{ $item->phone_number }}</td>
                    <td>{{ number_format($item->total_price) }}</td>
                    <td>{{ $item->payment_method }}</td>
                    <td>{{ $item->payment_status }}</td>
                    <td>{{ $item->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
