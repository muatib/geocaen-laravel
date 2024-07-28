@include('header')

<main>
    <section id="login" class="box__style form-box">
        <h2 class="users-ttl">Vous avez un compte ?<br>Identifiez-vous</h2>

        @if ($errors->any('login')) {{-- Affichage des erreurs de connexion --}}
        <div class="error-message">
            <ul>
                @foreach ($errors->get('login') as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('login.submit') }}" method="post">
            @csrf {{-- Protection CSRF --}}

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="logemail" name="email" required value="{{ old('email') }}">
            </div>
            <div class="form-group">
                <label for="password">Mot de passe:</label>
                <input class="form-inp" type="password" id="logpassword" name="password" required>
            </div>
            <button type="submit" name="login_submit" class="btn ">S'identifier</button>
        </form>
    </section>

    <section id="register" class="box__style form-box">
        <h2 class="users-ttl">Créer un compte</h2>

        @if ($errors->any('register'))
        <div class="error-message">
            <ul>
                @foreach ($errors->get('register') as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @elseif (session('registerSuccess'))
        <div class="success-message">Inscription réussie ! Vous pouvez maintenant vous connecter.</div>
        @endif

        <form action="{{ route('register.submit') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="firstname">Nom:</label>
                <input type="text" id="firstname" name="firstname" value="{{ old('firstname') }}" required>
            </div>
            <div class="form-group">
                <label for="lastname">Prénom:</label>
                <input type="text" id="lastname" name="lastname" value="{{ old('lastname') }}" required>
            </div>
            <div class="form-group">
                <label for="pseudo">Pseudo:</label>
                <input type="text" id="pseudo" name="pseudo" value="{{ old('pseudo') }}" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required>
            </div>
            <div class="form-group">
                <label for="password">Mot de passe:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="avatar">Avatar
                    profil:</label>
                <input type="file" id="avatar" name="avatar" accept="image/*">
            </div>
            <div class="form-group">
                <label for="description">Présentez-vous en quelques mots:</label>
                <textarea id="description" name="description">{{ old('description') }}</textarea>
            </div>
            <button type="submit" name="register_submit" class="btn">Créer le compte</button>
        </form>
    </section>
</main>

@include('footer')

<script src="{{ asset('js/burger.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
</body>

</html>