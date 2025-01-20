@include('components.header')

<section class="box__style end-box">
    <h2 class="game-end-title">Félicitations !</h2>
    <div class="game-end-content">
        <p class="game-end-txt">Vous avez terminé l'enquête avec succès !</p>

        @if(session('trophy_earned'))
            <div class="trophy-notification">
                <h3>🏆 Nouveau Trophée Débloqué !</h3>
                <p>{{ session('trophy_earned')['name'] }}</p>
                <p>{{ session('trophy_earned')['description'] }}</p>
            </div>
        @endif

        <div class="game-end-actions">
            <a href="{{ route('home') }}" class="btn end-btn">Retour à l'accueil</a>
            <a href="{{ route('profile') }}" class="btn end-btn">Voir mon profil</a>
        </div>
    </div>
</section>

@include('components.footer')
