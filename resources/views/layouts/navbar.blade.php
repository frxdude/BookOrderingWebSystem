<!-- B180910040 Sainjargal -->
<!DOCTYPE html>
<html>
    <head>
        <title>Online book store</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="/assets/fonts/font.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous"> -->
        <!-- <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet"> -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
        <style>
            html *
            {
                font-family: 'Hellix' !important;
            }
            .nav a:hover {
                background: #F3EDE5;
                color: black;
            }
            .avatar {
                vertical-align: middle;
                width: 50px;
                height: 50px;
                border-radius: 50%;
            }
        </style>
    </head>
    <body style="background-color: #F3EDE5">
        
    <nav class="navbar navbar-light bg-light">
        <a href="/books"><img src="/assets/images/Internom_logo.png" height="50px"></a>
        <form class="d-flex">
            <input class="form-control me-2 mt-1" type="search" placeholder="Хайх" aria-label="Search">
            <!-- <button class="btn btn-outline-success" type="submit">Хайх</button> -->
            <button class="btn mt-1"><i class="fas fa-search"></i></button>
        </form>
        <a href="/profile"><img src="https://freesvg.org/img/abstract-user-flat-4.png" alt="Avatar" width="10px" class="avatar"></a>
    </nav>
    <div class="bg-dark">
        <ul class="nav justify-content-center">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-warning" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Ном</a>
                <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Анагаах ухаан</a></li>
                <li><a class="dropdown-item" href="#">Байгалийн шинжлэл</a></li>
                <li><a class="dropdown-item" href="#">Бизнес, эдийн Засаг</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">Газрын зураг</a></li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link text-warning" href="#">English books</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-warning" href="#">Хүүхэд</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-warning" href="#" >Бичиг хэрэг / Дурсгал</a>
            </li>
        </ul>
    </div>
        @yield('content')
    </body>
</html>