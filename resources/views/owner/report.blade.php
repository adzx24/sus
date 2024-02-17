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
        @if (Session::has('m'))
        <p style="color: green">
        {{ Session::get('m') }}<i class="fa-regular fa-face-kiss-beam"></i></p>
    @endif
        <center><h2>Laporan Transaksi</h2></center>
        <div class="row">
            <div class="col-6">
            <div class="card p-2 mb-4" >
                <center><h5>Date</h5></center>
                <form action="{{ route('cari') }}" method="GET" class="form-group">
                    @csrf
                    <label for="">Tanggal awal</label>
                    <input type="date" name="startdate" class="form-control" placeholder="Masukkan tanggal">
                    <label for="">Tanggal akhir</label>
                    <input type="date" name="enddate" class="form-control" placeholder="Masukkan tanggal">
                    <button class="btn btn-warning mt-2" type="submit">Search <i class="fa-solid fa-magnifying-glass"></i> </button>
                    <a href="{{ route('reportowner') }}" class="btn btn-light">Refresh <i class="fa-solid fa-rotate-left"></i></a>
                </form>
            </div>
        </div>
        <div class="col-6">
            <div class="card p-2 mb-4">
                <center><h5>Date</h5></center>
                <form action="{{ route('pdfDate') }}" method="GET" class="form-group">
                    @csrf
                    <label for="">Tanggal awal</label>
                    <input type="date" name="startdate" class="form-control" placeholder="Masukkan tanggal">
                    <label for="">Tanggal akhir</label>
                    <input type="date" name="enddate" class="form-control" placeholder="Masukkan tanggal">
                    <button class="btn btn-danger mt-2" type="submit">Download <i class="fa-regular fa-file-pdf"></i></button>
                    <a href="{{ route('reportowner') }}" class="btn btn-light">Refresh <i class="fa-solid fa-rotate-left"></i></a>

                </form>
            </div>
        </div>
        </div>


        <a href="{{ route('log') }}" class="btn btn-dark mb-2">Log</a>
        <a href="{{ route('cetakpdfow') }}" class="btn btn-success mb-2">Print All <i class="fa-solid fa-print"></i></a>

        {{-- <a href="{{ route('clearAll') }}" class="btn btn-danger mb-2">Clear All</a> --}}
        <div class="card p-4">
            <table class="table table-bordered table-condensed" id="example">
                <thead>
                    <tr class="table-success">
                        <th>No</th>
                        <th>Kasir</th>
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
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $p->user->name }}</td>
                            <td>{{ $p->created_at }}</td>
                            <td>{{ $p->nama }}</td>
                            <td>{{ $p->notelp }}</td>
                            <td>{{ $p->namapaket }}</td>
                            <td>{{ number_format($p->harga,0,',','.') }}</td>
                            <td>{{ number_format($p->nominal,0,',','.') }}</td>
                            <td>{{ number_format($p->kembalian,0,',','.') }}</td>
                            <td>
                                <a href="{{ route('cetakpdfo',$p->id) }}" class="btn btn-success"><i class="fa-solid fa-print"></i></a>
                            </td>
                        </tr>
                    @php
                        $total += $p->harga;

                    @endphp
                    @endforeach
                </tbody>
                <p>
                    Total pendapatan :
                    {{ number_format($total,0,',','.') }}
                </p>
            </table>

        </div>
    </div>
    <script src="{{ asset('js/jquery-3.7.0.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/responsive.bootstrap5.min.js') }}"></script>
    <script>
        new DataTable('#example',{
            responsive : true
        });
    </script>
    @include('template')
</body>
</html>
