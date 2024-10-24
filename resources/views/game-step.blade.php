<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Étape {{ session('currentStep') }}</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/js/burger.js', 'resources/js/game.js'])
</head>

<body>
    <header>
        <img class="game1-img" src="{{ asset('img/guillaume-le-conquerant_1024x.webp') }}" alt="guillaume" />
        <img class="game1-logo" src="{{ asset('img/logo geocaen.png') }}" alt="logo" />
    </header>

    <main>
        @if ($stepData)
            <p class="box-content box__style" id="game1__txt">
                {{ $stepData->question }}
                <img class="question-img" src="{{ asset('img/detective_interroge-removebg-preview.webp') }}" alt="interrogation" />
            </p>

            @if(session('message'))
                <p class="wrong__txt" id="txt__wrong">{{ session('message') }}</p>
            @endif

            <div class="game__form">
                <form method="post" action="{{ route('game.check-answer') }}">
                    @csrf
                    <input class="game__form-txt" type="text" name="answer" placeholder="Réponse" id="answer" required />
                    <button class="game__form-btn btn" type="submit" id="submitButton">valider</button>
                </form>
            </div>

            <div id="correctPopup" class="popup" style="display: none;">
                <p class="popup__txt">Bonne réponse bravo !</p>
                <img class="site__img pop__img" src="{{ asset('img/bravo-sm.webp') }}" alt="" />
                <a class="link" href="{{ route('game.middlestep') }}">
                    <button class="pop__btn btn" id="closeCorrectPopup">suivant</button>
                </a>
            </div>

            <div id="incorrectPopup" class="popup" style="display: none;">
                <img class="site__img pop__img" src="{{ asset('img/detective_interroge-removebg-preview.webp') }}" alt="" />
                <button class="pop__btn btn" id="closeIncorrectPopup">Fermer</button>
            </div>
        @else
            <p>Erreur : Impossible de charger les données de l'étape. Veuillez contacter l'administrateur.</p>
        @endif
    </main>

    <footer class="game__footer">
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

        <button class="game__btn" id="showClue" onclick="displayPopup('popup')">indice</button>
        <div class="popup box__style" id="popup">
            <p class="popup__txt" id="clue">{{ $stepData->clue ?? '' }}</p>
            <img class="pop__img site__img" src="{{ asset('img/detective_interroge-removebg-preview.webp') }}" alt="" />
            <button class="btn pop__btn" onclick="closePopup('popup')">fermer</button>
        </div>
    </footer>


</body>
</html>
