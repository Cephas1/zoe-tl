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
            <li class="active"><i class="fa-solid fa-chart-pie"></i><a href={{ route('admin-dashboard') }}>Tableau de bord</a></li>
            {{-- <li><iclass="fasfa-users-line"></i><ahref="admin-reservation.html">Reservationclients</a></li> --}}
            <li><i class="fa-solid fa-location-pin"></i><a href="{{ route('admin-destinations') }}">Gestion des destination</a></li>
            {{-- <li><iclass="fa-solidfa-money-bill"></i><ahref="admin-ges-tarifs.html">Gestiondestarifs</a></li> --}}
            <li><i class="fa-solid fa-users"></i></i><a href="{{ route('admin-users') }}">Gestion des utilisateurs</a></li>
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
            <div class="profile">
                <form method="POST" action={{ route('logout') }} id="form-logout">
                    @csrf
                    <a id="logout" onclick="event.preventDefault(); document.getElementById('form-logout').submit();" class="button"><i class="fa-solid fa-right-from-bracket"></i><a href="{{ route('logout') }}">Se déconnecter</a></li>
                </form>
            </div>
        </div>

        <h3 class="i-name">
            Tableau de bord
        </h3>

        <div class="cards row">
            <div class="col-sm-12 col-md-6 col-lg-3">
                <div class="carte">
                    <i class="fas fa-users"></i>
                    <div>
                        <h3>{{ $reservations==null? 0 : $reservations }}</h3>
                        <span>Réservations au total</span>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-3">
                <div class="carte">
                    <i class="fa-solid fa-check-to-slot"></i>
                    <div>
                        <h3>{{ $reservations_validees==null? 0 : $reservations_validees }}</h3>
                        <span>Réservations validées</span>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-3">
                <div class="carte">
                    <i class="fas fa-eye"></i>
                    <div>
                        <h3>{{ $reservations_en_attente==null? 0 : $reservations_en_attente }}</h3>
                        <span>Réservations en attente</span>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-3">
                <div class="carte">
                    <i class="fas fa-ban"></i>
                    <div>
                        <h3>{{ $reservations_annulees==null? 0 : $reservations_annulees }}</h3>
                        <span>Réservations annulées</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="board">
            <table width="100%" id="user-historique" class="dataTable">
                <thead>
                    <tr>
                        <td>Nom</td>
                        <td>Itinéraire</td>
                        <td>Date depart</td>
                        <td>Places</td>
                        <td>Tarifs</td>
                        <td>Statut</td>
                        <td>Demandeur</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($clients as $key => $value)
                        @foreach($value as $key2 => $value2)
                            <tr>
                                <td class="people">
                                    {{--<img src="{{ asset('img/profile/profile.png') }}" alt="">--}}
                                    <div class="people-name">
                                        <h5>{{ $key }}</h5>
                                        <p>{{ $value2->number }}</p>
                                    </div>
                                </td>
                                <td class="people-destination">
                                    <h5>{{ $value2->destination_id->ville_d }} <i class="fa fa-arrow-right"></i> {{ $value2->destination_id->ville_a }}</h5>
                                </td>
                                <td class="people-date">
                                    <h5>{{ $value2->date_depart }}</h5>
                                </td>
                                <td class="people-count">
                                    <h5>{{ $value2->places }}</h5>
                                </td>
                                <td class="people-price">
                                    <h5>{{ $value2->price }} FCFA</h5>
                                </td>
                                <td class="active">
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <select name="city_start" id="city_start">
                                                @if ($value2->state==0)
                                                    <option value=""><p class="active">En attente</p></option>
                                                @elseif ($value2->state==1)
                                                    <option value=""><p class="active">Validé</p></option>
                                                @elseif ($value2->state==null)
                                                    <option value=""><p class="wait">Annulé</p></option>
                                                @endif
                                                <option><a href="{{ url('admin-change-status', [$value2->id, 1]) }}">Valider</a></option>
                                                <option><a href="{{ url('admin-change-status', [$value2->id, null]) }}">Annuler</a></option>
                                            </select>
                                        </div>
                                    </div>
                                </td>
                                <td class="people">
                                    <div class="people-name">
                                        <h5>{{ $value2->user_id->name }}</h5>
                                        <p>{{ $value2->user_id->phone }}</p>
                                    </div>
                                </td>
                                {{--<td class="edit">
                                    <!--<a href=""><i class="fa fa-eye"></i></a>-->
                                    <a href=""><i class="fa fa-edit"></i></a>
                                </td>--}}
                            </tr>
                        @endforeach
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
