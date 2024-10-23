@include('components.header')

<main>
    <h2 class="game__ttl">
        <span class="txt__red">Bienvenue</span> enquêteur ! <br />
        Choisissez le mystère à <span class="txt__blue">percer</span>
    </h2>
    <p class="game__txt"><span class="txt__red">(</span> Cliquez sur l'image pour accéder au jeu <span class="txt__red">)</span></p>
    <div class="game">
        <h3>Les trésors cachés de <br> Guillaume le <span class="txt__gold">Conquérant</span></h3>
        <a href="{{ route('game-pres') }}">
            <img class="game__img1 game__img" src="{{ asset('img/guillaume-le-conquerant2.webp') }}" alt="guillaume le conquérant" />
        </a>
        <h3>Les pouvoirs de la reine <span class="txt__purple">Mathilde</span></h3>
        <a href="#">
            <img class="game__img2 game__img" src="{{ asset('img/mathilde2.webp') }}" alt="reine Mathilde" />
        </a>
        <h3>L'héritage des <span class="txt__red">vikings</span></h3>
        <a href="#">
            <img class="game__img3 game__img" src="{{ asset('img/viking.webp') }}" alt="viking" />
        </a>
    </div>

    <img class="game__img4" src="{{ asset('img/famille detective-sm.webp') }}" alt="famille detective" />
</main>

@include('components.footer')

@vite(['resources/js/app.js'])
