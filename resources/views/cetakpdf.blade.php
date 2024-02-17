<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan transaksi pembayaran</title>

    <style type="text/css">
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: 0 auto;
        }
        h1 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .total-row td:first-child {
            text-align: right;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Laporan Transaksi Pembayaran</h1>
        <div class="card p-2">
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal Transaksi</th>
                        <th>Nama</th>
                        <th>No Telepon</th>
                        <th>Paket</th>
                        <th>Harga</th>
                        <th>Nominal</th>
                        <th>Kembalian</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $total = 0;
                    @endphp
                    @foreach ($transaksi as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->notelp }}</td>
                        <td>{{ $item->namapaket }}</td>
                        <td>{{ number_format($item->harga,0,',','.') }}</td>
                        <td>{{ number_format($item->nominal,0,',','.') }}</td>
                        <td>{{ number_format($item->kembalian,0,',','.') }}</td>
                    </tr>
                    @php
                        $total += $item->harga;
                    @endphp
                    @endforeach
                    <tr class="total-row">
                        <td colspan="5">Total pendapatan </td>
                        <td colspan="3">Rp : {{ number_format($total,0,',','.') }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
