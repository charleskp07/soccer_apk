@extends('layout.base')

@section('content')

    <br />
    <br />

    <div class="login-contenair">

        <div class="login-contenair-text">
            <h1>Se connecter</h1>
            <br />
            <p>
                Remplir vos paramètres de connexion pour vous connecter à votre compte administrateur
            </p>
        </div>

        @if ($message = Session::get('success'))
            <h3>{{ $message }}</h3>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <br /><br />

        <form action="{{route('auth.login')}}" method="post" class="login-form">
            @csrf

            <label for="email">E-mail</label><br />
            <input type="text" name="email" id="email" value="{{ old('email') }}" placeholder="Saisir l'adresse e-mail ici ...">
            <br /><br />

            <label for="password">Mot de passe</label><br />
            <input type="password" name="password" id="password" placeholder="Saisir le mot de passe ici ...">
            <br /><br />

            <a href="">
                Mot de passe oublié ?
            </a>
            <br /><br />

            <button type="submit">
                Se connecter
            </button>
        </form>

    </div>

@endsection
