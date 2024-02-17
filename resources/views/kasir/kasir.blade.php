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
    body{
        background-color:lemonchiffon;
    }
</style>
<body>
    @include('nav')
    @section('name')

    @endsection
    <div class="container mt-3">
        @if (Session::has('m'))
        <p style="color: green">
        {{ Session::get('m') }} <i class="fa-regular fa-thumbs-up"></i></p>
    @endif
        <div class="row">
            <p><h2>Adi carwash</h2></p>
            @foreach ($data  as $o)

            <div class="col-4" id="content">
                <div class="card mt-4 ">
                    <div class="card-body">
                        <h4>{{ $o->paket }}</h4>
                    <p class="card-title">Harga : {{number_format($o->harga,0,',','.') }}</p>
                    <p class="card-text">{{ $o->deskripsi }}</p>
                    <a href="{{ route('paket',$o->id) }}" class="btn btn-info" id="load-view-btn">Pilih paket</a>
                </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</body>
@extends('template')
{{-- <script src="{{asset('js/jquery-3.7.0.js') }}"></script>
<script>
    $(transaksi).ready(function{
        $('#load-view-btn').click(function{
            $.ajax({
                url: "{{ route('report') }}",
                type: 'get',
                success: function(response){
                    $('#content').html(response);
                },
                erorr : function(xhr){
                    console.log(xhr.responseText);
                }
            });
        });
    });
</script> --}}
</html>
