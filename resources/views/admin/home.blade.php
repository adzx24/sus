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

   <script src="{{ asset('js/dataTables.bootstrap5.min.js') }}"></script>
   <script src="{{ asset('js/dataTables.responsive.min.js') }}"></script>
   <script src="{{ asset('js/jquery-3.7.0.js') }}"></script>
   <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
   <script src="{{ asset('js/responsive.bootstrap5.min.js') }}"></script>
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
        <center><h2>Admin carwash</h2></center>
        @if (Session::has('m'))
                    <p style="color: green">
                    {{ Session::get('m') }} <i class="fa-regular fa-face-kiss-beam"></i></p>
                @endif
        <a href="{{ route('tambah') }}" class="btn btn-primary mb-2">Tambah <i class="fa-solid fa-plus"></i> </a>
        <a href="{{ route('user') }}" class="btn btn-success mb-2">Tambah Kasir <i class="fa-solid fa-user-plus"></i> </a>

        <div class="card p-3">
            <table class="table table-striped" id="example">
                <thead>
                    <tr class="table-success">
                        <th>No</th>
                        <th>Paket</th>
                        <th>Harga</th>
                        <th>Deskripsi</th>
                        <th>Act</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data  as $i)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $i->paket }}</td>
                        <td>{{ $i->harga }}</td>
                        <td>{{ $i->deskripsi }}</td>
                        <td>
                            <a href="{{ route('edit',$i->id) }}" class="btn btn-warning">Edit <i class="fa-solid fa-pen"></i></a>
                            <a href="{{ route('hapus',$i->id) }}" onclick="return confirm('Yakin hapus paket?')" class="btn btn-danger">Hapus <i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script>
        new DataTable('#example',{
            responsive : true
        });
    </script>
</body>
@include('template')
</html>
