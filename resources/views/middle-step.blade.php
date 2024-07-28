@include('header')

<main>
    <header>
        <img class="game1__img" src="{{ asset('img/guillaume-le-conquerant_1024x.webp') }}" alt="Guillaume le Conquérant" />
        <img class="game1__logo" src="{{ asset('img/Geo-removebg-preview.webp') }}" alt="Logo GeoCaen" />
    </header>
    
    <div>
        <p class="box-content box__style" id="middle__txt">
        
        </p>
        <img class="middle__img1 site__img" src="{{ asset('img/bravo-sm.webp') }}" alt="detective content" />
    </div>
</main>

<footer class="middle__game-footer">
    <button class="game__btn" id="home-button" onclick="displayPopup('popupk')">Accueil</button>
    <div class="popup box__style" id="popupk">
        <p class="popupk__txt">Souhaitez-vous vraiment quitter ?</p>
        <img class="popupk__img" src="{{ asset('img/detective_interroge-removebg-preview.webp') }}" alt="" />
        <div class="popupk__container">
            <a class="link" href="#" onclick="closePopup('popupk')">
                <button class="btn popupk__btn">Continuer</button>
            </a>
            <a class="link" href="{{ route('index') }}" onclick="closePopup('popupk')">
                <button class="btn popupk__btn">Quitter</button>
            </a>
        </div>
    </div>
    
    <a class="link" href="{{ route('game-step') }}">
        <button class="pop__btn game__btn" id="closeCorrectPopup">Suivant</button>
    </a>
</footer>

@include('footer')

<script src="{{ asset('js/game.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
<script src="{{ asset('js/lore.js') }}"></script>
<script src="{{ asset('js/burger.js') }}"></script>
</body>
</html>
