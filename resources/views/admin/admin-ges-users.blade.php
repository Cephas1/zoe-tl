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
            <li class="active"><i class="fa-solid fa-users"></i></i><a href="{{ route('admin-users') }}">Gestion des utilisateurs</a></li>
            <li><i class="fa-solid fa-user-gear"></i></i><a href="{{ route('admin-my-account') }}">Mon compte</a></li>
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
        </div>

        <h3 class="i-name">
            Gestion des utilisateurs
        </h3>

        {{--<div class="cards row">
            <div class="col-sm-12 col-md-6 col-lg-3">
                <div class="carte">
                    <i class="fas fa-users"></i>
                    <div>
                        <h3>10</h3>
                        <span>users</span>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-3">
                <div class="carte">
                    <i class="fas fa-users"></i>
                    <div>
                        <h3>10</h3>
                        <span>users</span>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-3">
                <div class="carte">
                    <i class="fas fa-users"></i>
                    <div>
                        <h3>10</h3>
                        <span>users</span>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-3">
                <div class="carte">
                    <i class="fas fa-users"></i>
                    <div>
                        <h3>10</h3>
                        <span>users</span>
                    </div>
                </div>
            </div>
        </div>--}}

        <div class="board">
            <table width="100%" id="user-historique" class="dataTable">
                <thead>
                    <tr>
                        <td>Nom</td>
                        <td>Télephone</td>
                        <td>Role d'utilisateur</td>
                        <td>Date de création</td>
                        <td>Statut</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $key => $user)
                    <tr>
                        <td class="people">
                            <div class="people-name">
                                <h5>{{ $user->name }}</h5>
                            </div>
                        </td>
                        <td class="people-destination">
                            <h5>{{ $user->phone }}</h5>
                        </td>
                        <td class="people-date">
                            <h5>{{ $user->rule->name }}</h5>
                        </td>
                        <td class="people-count">
                            <h5>{{ $user->created_at }}</h5>
                        </td>
                        <td>
                            @if($user->actif == 0)
                                <h5>inactif</h5>
                            @elseif($user->actif == 1)
                                <h5>actif</h5>
                            @endif
                        </td>
                        <td>
                            {{--@if($user->actif == 0)
                                <a title="Activer l'utilisateur" href="{{ route('admin.user.lock', $user->id) }}"><i class="fa fa-user-lock"></i></a>
                            @elseif($user->actif == 1)
                                <a title="Désactiver l'utilisateur" href="{{ route('admin.user.lock', $user->id) }}"><i class="fa fa-user-check"></i></a>
                            @endif--}}

                            @if($user->rule_id == 2)
                                <a title="Nommer client" href="{{ route('admin-user-role', $user->id) }}"><i class="fa fa-user-crown"></i></a>
                            @elseif($user->rule_id == 2)
                                <a title="Nommer admin" href="{{ route('admin-user-role', $user->id) }}"><i class="fa fa-user"></i></a>
                            @endif

                        </td>
                    </tr>
                    @endforeach

                    {{--<tr>
                        <td class="people">
                            <img src="img/profile/profile.png" alt="">
                            <div class="people-name">
                                <h5>Alexander Poaty</h5>
                                <p>(+242) 066065050</p>
                            </div>
                        </td>
                        <td class="people-destination">
                            <h5>Brazzaville</h5>
                        </td>
                        <td class="people-date">
                            <h5>26/11/2022</h5>
                        </td>
                        <td class="people-count">
                            <h5>1</h5>
                        </td>
                        <td class="people-price">
                            <h5>15000</h5>
                        </td>
                        <td class="active">
                            <p>Reserver</p>
                        </td>
                        <td class="edit"><a href="">Edit</a></td>
                    </tr>
                    <tr>
                        <td class="people">
                            <img src="img/profile/profile.png" alt="">
                            <div class="people-name">
                                <h5>Alexander Poaty</h5>
                                <p>(+242) 066065050</p>
                            </div>
                        </td>
                        <td class="people-destination">
                            <h5>Brazzaville</h5>
                        </td>
                        <td class="people-date">
                            <h5>26/11/2022</h5>
                        </td>
                        <td class="people-count">
                            <h5>1</h5>
                        </td>
                        <td class="people-price">
                            <h5>15000</h5>
                        </td>
                        <td class="active">
                            <p>Reserver</p>
                        </td>
                        <td class="edit"><a href="">Edit</a></td>
                    </tr>
                    <tr>
                        <td class="people">
                            <img src="img/profile/profile.png" alt="">
                            <div class="people-name">
                                <h5>Alexander Poaty</h5>
                                <p>(+242) 066065050</p>
                            </div>
                        </td>
                        <td class="people-destination">
                            <h5>Brazzaville</h5>
                        </td>
                        <td class="people-date">
                            <h5>26/11/2022</h5>
                        </td>
                        <td class="people-count">
                            <h5>1</h5>
                        </td>
                        <td class="people-price">
                            <h5>15000</h5>
                        </td>
                        <td class="active">
                            <p>Reserver</p>
                        </td>
                        <td class="edit"><a href="">Edit</a></td>
                    </tr>
                    <tr>
                        <td class="people">
                            <img src="img/profile/profile.png" alt="">
                            <div class="people-name">
                                <h5>Alexander Poaty</h5>
                                <p>(+242) 066065050</p>
                            </div>
                        </td>
                        <td class="people-destination">
                            <h5>Brazzaville</h5>
                        </td>
                        <td class="people-date">
                            <h5>26/11/2022</h5>
                        </td>
                        <td class="people-count">
                            <h5>1</h5>
                        </td>
                        <td class="people-price">
                            <h5>15000</h5>
                        </td>
                        <td class="active">
                            <p>Reserver</p>
                        </td>
                        <td class="edit"><a href="">Edit</a></td>
                    </tr>
                    <tr>
                        <td class="people">
                            <img src="img/profile/profile.png" alt="">
                            <div class="people-name">
                                <h5>Alexander Poaty</h5>
                                <p>(+242) 066065050</p>
                            </div>
                        </td>
                        <td class="people-destination">
                            <h5>Brazzaville</h5>
                        </td>
                        <td class="people-date">
                            <h5>26/11/2022</h5>
                        </td>
                        <td class="people-count">
                            <h5>1</h5>
                        </td>
                        <td class="people-price">
                            <h5>15000</h5>
                        </td>
                        <td class="active">
                            <p>Reserver</p>
                        </td>
                        <td class="edit"><a href="">Edit</a></td>
                    </tr>
                    <tr>
                        <td class="people">
                            <img src="img/profile/profile.png" alt="">
                            <div class="people-name">
                                <h5>Alexander Poaty</h5>
                                <p>(+242) 066065050</p>
                            </div>
                        </td>
                        <td class="people-destination">
                            <h5>Brazzaville</h5>
                        </td>
                        <td class="people-date">
                            <h5>26/11/2022</h5>
                        </td>
                        <td class="people-count">
                            <h5>1</h5>
                        </td>
                        <td class="people-price">
                            <h5>15000</h5>
                        </td>
                        <td class="active">
                            <p>Reserver</p>
                        </td>
                        <td class="edit"><a href="">Edit</a></td>
                    </tr>
                    <tr>
                        <td class="people">
                            <img src="img/profile/profile.png" alt="">
                            <div class="people-name">
                                <h5>Alexander Poaty</h5>
                                <p>(+242) 066065050</p>
                            </div>
                        </td>
                        <td class="people-destination">
                            <h5>Brazzaville</h5>
                        </td>
                        <td class="people-date">
                            <h5>26/11/2022</h5>
                        </td>
                        <td class="people-count">
                            <h5>1</h5>
                        </td>
                        <td class="people-price">
                            <h5>15000</h5>
                        </td>
                        <td class="active">
                            <p>Reserver</p>
                        </td>
                        <td class="edit"><a href="">Edit</a></td>
                    </tr>--}}
                </tbody>
            </table>
        </div>
    </section>

    <script src={{ asset("./vendors/jquery/jquery-3.6.1.min.js") }}></script>
    <script src={{ asset("./vendors/bootstrap/js/bootstrap.bundle.min.js") }}></script>
    <script src={{ asset("./js/jquery.dataTables.min.js") }}></script>
    <script src={{ asset("./js/dataTables.bootstrap4.min.js") }}></script>
    <script src={{ asset("./js/main.js") }}></script>
</body>

</html>
