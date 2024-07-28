<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <link rel="icon" type="image" href="{{ asset('img/enqueteur caen.png') }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title')</title>
    @vite(['resources/js/app.js', 'resources/js/burger.js', 'resources/js/game.js', 'resources/js/lore.js'])
    @vite('resources/scss/main.scss')
</head>
<body>
    <header class="header-container">
        <img class="header__img" src="{{ asset('img/logovillecaenndie_2016-removebg-preview.webp') }}" alt="enqueteur" />
        <img class="header__logo site__img" src="{{ asset('img/Geo-removebg-preview.webp') }}" alt="logo GeoCaen" />
        <div class="nav__lg">
            <ul class="nav__lg-lst">
                <li><a class="nav__lnk" href="{{ route('index') }}">Accueil</a></li>
                <li><a class="nav__lnk" href="{{ route('game') }}">Jeux</a></li>
                <li><a class="nav__lnk" href="#">A propos de GeoCaen</a></li>
                <li><a class="nav__lnk" href="#">Nous contacter</a></li>
            </ul>
        </div>
        <div class="menu__toggle" id="burger__menu">
            <span class="menu__toggle-bar"></span>
        </div>
        <nav id="menu">
            <ul class="menu__container">
                <li class="menu__container-itm">
                    <a class="menu__container-lnk" href="{{ route('login') }}">Se connecter / S'inscrire</a>
                    
                </li>
                <li class="menu__container-itm">
                    <a class="menu__container-lnk" href="{{ route('game') }}">Présentation des jeux</a>
                </li>
                <li class="menu__container-itm">
                    <a class="menu__container-lnk" href="#">A propos de GeoCaen</a>
                </li>
                <li class="menu__container-itm">
                    <a class="menu__container-lnk" href="#">Nous contacter</a>
                </li>
            </ul>
        </nav>
    </header>
    @yield('content')
</body>
</html>
