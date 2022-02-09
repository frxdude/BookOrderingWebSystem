<!-- B180910040 Sainjargal -->
<style>
    #form-error {
        border: 2px solid #e74c3c;
    }
    .try {
        background-color: aqua;
    }
    h5{
        position: absolute;
        right: 50px;
        top: 50px;
    }
</style>
@extends('layouts.master')
@section('content')
<div class="container w-25 mt-5">
    <h1 class="d-flex justify-content-center">Ном бүртгэх</h1>
    <form action="" method="POST" name="regForm" onsubmit="return validateForm()">
        <div class="mb-2 mt-5">
            <label  class="form-label text-muted ">Номны нэр</label>
            <input type="text" class="form-control" name="name"  maxlength="50">
        </div>
        <div class="mb-2">
            <label  class="form-label text-muted " id="authorLabel">Зохиогч</label>
            <div class="d-flex justify-content-center row">
                <select class="form-control" id="authorId" style="display: none" name="authorId">
                    @foreach($authors as $author)
                        <option value="{{$author->id}}">{{$author->firstName . ' ' . $author->lastName}}</option>
                    @endforeach
                </select>
                <button type="button" onclick="addAuthorFunc()" id="addAuthor" style="margin-right:15px" class="btn">Шинээр нэмэх</button>
                <button type="button" onclick="chooseAuthorFunc()" id="chooseAuthor" style="margin-left:15px" class="btn">Зохиогч сонгох</button>
            </div>
            <div id="lastNameInp" style="display: none">
                <label class="form-label text-muted">Зохиогчийн Овог</label>
                <input type="text" class="form-control" name="lastName">
            </div>
            <div id="firstNameInp" style="display: none">
                <label class="form-label text-muted">Зохиогчийн Нэр</label>
                <input type="text" class="form-control" name="firstName">
            </div>
        </div>
        <div class="mb-2">
        <label class="form-label text-muted" >Зураг</label>
            <input type="file" id="myFile" name="pic" class="form-control">
        </div>
        <div class="mb-2">
            <label class="form-label text-muted" >Дэлгэрэнгүй</label>
            <input type="text" class="form-control" name="description">
        </div>
        <div class="mb-2">
            <label class="form-label text-muted">Үнэ</label>
            <input type="text" class="form-control" name="price">
        </div>
        <div class="mb-3">
            <label class="form-label text-muted">Ширхэг</label>
            <input type="text" class="form-control" name="total">
        </div>
        <div class="mb-3 d-flex row">
            <label class="form-label text-muted">Электрон</label>
            <input type="checkbox" class="form-control" name="eBook">
            <label class="form-label text-muted">Хэвлэмэл</label>
            <input type="checkbox" class="form-control" name="pBook">
        </div>
        @if($errors->any())
            @foreach($errors->all() as $error)
            <h4 style="color: red">{{$error}}</h4>
            @endforeach
        @endif
        {{csrf_field()}}
        <button type="submit" class="btn btn-primary w-100" style="background-color:#611f69; color:#F3EDE5">Нэмэх</button>
    </form>
    @if(session('success'))
        <h1 style="color: green" class="mt-2">{{session('success')}}</h1>
    @endif
</div>
@endsection
<script>
    function addAuthorFunc() {
        var author = document.getElementById("authorLabel");
        var addAuthor = document.getElementById("addAuthor");
        var chooseAuthor = document.getElementById("chooseAuthor");
        var lastNameInp = document.getElementById("lastNameInp");
        var firstNameInp = document.getElementById("firstNameInp");
        chooseAuthor.style.display = "none";
        addAuthor.style.display = "none";
        lastNameInp.style.display = "block";
        firstNameInp.style.display = "block";
        author.style.display = "none";
    }

    function chooseAuthorFunc() {
        var addAuthor = document.getElementById("addAuthor");
        var chooseAuthor = document.getElementById("chooseAuthor");
        var authors = document.getElementById("authorId");
        authors.style.display = "block";
        chooseAuthor.style.display = "none";
        addAuthor.style.display = "none";
    }

    function validateForm() {
        // var errCounter = 0;
        // var username = document.forms["regForm"]["username"].value;
        // var registerNumber = document.forms["regForm"]["registerNumber"].value;
        // var phoneNumber = document.forms["regForm"]["phoneNumber"].value;
        // var email = document.forms["regForm"]["email"].value;
        // var address = document.forms["regForm"]["address"].value;
        // var cardNumber = document.forms["regForm"]["cardNumber"].value;

        // var usrReg = new RegExp('^[a-zA-Z0-9]+$');
        // var phnReg = new RegExp('^[0-9]+$');
        // // var rgnReg = new RegExp('^[a-zA-Z]{1,2}[0-9]{8}?$');
        // var rgnReg = new RegExp('^[0-9]{8}?$');
        // var emaReg = new RegExp("^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$");
        // // alert(usrReg.test(username));
        // if (username == "" || !usrReg.test(username)) {
        //     document.getElementById("username").id = "form-error";
        //     errCounter++;
        // }
        // if (registerNumber == "" || !rgnReg.test(registerNumber)) {
        //     document.getElementById("registerNumber").id = "form-error";
        //     errCounter++;
        // }
        // if (phoneNumber == "" || !phnReg.test(phoneNumber)) {
        //     document.getElementById("phoneNumber").id = "form-error";
        //     errCounter++;
        // }
        // if (email == "" || !emaReg.test(email)) {
        //     document.getElementById("email").id = "form-error";
        //     errCounter++;
        // }
        // if (address == "") {
        //     document.getElementById("address").id = "form-error";
        //     errCounter++;
        // }
        // if (cardNumber == "") {
        //     document.getElementById("cardNumber").id = "form-error";
        //     errCounter++;
        // }
        // if(errCounter>0)
        //     return false;
    }
</script>