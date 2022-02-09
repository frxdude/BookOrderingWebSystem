<!-- B180910040 Sainjargal -->
@extends('layouts.master')
@section('content')
{{$userId}}
{{$price}}
<div class="container">
    <h1 class="d-flex justify-content-center mt-5">Цахим шууданруу тань нэг удаагийн код илгээлээ</h1>
    <form class="d-flex justify-content-center mt-5 inputs" id="authForm" action="/authCheck" method="POST">
        <input type="text" maxlength="1" name="d1" aria-label="digit 1 of 6" aria-disabled="false" value="" class="left" autofocus>
        <input type="text" maxlength="1" name="d2" aria-label="digit 2 of 6" aria-disabled="false" value="" class="mid">
        <input type="text" maxlength="1" name="d3" aria-label="digit 3 of 6" aria-disabled="false" value="" class="right">
        <span style="font-size: 40px; margin-left:5px; margin-right:5px; color:#696969;">_</span>
        <input type="text" maxlength="1" name="d4" aria-label="digit 4 of 6" aria-disabled="false" value="" class="left">
        <input type="text" maxlength="1" name="d5" aria-label="digit 5 of 6" aria-disabled="false" value="" class="mid">
        <input type="text" maxlength="1" name="d6" aria-label="digit 6 of 6" aria-disabled="false" value="" class="right">
        <input type="submit" style="display:none" value="done" id="submitAuth">
        @csrf
    </form>
    @if($errors->any())
            @foreach($errors->all() as $error)
            <h4 style="color: red;
                    display: flex;
                    justify-content: center;
                    align-items: center;">
                {{$error}}
            </h4>
            @endforeach
        @endif
</div>
@endsection
<script>
    (function(window, document, undefined){
        window.onload = init;
        function init(){
            var form = document.getElementById("authForm");
            form.onkeyup = function(e) {
                var target = e.srcElement || e.target;
                var maxLength = parseInt(target.attributes["maxlength"].value, 10);
                var myLength = target.value.length;
                if (myLength >= maxLength) {
                    var next = target;
                    while (next = next.nextElementSibling) {
                        if (next.value == 'done') {
                            $(document).ready(function(){
                                $('#submitAuth').trigger('click');
                            });
                            // var Http = new XMLHttpRequest();
                            // var url='http://localhost:8000/authCheck';
                            // Http.open("POST", url);
                            // Http.send(document.getElementById("d1").value 
                            //             + document.getElementById("d2").value
                            //             + document.getElementById("d3").value
                            //             + document.getElementById("d4").value
                            //             + document.getElementById("d5").value
                            //             + document.getElementById("d6").value);
                            // Http.onreadystatechange = (e) => {
                            // console.log(Http.responseText)
                            // }
                            break;
                        }
                        if (next.tagName.toLowerCase() === "input") {
                            next.focus();
                            break;
                        }
                    }
                }
                else if (myLength === 0) {
                    var previous = target;
                    while (previous = previous.previousElementSibling) {
                        if (previous == null)
                            break;
                        if (previous.tagName.toLowerCase() === "input") {
                            previous.focus();
                            break;
                        }
                    }
                }
            }
        }
    })(window, document, undefined);
</script>