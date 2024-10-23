<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>bravo !</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <header>
        <img class="game1__img" src="{{ asset('img/guillaume-le-conquerant_1024x.webp') }}" alt="" />
        <img class="middle-logo" src="{{ asset('img/logo geocaen.png') }}" alt="" />
    </header>
    <main>
        <div>
            <p class="box-content box__style" id="middle__txt">
                {{ $stepData->lore }}
            </p>
            <img class="middle__img1 site__img" src="{{ asset('img/bravo-sm.webp') }}" alt="detective content" />
        </div>
    </main>
    <footer class="middle__game-footer">
        <button class="game__btn" id="home-button" onclick="displayPopup('popupk')">accueil</button>
        <div class="popup box__style" id="popupk">
            <p class="popupk__txt">Souhaitez vous vraiment quitter ?</p>
            <img class="popupk__img" src="{{ asset('img/detective_interroge-removebg-preview.webp') }}" alt="" />
            <div class="popupk__container">
                <button class="btn popupk__btn" onclick="closePopup('popupk')">continuer</button>
                <a class="link" href="{{ route('home') }}">
                    <button class="btn popupk__btn">quitter</button>
                </a>
            </div>
        </div>
        <a class="link" href="{{ route('game.step') }}">
            <button class="pop__btn game__btn" id="closeCorrectPopup">suivant</button>
        </a>
    </footer>

    @vite('resources/js/game.js')
</body>
</html>
