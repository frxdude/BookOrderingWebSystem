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
    <h1 class="d-flex justify-content-center">Хэрэглэгч бүртгэл</h1>
    <form action="" method="POST" name="regForm" onsubmit="return validateForm()">
        <div class="mb-2 mt-5">
            <label  class="form-label text-muted ">Та нэрээ оруулна уу</label>
            <input type="text" class="form-control" id="{{($errors->first('username') ? 'form-error' : 'username')}}" name="username"  maxlength="50">
        </div>
        <div class="mb-2">
            <label class="form-label text-muted">Регистерийн дугаараа оруулна уу</label>
            <div style="display: flex; flex-direction: row">
                <select class="form-control" id="firstSelect" name="firstSelect" style="width: 50">
                </select>
                <select class="form-control" id="secondSelect" name="secondSelect" style="width: 50">
                </select>
                <input type="text" class="form-control" id="{{($errors->first('registerNumber') ? 'form-error' : 'registerNumber')}}" name="registerNumber"  maxlength="8" minlength="8">
            </div>
        </div>
        <div class="mb-2">
        <label class="form-label text-muted" >Утасны дугаараа оруулна уу</label>
            <input type="text" class="form-control" id="{{($errors->first('phoneNumber') ? 'form-error' : 'phoneNumber')}}" name="phoneNumber"  maxlength="8" minlength="8">
        </div>
        <div class="mb-2">
            <label class="form-label text-muted" >И-мейл хаягаа оруулна уу</label>
            <input type="text" class="form-control" id="{{($errors->first('email') ? 'form-error' : 'email')}}" name="email" placeholder="email@example.com"  maxlength="255">
        </div>
        <div class="mb-2">
            <label class="form-label text-muted">Хаягаа оруулна уу</label>
            <input type="text" class="form-control" id="{{($errors->first('address') ? 'form-error' : 'address')}}" name="address"  maxlength="255">
        </div>
        <div class="mb-3">
            <label class="form-label text-muted">Кредит картны дугаараа оруулна уу</label>
            <input type="text" class="form-control" id="{{($errors->first('cardNumber') ? 'form-error' : 'cardNumber')}}" name="cardNumber"  maxlength="16" minlength="16">
        </div>
        @if($errors->any())
            @foreach($errors->all() as $error)
            <h4 style="color: red">{{$error}}</h4>
            @endforeach
        @endif
        {{csrf_field()}}
        <button type="submit" class="btn btn-primary w-100" style="background-color:#611f69; color:#F3EDE5">Бүртгүүлэх</button>
    </form>
</div>
<h5><a href="/login" style="text-decoration:none;">Нэвтрэх</a></h5>
@endsection
<script>
    (function(window, document, undefined){
    window.onload = init;

    function init(){
        var selectList1 = document.getElementById("firstSelect");
        var selectList2 = document.getElementById("secondSelect");
        var regOptions =
        [
            {
                "text" : "А",
                "value" : "А",
                "selected" : true
            },
            {
                "text" : "Б",
                "value" : "Б"
            },
            {
                "text" : "В",
                "value" : "В"
            },
            {
                "text" : "Г",
                "value" : "Г"
            },
            {
                "text" : "Д",
                "value" : "Д"
            },
            {
                "text" : "Е",
                "value" : "Е"
            },
            {
                "text" : "Ё",
                "value" : "Ё"
            },
            {
                "text" : "Ж",
                "value" : "Ж"
            },
            {
                "text" : "З",
                "value" : "З"
            },
            {
                "text" : "И",
                "value" : "И"
            },
            {
                "text" : "Й",
                "value" : "Й"
            },
            {
                "text" : "К",
                "value" : "К"
            },
            {
                "text" : "Л",
                "value" : "Л"
            },
            {
                "text" : "М",
                "value" : "М"
            },
            {
                "text" : "Н",
                "value" : "Н"
            },
            {
                "text" : "О",
                "value" : "О"
            },
            {
                "text" : "Ө",
                "value" : "Ө"
            },
            {
                "text" : "П",
                "value" : "П"
            },
            {
                "text" : "Р",
                "value" : "Р"
            },
            {
                "text" : "С",
                "value" : "С"
            },
            {
                "text" : "Т",
                "value" : "Т"
            },
            {
                "text" : "У",
                "value" : "У"
            },
            {
                "text" : "Ү",
                "value" : "Ү"
            },
            {
                "text" : "Ф",
                "value" : "Ф"
            },
            {
                "text" : "Х",
                "value" : "Х"
            },
            {
                "text" : "Ц",
                "value" : "Ц"
            },
            {
                "text" : "Ч",
                "value" : "Ч"
            },
            {
                "text" : "Ш",
                "value" : "Ш"
            },
            {
                "text" : "Щ",
                "value" : "Щ"
            },
            {
                "text" : "Ъ",
                "value" : "Ъ"
            },
            {
                "text" : "Ь",
                "value" : "Ь"
            },
            {
                "text" : "Ы",
                "value" : "Ы"
            },
            {
                "text" : "Э",
                "value" : "Э"
            },
            {
                "text" : "Ю",
                "value" : "Ю"
            },
            {
                "text" : "Я",
                "value" : "Я"
            }
        ];
        regOptions.forEach(option => {
            selectList1.options.add(
                new Option(option.text, option.value, option.selected)
            ),
            selectList2.options.add(
                new Option(option.text, option.value, option.selected)
            )
        });
    }
    })(window, document, undefined);
    
    function validateForm() {
        var errCounter = 0;
        var username = document.forms["regForm"]["username"].value;
        var registerNumber = document.forms["regForm"]["registerNumber"].value;
        var phoneNumber = document.forms["regForm"]["phoneNumber"].value;
        var email = document.forms["regForm"]["email"].value;
        var address = document.forms["regForm"]["address"].value;
        var cardNumber = document.forms["regForm"]["cardNumber"].value;

        var usrReg = new RegExp('^[a-zA-Z0-9]+$');
        var phnReg = new RegExp('^[0-9]+$');
        // var rgnReg = new RegExp('^[a-zA-Z]{1,2}[0-9]{8}?$');
        var rgnReg = new RegExp('^[0-9]{8}?$');
        var emaReg = new RegExp("^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$");
        // alert(usrReg.test(username));
        if (username == "" || !usrReg.test(username)) {
            document.getElementById("username").id = "form-error";
            errCounter++;
        }
        if (registerNumber == "" || !rgnReg.test(registerNumber)) {
            document.getElementById("registerNumber").id = "form-error";
            errCounter++;
        }
        if (phoneNumber == "" || !phnReg.test(phoneNumber)) {
            document.getElementById("phoneNumber").id = "form-error";
            errCounter++;
        }
        if (email == "" || !emaReg.test(email)) {
            document.getElementById("email").id = "form-error";
            errCounter++;
        }
        if (address == "") {
            document.getElementById("address").id = "form-error";
            errCounter++;
        }
        if (cardNumber == "") {
            document.getElementById("cardNumber").id = "form-error";
            errCounter++;
        }
        if(errCounter>0)
            return false;
    }
</script>