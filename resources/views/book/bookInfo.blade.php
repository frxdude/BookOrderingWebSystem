<!-- <html>
    <head>
        <title>Product Details Page Design</title>
        <link href="style.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" >
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    </head>
    <body style="background:#F3EDE5;"> -->
    
@extends('layouts.navbar')
@section('content')
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                  <img src="{{$book->pic}}" class="d-block w-100" alt="...">
                </div>
                <div class="col-md-7">
                        <div class="row">
                            @if($book->pBook == true)
                            <p class="phys text-center">Хэвлэмэл</p>
                            @endif
                            @if($book->eBook == true)
                            <p class="elec text-center ms-5">Электрон</p>
                            @endif
                        </div>
                        <h2>{{$book->name}}</h2>
                        <p>{{$book->description}}</p>
                        <p class="price">{{$book->price}} ₮</p>
                        <p><b>Дэлгүүрт байгаа тоо ширхэг: </b>@if($book->total > 0) {{$book->total}} @else Одоогоор дууссан байна. @endif</p>
                        <p><b>Нөхцөл: </b>Их уншилттай</p>
                        <p><b>Зохиогч: </b>{{$author->firstName}} {{$author->lastName}}</p>
                        <div class="row">
                        <label >Тоо ширхэг:</label>
                        <form action="/books/order" method="POST">
                            <input type="hidden" value="{{$book->price}}" name="price"/>
                            <input type="hidden" value="{{$book->id}}" name="id"/>
                            {{csrf_field()}}
                            <select class="form-control" id="quantity" name="total" style="width: 50px;margin-left:100px;margin-top:-25px" >
                            @for ($i = 1; $i <= $book->total; $i += 1)
                                <option>{{$i}}</option>
                            @endfor
                            </select>
                            @if($book->pBook == true) 
                                <input type="submit" class="btn btn-success cart mybutton" name="action" value="Түрээслэх" id="rent" @if($book->total <= 0) disabled @endif/>
                                <input type="submit" class="btn btn-success cart mybutton" name="action" value="Худалдаж авах" id="purchase" @if($book->total <= 0) disabled @endif/>
                            @endif
                            @if($book->eBook == true) 
                                <input type="submit" class="btn btn-success cart mybutton" name="action" value="Татах" id="download"/>
                            @endif
                            @if(session('success'))
                                <h1>{{session('success')}}</h1>
                            @endif
                        </form>
                    </div>
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
</style>