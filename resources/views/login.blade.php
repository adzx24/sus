<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="fonticon/css/all.css">
</head>
<style>
    .card{
        width: 35%;
        margin: auto;
        margin-top: 15%;


    }
    body{
       background-image: url('img/pexels-christian-heitz-842711.jpg');
       background-size: cover;
    }
    h1{
        font-family: Arial, Helvetica, sans-serif;
        margin-top: 10%;

    }
</style>
<body>
    <div class="container mt-3">



        <center><h1><strong>Selamat datang  Adi Carwash</strong></h1></center>
        <div class="card p-4 mt-5">
            <center><h4> Carwash</h4></center>
            <form action="{{ route('postlogin') }}" method="POST" class="form-group">
                @csrf
            {{-- <label for="">Email</label>
            <input type="email" name="email" class="form-control"> --}}
            <label for="">Name</label>
            <input type="text" name="name" class="form-control" required placeholder="Masukkan name anda">
            <label for="">Password</label>
            <input type="password" name="password" class="form-control" required placeholder="Masukkan password anda">
            @if (Session::has('m'))
            <p style="color: red">
            {{ Session::get('m') }} <i class="fa-regular fa-face-tired"></i></p>
        @endif
            <button class="btn btn-primary mt-2 form-control">Login</button>
            </form>
        </div>
    </div>
</body>
</html>
