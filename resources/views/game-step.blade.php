@extends('layout')

@section('content')
<main>
    <header>
        <img class="game1-img" src="{{ asset('img/guillaume-le-conquerant_1024x.webp') }}" alt="guillaume" />
        <img class="game1-logo" src="{{ asset('img/Geo-removebg-preview.webp') }}" alt="logo" />
    </header>

    <p class="box-content box__style" id="game1__txt">
        <img src="{{ asset('img/detective_interroge-removebg-preview.webp') }}" alt="interrogation" />
    </p>

    <p class="wrong__txt" id="txt__wrong">Presque ! N'abandonnez pas !</p>
    <div class="game__form">
        <input class="game__form-txt" type="text" placeholder="Réponse" id="answer" />
        <button class="game__form-btn btn" type="button" id="submitButton">Valider</button>
    </div>

    <div id="correctPopup" class="popup">
        <p class="popup__txt">Bonne réponse bravo !</p>
        <img class="site__img pop__img" src="{{ asset('
        img/bravo-sm.webp') }}" alt="" />
        <a class="link" href="{{ route('middle-step') }}">
            <button class="pop__btn btn" id="closeCorrectPopup">Suivant</button>
        </a>
    </div>

    <div id="incorrectPopup" class="popup">
        <img class="site__img pop__img" src="{{ asset('
        img/detective_interroge-removebg-preview.webp') }}" alt="" />
        <button class="pop__btn btn" id="closeIncorrectPopup">Fermer</button>
    </div>
</main>

<footer class="game__footer">
    <button class="game__btn" id="home-button" onclick="displayPopup('popupk')">Accueil</button>
    <div class="popup box__style" id="popupk">
        <p class="popupk__txt">Souhaitez-vous vraiment quitter ?</p>
        <img class="popupk__img" src="{{ asset('
        img/detective_interroge-removebg-preview.webp') }}" alt="" />
        <div class="popupk__container">
            <a class="link" href="#" onclick="closePopup('popupk')">
                <button class="btn popupk__btn">Continuer</button>
            </a>
            <a class="link" href="{{ route('accueil') }}" onclick="closePopup('popupk')">
                <button class="btn popupk__btn">Quitter</button>
            </a>
        </div>
    </div>
    <button class="game__btn" id="showClue" href="#" onclick="displayPopup('popup')">Indice</button>
    <div class="popup box__style" id="popup">
        <p class="popup__txt" id="clue"></p>
        <img class="pop__img site__img" src="{{ asset('
        img/detective_interroge-removebg-preview.webp') }}" alt="" />
        <a class="link" href="#" onclick="closePopup('popup')">
            <button class="btn pop__btn">Fermer</button>
        </a>
    </div>
</footer>

@include('footer')

<script src="{{ asset('js/main.js') }}"></script>
<script src="{{ asset('js/game.js') }}"></script>
<script>
    const gameData = json_encode($gameData); // Utiliser json_encode directement
</script>
</body>

</html>