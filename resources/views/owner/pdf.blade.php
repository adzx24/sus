<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Transaksi</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .receipt {
            width: 300px;
            margin: auto;
            border: 1px solid #ccc;
            padding: 20px;
            font-size: 14px;
        }
        .receipt-header {
            text-align: center;
            margin-bottom: 20px;
        }
        .receipt-body p {
            margin: 5px 0;
        }
        .receipt-footer {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="receipt">
        <div class="receipt-header">
            <h4><strong>Adi carwash</strong></h4>
            JL.Sukaraja no.40  kec.Sukaraja kab.Sukabumi
        </div>
        @csrf
        <p>Tanggal : {{ $transaksi->created_at }}</p>
        <div class="receipt-body">
            <p><strong>Nama:</strong> {{ $transaksi->nama }}</p>
            <p><strong>No Telepon:</strong> {{ $transaksi->notelp }}</p>
            <p><strong>Paket:</strong> {{ $transaksi->namapaket }}</p>
            <p><strong>Harga:</strong> Rp {{ number_format($transaksi->harga,0,',','.') }}</p>
            <p><strong>Nominal:</strong> Rp {{ number_format($transaksi->nominal,0,',','.') }}</p>
            <p><strong>Kembalian:</strong> Rp {{ number_format($transaksi->kembalian,0,',','.') }}</p>
        </div>
        <div class="receipt-footer">
            <p>Terima kasih telah menggunakan jasa Adi carwash!</p>
        </div>
    </div>
</body>
</html>
