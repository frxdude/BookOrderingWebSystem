<!-- B180910040 Sainjargal -->
@extends('layouts.navbar')
@section('content')
<div class="container-fluid mt-5">
</div>
<div id="multi-item-example" class="carousel slide carousel-multi-item" style="max-height: 200px; margin-left:200px; margin-right:200px" data-ride="carousel">
    <div class="controls-top  d-flex justify-content-center">
    <a class="previous round r chevron" href="#multi-item-example" data-slide="prev"><h3 style="margin-top: 7px">&#8249;</h3></a>
    <a class="next round l chevron" href="#multi-item-example" data-slide="next" ><h3 style="margin-top: 7px">&#8250;</h3></a>
    </div>

    <div class="carousel-inner" role="listbox">
        @for ($i = 0; $i < count($books); $i += 3)
        <div class="carousel-item @if($i == 0) active @endif">
            <div class="row">
                <div class="col-md-4">
                <div class="card mb-2">
                <img class="card-img-top" style="height:500px" src="{{$books[$i]->pic}}"
                    alt="Card image cap">
                <div class="card-body">
                    <h4 class="card-title">{{$books[$i]->name}}</h4>
                    <p class="card-text">{{substr($books[$i]->description, 0, 100)}}...</p>
                    <a class="btn btn-info" href="books/{{$books[$i]->id}}">Дэлгэрэнгүй</a>
                </div>
                </div>
            </div>

            <div class="col-md-4 clearfix d-none d-md-block">
                <div class="card mb-2">
                <img class="card-img-top" style="height:500px" src="{{$books[$i+1]->pic}}"
                    alt="Card image cap">
                <div class="card-body">
                    <h4 class="card-title">{{$books[$i+1]->name}}</h4>
                    <p class="card-text">{{substr($books[$i+1]->description, 0, 100)}}...</p>
                    <a class="btn btn-info" href="books/{{$books[$i+1]->id}}">Дэлгэрэнгүй</a>
                </div>
                </div>
            </div>

            <div class="col-md-4 clearfix d-none d-md-block">
                <div class="card mb-2">
                <img class="card-img-top" style="height:500px" src="{{$books[$i+2]->pic}}"
                    alt="Card image cap">
                <div class="card-body">
                    <h4 class="card-title">{{$books[$i+2]->name}}</h4>
                    <p class="card-text">{{substr($books[$i+2]->description, 0, 100)}}...</p>
                    <a class="btn btn-info" href="books/{{$books[$i+2]->id}}">Дэлгэрэнгүй</a>
                </div>
                </div>
            </div>
            </div>
        </div>
        @endfor
    </div>
</div>
@endsection
<style>
a {
  text-decoration: none;
  display: inline-block;
  padding: 3px 12px;
}

a:hover {
  background-color: #ddd;
  color: black;
}

.previous {
  background-color: #343a40;
  color: white;
}

.next {
  background-color: #343a40;
  color: white;
}

.round {
  border-radius: 50%;
}
.r {
    margin-right:20px;
}
.l {
    margin-left:20px;
}
.chevron {
    width: 50px;
    height: 50px;
    display: flex;
    justify-content: center;
    align-items: center;
    margin-bottom: 20px;
}
</style>