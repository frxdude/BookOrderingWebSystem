<!-- <html>
    <head>
        <title>Product Details Page Design</title>
        <link href="style.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" >
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    </head>
    <body style="background:#F3EDE5;"> -->
@extends('layouts.master')
@section('content')
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <img src="https://freesvg.org/img/abstract-user-flat-4.png" alt="Avatar" width="300px" class="avatar">
                    <h2>{{$customer->username}}</h2>
                    <button type="button" onclick="location.href = 'logout';" class="btn btn-danger">Log out</button>    
                </div>
                <div class="col-md-7">
                    <h1>Регистрийн дугаар : </h1>&#9<h3>{{$customer->registerNumber}}</h3>
                    <h1>Утасны дугаар : </h1>&#9<h3>{{$customer->phoneNumber}}</h3>
                    <h1>Гэрийн хаяг : </h1>&#9<h3>{{$customer->address}}</h3>
                    <h1>Цахим шуудан : </h1>&#9<h3>{{$customer->email}}</h3>
                    <h1>Дансны үлдэгдэл : </h1>&#9<h3>{{$customer->balance}}</h3></br>
                    <h1>Торгууль :  </h1>&#9<h3>{{$customer->fine}}</h3>
                </div>
            </div>
        </div>
    </body>
<!-- </html> -->
@endsection
<style>
    .container{
        margin-top:100px;
    }
    .elec{
        background: yellow;
        width:100px;
        color:#000;
        font-size: 12px;
        font-weight: bold;
        margin-left: 10px;
    }
    .phys{
        background: green;
        width:100px;
        color:white;
        font-size: 12px;
        font-weight: bold;
        margin-left: 10px;
    }
    .col-md-7 h2{
        color:#555;
    }
    .stars{
        height: 15px;
    }
    .price{
        color:#FE980F;
        font-size: 26px;
        font-weight: 26px;
        padding-top:20px;
        margin-top:-15px;
    }
    .cart{
        color: #FFFFF;
        font-size: 15px;
        
    }
    .mybutton{
        max-height: 40px;
    }
    .checked {
          color: orange;
    }   
    button{
        width: 150px;
       
    }
    #rent{
      margin-left:280px;
      background:#FE980F;
      text-color:white;
    }
    #purchase{
      margin-left:10px;
      background:green;
      text-color:white;
    }
    h1, h3 {
        display: inline-block;
    }
</style>