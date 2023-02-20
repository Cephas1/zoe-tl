{{--<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
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
        <div class="content  my-4">
            <div class="d-flex justify-content-center mb-3">
                <a href="index.html">
                    <img src="img/logo.png" width="150px" height="90px">
                </a>
            </div>

            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />

            <div class="form-auth">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <h5>Inscription</h5>

                    <!--<div class="user_pic">
                        <img src="img/profil-default.png" alt="" id="image_profile">
                        <label for="add_pic" id="btn-add-pic"><i class="fas fa-camera-alt"></i></label>
                        <input type="file" name="picture" id="add_pic">
                    </div>-->
                    <div class="form-group">
                        <label for="full_name">Nom et prénom</label>
                        <input type="text" name="name" id="full_name" placeholder="Ex: TATHY Lambert" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" placeholder="Ex: Lambert@gmail.com" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Téléphone</label>
                        <input type="tel" name="phone" id="phone" placeholder="Ex: 065006060" required>
                    </div>
                    <div class="form-group">
                        <label for="pwd">Mot de passe</label>
                        <input type="password" name="password" id="pwd" placeholder="Tapez votre mot de passe" required>
                    </div>
                    <div class="form-group">
                        <label for="conf_pwd">Confirmer votre mot de passe</label>
                        <input type="password" name="password_confirmation" id="conf_pwd" placeholder="Confirmez votre mot de passe" required>
                    </div>
                    <div class="form-submit">
                        <button type="submit">S'inscrire'</button>
                    </div>
                    <div class="signup-link">
                        <p>Vous avez déjà un compte ? <a href="{{ route('login') }}">Se connecter</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /Login -->

    <script src="vendors/jquery/jquery-3.6.1.min.js"></script>
    <script src="vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendors/font-awesome/js/all.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>
