<!-- B180910040 Sainjargal -->
<DOCTYPE html>
    <html lang=”en-US”>
        <head>
            <meta charset="utf-8">
        </head>
        <body>
            <form>
                <div style="color:black">
                    <h1>Таны и-мэйл хаяг баталгаажуулалт</h1>
                    <p>Энэхүү кодоор системд бүртгүүлсэн бүртгэлээ баталгаажуулна уу</p>
                    <div style="padding-right:30px; padding-left: 30px; margin:32px">
                        <table class="center">
                            <tbody>
                                <tr>
                                    <td>{{$data['authCode']}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <p style="font-size: medium; color: rgb(77, 77, 77);">IT301 Веб систем ба технологи хичээлийн бие даалтын ажил 3,4</p>
                    <p style="font-size: medium; color: rgb(77, 77, 77);">ПХ-3 Сайнжаргал, Билгүүн</p>
                </div>
            </form>
        </body>
    </html>
    
    <style>
        form{
            margin-top: 20px;
            margin-left: 20px;
            padding:80px;
            width: 700px;
            background-color:rgb(230, 230, 230);
            border-radius: 15px;
        }
        table{
            border-collapse:collapse;
            border:0;
            background-color:#dad6d6;
            height:70px;
            table-layout:fixed;
            word-wrap:break-word;
            border-radius:10px;
            margin-left:-10px;
            width: 370px;;
        }
        td{
            font-family: "Roboto", sans-serif;
            text-align:center;
            vertical-align:auto ;
            font-size:30px
        }
        p{
            font-family: "Roboto", sans-serif;
            font-size:20px;
            padding-right:60px;
            padding-left:50px
        }
        h1{
            font-family: "Roboto", sans-serif;
            font-size:30px;
            padding-right:50px;
            padding-left:50px
        }
        .center {
            margin-left: auto;
            margin-right: auto;
        }
    </style>