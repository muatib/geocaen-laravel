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
                    <a class="menu__container-lnk" href="{{ route('index') }}">Accueil</a>
                    
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

<main>
    <h1 class="game1-ttl">
        Les trésors cachés de <br />Guillaume le Conquérant
    </h1> 
    <div class="game1-txt">
        <p class="box-content box__style">
            Une ancienne légende persiste depuis des siècles parmi les habitants de Caen.... <br /><br />
            On raconte que Guillaume aurait dissimulé des trésors inestimables dans les monuments qu’il avait fait construire. <br /><br />
            Ces trésors ne pourraient être découverts qu'en suivant un parcours précis à travers la ville et en résolvant des énigmes liées à la vie et aux réalisations du roi Normand. Au fil des siècles nombreux furent ceux qui tentèrent de percer ces mystères. <br /><br />
            Certains prétendent avoir découvert de précieux indices et de mystérieux passages secrets, d’autres affirment avoir résolu certaines de ces grandes énigmes. <br /><br />
            Mais en réalité à ce jour personne n’a réussi à dévoiler les secrets enfouis depuis des siècles dans les rues et les monuments de Caen. <br /><br />
            Qui sait ? viendra peut-être le jour ou de courageux aventuriers lèveront le voile sur le mystère des trésors cachés de Guillaume le Conquérant. <br /><br />
            Et si ce jour était venu ?....
        </p>
        <img class="game1-img1 site__img" src="{{ asset('img/boy-sm.webp') }}" alt="garçon" />
        <img class="game1__img2 site__img" src="{{ asset('img/filette-sm.webp') }}" alt="fille" />
    </div>
    <a class="link" href="{{ route('game-step') }}">
        <button class="btn">Lancez l'enquête !</button>
    </a>
</main>

@include('footer')
