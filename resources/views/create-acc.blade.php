
@include('components.header')
@vite('resources/js/account.js')
<section id="register" class="box__style form-box">
    <h2 class="users-ttl">Créer un compte</h2>

    @if ($errors->any())
        <div class="error-message">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('success'))
        <div class="success-message">{{ session('success') }}</div>
    @endif

    <form action="{{ route('register') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="firstname">Nom:</label>
            <input type="text" id="firstname" name="firstname" required value="{{ old('firstname') }}">
        </div>

        <div class="form-group">
            <label for="lastname">Prénom:</label>
            <input type="text" id="lastname" name="lastname" required value="{{ old('lastname') }}">
        </div>

        <div class="form-group">
            <label for="pseudo">Pseudo:</label>
            <input type="text" id="pseudo" name="pseudo" required value="{{ old('pseudo') }}">
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required value="{{ old('email') }}">
        </div>

        <div class="form-group">
            <label for="password">Mot de passe:</label>
            <div class="password-container">
                <input type="password" id="password" name="password" required>
                <span class="toggle-password">
                    <i class="fas fa-eye-slash"></i>
                </span>
            </div>
            <span class="password-hint">(min 8 caractères 1 chiffre 1 majuscule)</span>
        </div>

        <div class="form-group">
            <label for="password_confirmation">Répéter le mot de passe:</label>
            <div class="password-container">
                <input type="password" id="password_confirmation" name="password_confirmation" required>
                <span class="toggle-password">
                    <i class="fas fa-eye-slash"></i>
                </span>
            </div>
        </div>

        <div class="form-group">
            <label for="avatar">Avatar:</label>
            <input type="file" id="avatar" name="avatar" accept="image/*">
        </div>

        <div class="form-group">
            <label for="description">Présentez vous en quelques mots:</label>
            <textarea id="description" name="description">{{ old('description') }}</textarea>
        </div>

        <div class="form-term">
            <input type="checkbox" id="accept-terms" name="terms" required>
            <label for="accept-terms">J'accepte les <a class="term-lnk" href="#" target="_blank">conditions d'utilisation</a></label>
        </div>

        <button type="submit" class="btn">Créer le compte</button>
    </form>
</section>
@include('components.footer')
