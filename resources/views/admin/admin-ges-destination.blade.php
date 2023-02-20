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
            <li ><i class="fa-solid fa-chart-pie"></i><a href={{ route('admin-dashboard') }}>Tableau de bord</a></li>
            {{-- <li><iclass="fasfa-users-line"></i><ahref="admin-reservation.html">Reservationclients</a></li> --}}
            <li class="active"><i class="fa-solid fa-location-pin"></i><a href="{{ route('admin-destinations') }}">Gestion des destination</a></li>
            {{-- <li><iclass="fa-solidfa-money-bill"></i><ahref="admin-ges-tarifs.html">Gestiondestarifs</a></li> --}}
            <li><i class="fa-solid fa-users"></i></i><a href="{{ route('admin-users') }}">Gestion des utilisateurs</a></li>
            <li><i class="fa-solid fa-user-gear"></i></i><a href="{{ route('admin-users') }}">Mon compte</a></li>
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
            Gestion des destination
        </h3>

        <div class="btn-add-dest">
            <button data-bs-toggle="modal" data-bs-target="#addDest">Ajouter une destination</button>
        </div>

        <div class="board">
            <table width="100%" id="user-historique" class="dataTable">
                <thead>
                    <tr>
                        <td>Ville de départ</td>
                        <td>Ville d'arrivée</td>
                        <td>Heure de départ</td>
                        <td>Heure d'arrivée</td>
                        <td>Prix</td>
                        <td>Actions</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($destinations as $key => $value)
                        <tr>
                            <td class="people-name">
                                <h5>{{ $value->ville_d }}</h5>
                            </td>

                            <td class="people-destination">
                                <h5>{{ $value->ville_a }}</h5>
                            </td>

                            <td class="people-destination">
                                <h5>{{ $value->heure_d }}</h5>
                            </td>

                            <td class="people-destination">
                                <h5>{{ $value->heure_a }}</h5>
                            </td>

                            <td class="people-date">
                                <h5>{{ $value->price }}</h5>
                            </td>

                            <td class="people-date">
                                <h5>
                                    <a data-bs-toggle="modal" data-bs-target="#editDest_{{ $value->id }}" href=""><i class="fa fa-edit"></i></a>
                                    <a href=""><i class="fa fa-trash"></i></a>
                                </h5>
                            </td>
                        </tr>
                        <!-- Modal edit destination -->
                        <div class="modal fade" id="editDest_{{ $value->id }}" tabindex="-1" aria-labelledby="editDestLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editDestLabel">Modifier un itinéraire</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-edit">
                                            <form method="POST" action="{{ route('admin-edit-destination') }}">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="name">Ville de départ</label>
                                                    <select name="ville_d" id="name">
                                                        <option value="">Choisissez votre ville de départ</option>
                                                        @foreach($villes as $val)
                                                            <option value="{{ $val->id }}">{{ $val->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="description">Ville d'arrivée</label>
                                                    <select name="ville_a" id="description">
                                                        <option value="">Choisissez votre ville d'arrivée</option>
                                                        @foreach($villes as $val)
                                                            <option value="{{ $val->id }}">{{ $val->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="description">Heure de départ</label>
                                                    <input type="time" name="heure_d" id="description" value="{{ $value->heure_d }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="description">Heure d'arrivée</label>
                                                    <input type="time" name="heure_a" id="description" value="{{ $value->heure_a }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="zone">Prix</label>
                                                    <input type="number" name="price" id="zone" value="{{ $value->price }}">
                                                </div>
                                                <div class="form-submit solo">
                                                    <button class="solo" type="submit">Ajouter</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Modal edit destination -->
                    @endforeach

                </tbody>
            </table>
        </div>

        <div class="row">
            <div class="board col-sm-12 col-md-9 col-lg-12">
                <h3 class="i-name">
                    Gestion des Villes
                </h3>
                <table class="col-sm-12 col-md-9 col-lg-6" with="50%">
                    <thead>
                        <tr>
                            <td>Nom</td>
                            <td>Actions</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($villes as $ville)
                            <tr>
                                <td>{{ $ville->name }}</td>
                                <td>
                                    <a data-bs-toggle="modal" data-bs-target="#editVille_{{ $ville->id }}" href=""><i class="fa fa-edit"></i></a>
                                    <a href="{{ route('admin-delete-ville', $ville->id) }}"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            <!-- Modal edit gare -->
                            <div class="modal fade" id="editVille_{{ $ville->id }}" tabindex="-1" aria-labelledby="editVilleLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="addDestLabel">Modifier une ville</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-edit">
                                                <form action="{{ route('admin-edit-ville', $ville->id) }}" method="POST">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label for="zone">Nom</label>
                                                        <input type="text" name="name" id="zone" value="{{ $ville->name }}">
                                                    </div>
                                                    <div class="form-submit solo">
                                                        <button class="solo" type="submit">Ajouter</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Modal edit gare -->
                        @endforeach
                    </tbody>
                </table>

                <h3 class="i-name">
                    Gestion des gares
                </h3>
                <table class="col-sm-12 col-md-9 col-lg-6" with="50%">
                    <thead>
                        <tr>
                            <td>Nom</td>
                            <td>Actions</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($gares as $gare)
                            <tr>
                                <td>{{ $gare->name }}</td>
                                <td>
                                    <a data-bs-toggle="modal" data-bs-target="#editGare_{{ $gare->id }}" href=""><i class="fa fa-edit"></i></a>
                                    <a href=""><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            <!-- Modal edit gare -->
                            <div class="modal fade" id="editGare_{{ $gare->id }}" tabindex="-1" aria-labelledby="editGareLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="addDestLabel">Modifier une gare</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-edit">
                                                <form action="{{ route('admin-edit-gare', $gare->id) }}" method="POST">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label for="zone">Nom</label>
                                                        <input type="text" name="name" id="zone" value="{{ $gare->name }}">
                                                    </div>
                                                    <div class="form-submit solo">
                                                        <button class="solo" type="submit">Ajouter</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Modal edit gare -->
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Modal add destination -->
        <div class="modal fade" id="addDest" tabindex="-1" aria-labelledby="addDestLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addDestLabel">Ajouter un itinéraire</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-edit">
                            <form action="{{ route('admin-create-destination') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Ville de départ</label>
                                    <select name="ville_d" id="name" required>
                                        <option value="">Choisissez votre ville de départ</option>
                                        @foreach($villes as $value)
                                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="description">Ville d'arrivée</label>
                                    <select name="ville_a" id="description" required>
                                        <option value="">Choisissez votre ville d'arrivée</option>
                                        @foreach($villes as $value)
                                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="description">Heure de départ</label>
                                    <input type="time" name="heure_d" id="description" required>
                                </div>
                                <div class="form-group">
                                    <label for="description">Heure d'arrivée</label>
                                    <input type="time" name="heure_a" id="description" required>
                                </div>
                                <div class="form-group">
                                    <label for="zone">Prix</label>
                                    <input type="number" name="price" id="zone" required>
                                </div>
                                <div class="form-submit solo">
                                    <button class="solo" type="submit">Ajouter</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Modal add destination -->

    </section>

    <script src={{ asset("./vendors/jquery/jquery-3.6.1.min.js") }}></script>
    <script src={{ asset("./vendors/bootstrap/js/bootstrap.bundle.min.js") }}></script>
    <script src={{ asset("./js/jquery.dataTables.min.js") }}></script>
    <script src={{ asset("./js/dataTables.bootstrap4.min.js") }}></script>
    <script src={{ asset("./js/main.js") }}></script>
</body>

</html>
