@include('components.header')

<main>
    <section class="log-container" id="login" class="box__style form-box">
        <h2 class="users-ttl">Identifiez vous</h2>
        @if ($errors->any())
            <div class="error-message">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- <form action="{{ route('login') }}#login" method="post"> --}}
            <form action="{{ route('login') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="logemail" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Mot de passe :</label>
                <input class="form-inp" type="password" id="logpassword" name="password" required>
            </div>
            <button type="submit" name="login_submit" class="btn">S'identifier</button>
        </form>
    </section>
    <p class="login-txt">Vous n'avez pas de compte ? :</p>
    <a class="acc-lnk" href="{{ route('create-acc') }}">Créer un compte</a>
</main>

@include('components.footer')


