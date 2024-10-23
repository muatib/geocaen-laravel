@include('components.header')

<h1 class="game1-ttl">Formulaire de contact</h1>

<form class="form-container" action="{{ route('contact.send') }}" method="post">
    @csrf

    <label class="contact-label" for="name">Nom</label>&ensp;&emsp;
    <input class="contact-input" type="text" name="name" id="name" placeholder="Votre nom" required value="{{ old('name') }}">
    @error('name')
        <div class="error">{{ $message }}</div>
    @enderror

    <label class="contact-label" for="email">Email</label>&ensp;&emsp;
    <input class="contact-input" type="email" name="email" id="email" placeholder="Votre adresse mail" required value="{{ old('email') }}">
    @error('email')
        <div class="error">{{ $message }}</div>
    @enderror

    <label class="message-label" for="message">Votre message</label>
    <textarea class="message-input" name="message" id="message" placeholder="Entrez votre message ici" required>{{ old('message') }}</textarea>
    @error('message')
        <div class="error">{{ $message }}</div>
    @enderror

    <button class="btn contact-btn">Envoyer</button>

    @if (session('message'))
        <div class="message">
            {{ session('message') }}
        </div>
    @endif
</form>

@include('components.footer')

@vite(['resources/js/app.js'])
