<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('./vendors/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('./vendors/font-awesome/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('./css/style.css') }}">
  <link rel="shortcut icon" href="{{ asset('./img/fav-icon.png') }}" type="image/x-icon">
  <title>ZOE | Transport et logistique</title>
</head>

<body>

  <!-- Loader -->
  <!-- <div class="loader">
    <img src="./img/loader.gif" alt="loader-gif">
  </div> -->
  <!-- /Loader -->
  <main>
    <!-- Menu de navigation -->
    <header class="header">
        <nav>
            <a href="{{ route('index') }}">
                <img src="{{ asset('img/logo.png') }}" alt="" class="logo">
            </a>
            <button class="menu-toggle" id="menu-toggle">
                <i class="fas fa-bars"></i>
            </button>
            <ul class="menu-lg">
                <li><a href={{ route('index') }}>Accueil</a></li>
                <li><a href={{ route('site-tarifs') }}>Nos Tarifs</a></li>
                <li><a href={{ route('site-create-reservation') }}>Réserver</a></li>
                <li><a href={{ route('contact') }}>Contact</a></li>
            </ul>
            {{--@guest
                <a href={{ route('login') }} class="button">Connexion</a>
            @endguest--}}
            @auth
                <form method="POST" action={{ route('logout') }} id="form-logout">
                    @csrf
                    {{--<li ><i class="fa-solid fa-right-from-bracket"></i><a href="{{ route('logout') }}">Déconnexion</a></li>--}}
                    <a href={{ route('logout') }} class="button" id="logout" onclick="event.preventDefault(); document.getElementById('form-logout').submit();">Se déconnecter</a>
                </form>
            @endauth
        </nav>
        <div class="nav-mobile">
            <div class="btn-close-menu">
                <button id="close-btn">
                    <i class="fas fa-close"></i>
                </button>
            </div>
            <div class="menu-wrapper" id="menu-wrapper">
                <ul>
                    <li><a href="{{ route('index') }}">Accueil</a></li>
                    <li><a href="{{ route('site-tarifs') }}">Nos Tarifs</a></li>
                    <li><a href={{ route('site-create-reservation') }}>Réserver</a></li>
                    <li><a href={{ route('contact') }}>Contact</a></li>
                </ul>
            </div>
    </header>
    <!-- /Menu de navigation -->

    <div class="banniere" data-setbg="{{ asset('img/ban.jpg') }}">
      <div class="content">
        <div class="reservation">
          <div class="title">
            <h2>Espace client</h2>
          </div>
        </div>
      </div>
    </div>

    <!-- dash-user -->
    <div class="container user-dash" id="user-dash">
      <div class="user-profil row">
        {{-- <div class="col-sm-12 col-md-3 col-lg-2 mb-3 mb-md-0">
            <div class="img-profil">
                <img src="{{ asset('img/profil-default.png') }}" alt="">
            </div>
        </div> --}}
        <div class="col-sm-12 col-md-9 col-lg-12">
            <div class="info">
                <div class="top-info text-center text-md-start">
                    <h5>{{ Auth::user()->name }}</h5>
                </div>
                <div class="bottom-info pt-2">
                    <div class="row w-100">
                        <div class="col-4 col-sm-4 col-md-3">
                            <div class="nbr-info">
                                <b>Total des réservations</b>
                                <span>{{ $reservations }}</span>
                            </div>
                        </div>
                        <div class="col-4 col-sm-4 col-md-3">
                            <div class="nbr-info">
                                <b>Réservations validées</b>
                                <span>{{ $reservations_validees }}</span>
                            </div>
                        </div>
                        <div class="col-4 col-sm-4 col-md-3">
                            <div class="nbr-info last">
                                <b>Réservations en attente</b>
                                <span>{{ $reservations_en_attente }}</span>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-3 mt-3 mt-md-0">
                            <div class="nbr-info last">
                                <b>Réservations en annulées</b>
                                <span>{{ $reservations_annulees }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
      <div class="user-historique">
        <div class="title">
            <h3>Votre historique de réservations</h3>
        </div>
        @if (Session::has('status'))
            <div class="alert alert-success">{{ Session::get('status') }}</div>
        @endif
        <div class="historique">
            <div class="table-responsive">
                <table id="user-historique" class="table custom-table table-striped datatable">
                    <thead>
                        <tr>
                            <th class="text-center">Date de voyage</th>
                            <th class="text-center">Voyageur</th>
                            <th class="text-center">Itinéraire</th>
                            <th class="text-center">Date départ</th>
                            <th class="text-center">Nombre de places</th>
                            <th class="text-center">Prix</th>
                            <th class="text-center">status</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($travels as $key => $value)
                            <tr>
                                <td class="text-center">
                                    {{ $value->created_at }}
                                </td>
                                <td class="text-center">
                                    {{ $value->name }}
                                </td>
                                <td class="text-center">{{ $value->destination->ville_d }} <i class="fa fa-arrow-right"></i> {{ $value->destination->ville_a }}</td>
                                <td class="text-center">
                                    {{ $value->date_depart }}
                                </td>
                                <td class="text-center">{{ $value->places }}</td>
                                <td class="text-center">{{ $value->price }} FCFA</td>
                                <td class="text-center">
                                    @if($value->state === 0)
                                        En cours
                                    @elseif($value->state === 1)
                                        Validé
                                    @elseif($value->state == null)
                                        Annulé
                                    @endif
                                </td>
                                <td class="text-center"><a data-bs-toggle="modal" data-bs-target="#revokeTravel" title="Annuler ma reservation" href=""><i class="fa fa-trash"></i></a></td>
                                <div class="modal fade" id="revokeTravel" tabindex="-1" aria-labelledby="revokeTravel" aria-hidden="true">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel">Êtes-vous sûr de vouloir annuler votre réservation ?</h5>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                          <div class="login">
                                            <form action="{{ route('client-cancel-travel', $value->id) }}" method="GET">
                                              @csrf
                                              <div class="form-submit">
                                                <button type="submit">Annuler ma réservation <i class="fa-solid fa-right-to-bracket"></i></button>
                                              </div>
                                            </form>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                </div>
                            </tr>
                        @endforeach
                        {{--<tr>
                            <td>
                                25/10/2022
                            </td>
                            <td>Dolisie</td>
                            <td>
                                1/11/2022
                            </td>
                            <td>1</td>
                            <td>15000 xaf</td>
                            <td>Réserver</td>
                        </tr>
                        <tr>
                            <td>
                                31/10/2022
                            </td>
                            <td>Brazzaville</td>
                            <td>
                                10/11/2022
                            </td>
                            <td>1</td>
                            <td>15000 xaf</td>
                            <td>Réserver</td>
                        </tr>
                        <tr>
                            <td>
                                11/11/2022
                            </td>
                            <td>Brazzaville</td>
                            <td>
                                16/11/2022
                            </td>
                            <td>1</td>
                            <td>15000 xaf</td>
                            <td>Réserver</td>
                        </tr>--}}
                    </tbody>
                </table>
            </div>
        </div>
      </div>
    </div>
    <!-- /dash-user -->

    <!-- Modal revoke travel -->
    <div class="modal fade" id="login" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Êtes-vous sûr de vouloir annuler votre réservation ?</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="login">
              <form action="">
                @csrf
                <div class="form-submit">
                  <button type="submit">Annuler ma réervation <i class="fa-solid fa-right-to-bracket"></i></button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /Modal revoke travel -->

    <!-- Modal Register -->
    <div class="modal fade" id="register" tabindex="-1" aria-labelledby="registrModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">S'enregister</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="login">
              <form action="">
                <div class="form-group">
                  <label for="lastname">Nom</label>
                  <input type="text" name="lastname" id="lastname" placeholder="Nom">
                </div>
                <div class="form-group">
                  <label for="firstname">Prénom</label>
                  <input type="text" name="firstname" id="firstname" placeholder="Prénom">
                </div>
                <div class="form-group">
                  <label for="firstname">Email</label>
                  <input type="email" name="email" id="email" placeholder="Email">
                </div>
                <div class="form-group">
                  <label for="pwd">Mot de passe</label>
                  <input type="password" name="pwd" id="pwd" placeholder="Mot de passe">
                </div>
                <div class="form-group">
                  <label for="conf-pwd">Confirmez mot de passe</label>
                  <input type="password" name="conf-pwd" id="conf-pwd" placeholder="Confirmez mot de passe">
                </div>
                <div class="form-group-check">
                  <input type="checkbox" name="user-cond" id="user-cond">
                  <label for="user-cond">J'accepte <a href="javascrip:void(0);">les conditions d'utilisation</a></label>
                </div>
                <div class="form-submit">
                  <button>S'inscire</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /Modal Register -->

    <!-- Footer -->
    <footer class="menu mt-4 px-3 pt-5 pb-3 text-center">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <div class="footer-title">
                        Qui sommes-nous ?
                    </div>
                    <div class="footer-description">
                        ZOE T & L est entreprise de voyage basée sur le Transport routier </br>
                        de personnes et marchandises.
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <div class="footer-title">
                        ZOE T & L
                    </div>
                    <div class="footer-description">
                        <ul class="navbar-nav">
                            <li class="footer-list">
                                <a class="footer-link" aria-current="page" href={{route('index')}}>Accueil</a>
                            </li>
                            <li class="footer-list">
                                <a class="footer-link" href={{ route('site-tarifs') }}>Nos Tarifs</a>
                            </li>
                            <li class="footer-list">
                                <a class="footer-link" href={{ route('site-create-reservation') }}>Résever</a>
                            </li>
                            <li class="footer-list">
                                <a class="footer-link" href={{ route('contact') }}>Contact</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <div class="footer-title">
                        Nos zone de servies
                    </div>
                    <div class="footer-description">
                        <ul class="navbar-nav">
                            @foreach($villes as $value)
                                <li class="footer-list">
                                    {{ $value->name }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright">
            <p>&copy; Copyrights 2022 ZOE T&L, tout droits réservés. Conçu et réalisé par : <a href="https://aquila-tech.cg">Aquila-Tech</a>.</p>
        </div>
    </footer>
    <!-- /Footer -->
  </main>
  <script src="{{ asset('./vendors/jquery/jquery-3.6.1.min.js') }}"></script>
  <script src="{{ asset('./vendors/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('./js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('./js/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('./js/main.js') }}"></script>
</body>

</html>
