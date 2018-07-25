<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="../css/navUser.css">
    <link rel="stylesheet" href="../css/home.css">
    <link rel="stylesheet" href="../css/app.css">
    <title>Orion - Articles</title>
</head>

<body>

<div id="cssmenu" class="topnav">
    <nav>
    <ul>
       
            <a href="{{url('')}}"><img class="img-fluid orion" src="../img/logoOrion.png"></a>
          
            @guest
                <li class="drop"><a href="{{ route('login') }}">Login</a></li>
                <li class="drop"><a href="{{ route('register') }}">Register</a></li>
            @else
                <li class="drop">
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        Logout
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>

                <li class="drop">
                    <a href="#" class="dropdown-toggle" role="button">
                        {{ Auth::user()->name }}
                    </a>
                </li>
            @endguest
        </ul>
    </nav>
</div>

<div class="dropdown">
    <button type="button" class="btn btn-default dropdown-toggle" id="dropdownMenu1" aria-label="Left Align" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
        <a href="{{url('')}}"><img class="img-fluid orion" src="img/logoOrion.png"></a>
    </button>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
        <li><a href="#">Action</a></li>
        <li><a href="#">Another action</a></li>
        <li><a href="#">Something else here</a></li>
        <li role="separator" class="divider"></li>
        <li><a href="#">Separated link</a></li>
    </ul>
</div>


@yield('articles')

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
