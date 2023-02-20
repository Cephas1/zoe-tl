{{--<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="ml-3">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>--}}

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./vendors/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="./vendors/font-awesome/css/all.min.css">
  <link rel="stylesheet" href="./css/style.css">
  <link rel="shortcut icon" href="./img/fav-icon.png" type="image/x-icon">
  <title>ZOE | Transport et logistique</title>
</head>

<body>

    <!-- Login -->
    <div class="auth-a">
        <div class="content">
            <div class="d-flex justify-content-center mb-3">
                <a href="index.html">
                    <img src="img/logo.png" width="150px" height="90px">
                </a>
            </div>


            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />

            <div class="form-auth">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <h5>connexion</h5>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" placeholder="Ex: alex@gmail.com">
                    </div>

                    <div class="form-group">
                        <label for="pwd">Mot de passe</label>
                        <input type="password" name="password" id="pwd" placeholder="Tapez votre mot de passe">
                    </div>

                    <div class="forgot-pwd">
                        <a href={{ route('password.request') }}>Mot de passe oublié ?</a>
                    </div>

                    <div class="form-submit">
                        <button type="submit">Se connecter</button>
                    </div>

                    <div class="signup-link">
                        <p>Pas encore de compte ? <a href={{ route('register') }}>S'inscrire</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /Login -->

  <script src="{{ asset('vendors/jquery/jquery-3.6.1.min.js') }}"></script>
  <script src="{{ asset('vendors/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('vendors/font-awesome/js/all.min.js') }}"></script>
  <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>
