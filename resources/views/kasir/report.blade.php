<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="fonticon/css/all.css">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.bootstrap5.min.css') }}">


</head>
<style>
    body{
        background-color:lemonchiffon;

    }
    .card{
        background-color:beige
    }
</style>
<body>
    @include('nav')
    <div class="container mt-3">
        <center><h2>Laporan Transaksi</h2></center>
        @if (Session::has('m'))
        <p style="color: green">
        {{ Session::get('m') }} <i class="fa-regular fa-face-kiss-beam"></i></p>
    @endif
        <div class="card p-4">
            <table class="table table-bordered" id="example">
                <thead>
                    <tr class="table-success">
                        <th>No</th>
                        <th>Tanggal Transaksi</th>
                        <th>Nama</th>
                        <th>No telepon</th>
                        <th>Paket</th>
                        <th>Harga</th>
                        <th>Nominal</th>
                        <th>Kembalian</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $total = 0;
                    @endphp
                    @foreach ($data as $p)
                        <tr class="table-secondary">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $p->created_at }}</td>
                            <td>{{ $p->nama }}</td>
                            <td>{{ $p->notelp }}</td>
                            <td>{{ $p->namapaket }}</td>
                            <td>{{ number_format($p->harga,0,',','.') }}</td>
                            <td>{{ number_format($p->harga,0,',','.') }}</td>
                            <td>{{ number_format($p->harga,0,',','.') }}</td>
                            <td>
                                <a href="{{ route('cetakpdf',$p->id) }}" class="btn btn-success"><i class="fa-solid fa-print"></i></a>
                            </td>
                        </tr>
                        @php
                            $total += $p->harga;
                        @endphp
                    @endforeach
                    <p>Totoal pendapatan : {{ number_format($total,0,',','.') }}</p>
                </tbody>
            </table>
        </div>
    </div>
    <script src="{{ asset('js/jquery-3.7.0.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/responsive.bootstrap5.min.js') }}"></script>
</body>
@include('template')
<script>
    $('#example').DataTable({
                responsive: true
            });
</script>
</html>
