@include('components.header')


<section class="profile-section box__style">
    <h2 class="users-ttl">Mon Profil</h2>
    <div class="profile-info">
        @if ($user->avatarurl)
        <img src="{{ url('storage/' . $user->avatarurl) }}" alt="Photo de profil" class="profile-avatar">
    @else
        <img src="{{ asset('img/default-avatar.png') }}" alt="Photo de profil par défaut" class="profile-avatar">
    @endif

        <div class="info-group">
            <p><strong>Prénom:</strong> {{ $user->firstname }}</p>
            <p><strong>Nom:</strong> {{ $user->lastname }}</p>
            <p><strong>Pseudo:</strong> {{ $user->pseudo }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
        </div>

        @if ($user->description)
            <div class="description-group">
                <h3>À propos de moi</h3>
                <p>{{ $user->description }}</p>
            </div>
        @endif

        @if (isset($trophies))
            <div class="trophies-section box__style">
                <h3>Mes Trophées</h3>
                <div class="trophies-grid">
                    @forelse($trophies as $trophy)
                        <div class="trophy-card">
                            <h4>{{ $trophy->name }}</h4>
                            <p>{{ $trophy->description }}</p>
                            <span class="earned-date">Obtenu le
                                {{ \Carbon\Carbon::parse($trophy->earned_at)->format('d/m/Y') }}</span>
                        </div>
                    @empty
                        <p>Aucun trophée gagné pour le moment.</p>
                    @endforelse
                </div>
            </div>
        @endif
        <div class="profile-actions">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn">Se déconnecter</button>
            </form>
        </div>
    </div>




</section>
@include('components.footer')
