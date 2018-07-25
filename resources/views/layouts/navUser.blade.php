<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/navUser.css">
    <link rel="stylesheet" href="css/contact.css">
    <link rel="stylesheet" href="css/sponsors.css">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/lineup.css">
    <link rel="stylesheet" href="css/app.css">
    
    <title>Orion - Accueil</title>
</head>

<body>

<div id="cssmenu" class="topnav">
    <nav>
    <ul>
        <li><a href="#accueil">Accueil</a></li>
            <li><a href="#sponsors">Sponsors</a></li>
            <a href="{{url('')}}"><img class="img-fluid orion" src="img/logoOrion.png"></a>
            <li><a href="#lineup">Line Up</a></li>
            <li><a href="#overlay">Contact</a></li>

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

@yield('accueilUser')
{{-- Sponsors --}}
@yield('sponsors')
{{-- Line up --}}
@yield('lineup')
{{-- Contact --}}
@yield('contact')
{{-- Footer --}}
@yield('footer')

</body>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
<script src="js/timeago.js"></script>
<script src="{{ asset('js/app.js') }}"></script>
</html>

