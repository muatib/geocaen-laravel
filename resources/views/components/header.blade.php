<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <link rel="icon" type="image" href="{{ asset('img/enqueteur caen.png') }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>GeoCaen</title>

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <header class="header-container">
        <a class="header__img" href="https://caen.fr/">
            <img src="{{ asset('img/Yellow_Simple_Depop_Profile_Picture-removebg-preview.webp') }}" alt="ville de caen" />
        </a>
        <a class="header__logo site__img" href="{{ route('home') }}">
            <img src="{{ asset('img/logo geocaen.png') }}" alt="logo GeoCaen" />
        </a>

        @auth
            <a class="header-user-img" href="{{ route('profile') }}">
                <img src="{{ Auth::user()->avatarurl }}" alt="Avatar de l'utilisateur">
            </a>
            <p class="user-pseudo">{{ Auth::user()->pseudo }}</p>
        @else
            <a class="header-user-img" href="{{ route('login') }}">
                <img src="{{ asset('img/icons8-compte-48.webp') }}" alt="logo compte">
            </a>
        @endauth

        <div class="nav__lg">
            <ul class="nav__lg-lst">
                <li><a class="nav__lnk link" href="{{ route('home') }}">Accueil</a></li>
                <li><a class="nav__lnk link" href="{{ route('game') }}">Jeux</a></li>
                <li><a class="nav__lnk link" href="#">A propos de GeoCaen</a></li>
                <li><a class="nav__lnk link" href="{{ route('contact') }}">Nous contacter</a></li>
            </ul>
        </div>

        <div class="menu__toggle" id="burger__menu">
            <span class="menu__toggle-bar"></span>
        </div>
        <nav id="menu">
            <ul class="menu__container">
                <li class="menu__container-itm">
                    <a class="menu__container-lnk" href="{{ route('game') }}">Présentation des jeux</a>
                </li>
                <li class="menu__container-itm">
                    <a class="menu__container-lnk" href="#">A propos de GeoCaen</a>
                </li>
                <li class="menu__container-itm">
                    <a class="menu__container-lnk" href="{{ route('contact') }}">Nous contacter</a>
                </li>
            </ul>
        </nav>
    </header>

    @yield('content')

    <script src="{{ asset('js/menu.js') }}"></script>
</body>
</html>
