<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href={{ asset("./vendors/bootstrap/css/bootstrap.min.css") }}>
    <link rel="stylesheet" href={{ asset("css/dataTables.bootstrap4.min.css") }}>
    <link rel="stylesheet" href={{ asset("./vendors/font-awesome/css/all.min.css") }}>
    <link rel="stylesheet" href={{ asset("./css/admin.css") }}>
    <link rel="shortcut icon" href={{ asset("./img/fav-icon.png") }} type="image/x-icon">
    <title>ZOE | Transport et logistique</title>
</head>

<body>

    <section id="menu">
        <div class="logo">
            <img src={{ asset("img/logo.png") }} alt="">
        </div>

        <div class="items">
            <li><i class="fa-solid fa-chart-pie"></i><a href={{ route('admin-dashboard') }}>Tableau de bord</a></li>
            {{-- <li><iclass="fasfa-users-line"></i><ahref="admin-reservation.html">Reservationclients</a></li> --}}
            <li><i class="fa-solid fa-location-pin"></i><a href="{{ route('admin-destinations') }}">Gestion des destination</a></li>
            <li class=""><i class="fa-solid fa-city"></i><a href="{{ route('admin-index-ville') }}">Gestion des villes</a></li>
            <li><i class="fa-solid fa-warehouse"></i><a href="{{ route('admin-index-gare') }}">Gestion des gares</a></li>
            {{-- <li><iclass="fa-solidfa-money-bill"></i><ahref="admin-ges-tarifs.html">Gestiondestarifs</a></li> --}}
            <li><i class="fa-solid fa-users"></i></i><a href="{{ route('admin-users') }}">Gestion des utilisateurs</a></li>
            <li class="active"><i class="fa-solid fa-user-gear"></i></i><a href="{{ route('admin-my-account') }}">Mon compte</a></li>
            <form method="POST" action={{ route('logout') }} id="form-logout">
                @csrf
                <li id="logout" onclick="event.preventDefault(); document.getElementById('form-logout').submit();"><i class="fa-solid fa-right-from-bracket"></i><a href="{{ route('logout') }}">Déconnexion</a></li>
            </form>
        </div>
    </section>

    <section id="interface">
        <div class="navigation">
            <div class="n1">
                <div>
                    <i id="menu-btn" class="fas fa-bars"></i>
                </div>
                <div class="title">
                    <h3><span>ZOE</span> <span>T & L</span></h3>
                </div>
            </div>
            <div class="profile">
                <img src="img/profile/profile.png" alt="">
            </div>
        </div>

        <h3 class="i-name">
            Mon compte
        </h3>

        <div class="my-profile">
            <div class="info-pers">
                <div class="user-profile">
                    <div class="w-100">
                        <div class="img">
                            <!--<img src="img/profile/profile.png" alt="" width="150px" height="150px">-->
                        </div>
                    </div>
                    <div class="w-100 mt-2">
                        <div class="prof row">
                            <div class="col-md-6 col-sm-12">
                                <div class="prof-form">
                                    <h5>Nom : <span>{{ $user->name }}</span></h5>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="prof-form">
                                    <h5>Email : <span>{{ $user->email }}</span></h5>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="prof-form">
                                    <h5>Numéro : <span>{{ $user->phone }}</span></h5>
                                </div>
                            </div>
                            {{--<div class="col-md-6 col-sm-12">
                                <div class="prof-form">
                                    <h5>Date de naissance : <span>1/1/1990</span></h5>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="prof-form">
                                    <h5>Ville : <span>Pointe-Noire</span></h5>
                                </div>
                            </div>--}}
                            <div class="col-md-6 col-sm-12">
                                <div class="prof-form">
                                    <h5>Rôle : <span>{{ $user->rule->name }}</span></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="info-update">
                    <button data-bs-toggle="modal" data-bs-target="#editProfile">Modifier mon profil</button>
                </div>
            </div>
        </div>

    </section>


    <!-- Modal edit profile -->
    <div class="modal fade" id="editProfile" tabindex="-1" aria-labelledby="editProfileLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editProfileLabel">Edition du profil</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-edit">
                        <form action="{{ route('admin-update-user') }}" method="POST">
                            @csrf
                            <!--<div class="user_pic">
                                <img src="img/profil-default.png" alt="" id="image_profile">
                                <label for="add_pic" id="btn-add-pic"><i class="fas fa-camera-alt"></i></label>
                                <input type="file" name="picture" id="add_pic">
                            </div>-->
                            <div class="form-group">
                                <label for="full_name">Nom et prénom</label>
                                <input type="text" name="name" id="full_name" value="{{ $user->name }}">
                            </div>
                            <div class="form-group">
                                <label for="mail">Email</label>
                                <input type="email" name="email" id="mail" value="{{ $user->email }}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="role">Rôle</label>
                                <input type="text" name="phone" id="role" value="{{ $user->rule->name }}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="phone">Téléphone</label>
                                <input type="tel" name="phone" id="phone" value="{{ $user->phone }}">
                            </div>
                            <div class="form-submit">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#editPassword"
                                    data-bs-dismiss="modal">Changer de mot de passe</a href="#">
                                <button type="submit">Enregistrer</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Modal edit profile -->

    <!-- Change password -->
    <div class="modal fade" id="editPassword" tabindex="-1" aria-labelledby="editPasswordLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editPasswordLabel">Changer mot de passe</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-edit">
                        <form action="{{ route('admin-update-password', $user->id) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="old_pwd">Ancien mot de passe</label>
                                <input type="password" name="old_pwd" id="old_pwd"
                                    placeholder="Saisir votre ancien mot de passe">
                            </div>
                            <div class="form-group">
                                <label for="pwd">Nouveau mot de passe</label>
                                <input type="password" name="pwd" id="pwd"
                                    placeholder="Saisir votre nouveau mot de passe">
                            </div>
                            <div class="form-group">
                                <label for="conf_pwd">Confirmer votre mot de passe</label>
                                <input type="password" name="conf_pwd" id="conf_pwd"
                                    placeholder="Confirmez votre nouveau mot de passe">
                            </div>
                            <div class="form-submit">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#editProfile"
                                    data-bs-dismiss="modal">Editer profil</a>
                                <button type="submit">Enregistrer</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Change password -->

    <script src={{ asset("./vendors/jquery/jquery-3.6.1.min.js") }}></script>
    <script src={{ asset("./vendors/bootstrap/js/bootstrap.bundle.min.js") }}></script>
    <script src={{ asset("./js/jquery.dataTables.min.js") }}></script>
    <script src={{ asset("./js/dataTables.bootstrap4.min.js") }}></script>
    <script src={{ asset("./js/main.js") }}></script>
</body>

</html>
