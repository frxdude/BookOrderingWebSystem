<!-- B180910040 Sainjargal -->
<style>
    h5{
        position: absolute;
        right: 50px;
        top: 50px;
    }
</style>
@extends('layouts.master')
@section('content')
<div class="container w-25 mt-5 ">
    <h1 class="d-flex justify-content-center">Нэвтрэх</h1>
    <form action="" method="POST">
        <div class="mb-2 mt-5">
            <label class="form-label text-muted">Нэвтрэх нэр</label>
            <input type="text" name="username" class="form-control" required value="@if (Cookie::get('rememberme') != '') {{Cookie::get('rememberme')}} @endif">
        </div>
        <div class="mb-3 form-check text-muted">
            <input type="checkbox" class="form-check-input" name="rememberme" @if (Cookie::get('rememberme') != '') checked="checked" @endif>
            <label class="form-check-label">Намайг сана</label>
        </div>
        {{csrf_field()}}
        <button type="submit" class="btn w-100" style="background-color:#611f69; color:#F3EDE5">Нэвтрэх</button>
        @if($errors->first('username'))
            <h4 style="color: red" class="mt-2">Хэрэглэгч олдсонгүй</h4>
        @endif
    </form>
</div>
<h5><a href="/register" style="text-decoration:none;">Бүртгүүлэх</a></h5>
@endsection