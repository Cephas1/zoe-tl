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
                    <img src="img/logo.png" alt="" class="logo">
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
                @guest
                    <a href={{ route('login') }} class="button">Connexion</a>
                @endguest
                @auth
                    <a href={{ ((Auth::user()->rule_id <=2)? (route('admin-dashboard')) : ((Auth::user()->rule_id ==3)? (route('client-dashboard')) : (route('client-dashboard')))) }} class="button">Dashboard</a>
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

        <div class="banniere" data-setbg="img/ban.jpg">
            <div class="content">
                <div class="reservation">
                    <div class="title">
                        <h2>Réservation</h2>
                    </div>
                </div>
            </div>
        </div>

        @if (Session::has('status'))
            <div class="alert alert-info">{{ Session::get('status') }}</div>
        @endif

        <!-- reservation -->
        <!-- <div class="container com-zephir">
            <div>
                <h5>Réserver dès maintenant</h5>
                <form action="" class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="full_name">Nom complet</label>
                            <input type="text" id="full_name" name="full_name">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="phone">Téléphone</label>
                            <input type="tel" id="phone" name="phone">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="city_start">Départ</label>
                            <select name="city_start" id="city_start">
                                <option value="0">Sélectionner une ville</option>
                                <option value="1">Pointe-Noire</option>
                                <option value="2">Brazzaville</option>
                                <option value="3">Dolisie</option>
                                <option value="4">Nkayi</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="gare_start">Gare de départ</label>
                            <select name="gare_start" id="gare_start">
                                <option value="0">Sélectionner une gare</option>
                                <option value="1">OCH</option>
                                <option value="2">NGOYO</option>
                                <option value="3">OUENZE</option>
                                <option value="4">MFILOU</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="city_end">Destination</label>
                            <select name="city_end" id="city_end">
                                <option value="0">Sélectionner une ville</option>
                                <option value="1">Pointe-Noire</option>
                                <option value="2">Brazzaville</option>
                                <option value="3">Dolisie</option>
                                <option value="4">Nkayi</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="gare_start">Gare d'arrivée'</label>
                            <select name="gare_start" id="gare_start">
                                <option value="0">Sélectionner une gare</option>
                                <option value="1">OCH</option>
                                <option value="2">NGOYO</option>
                                <option value="3">OUENZE</option>
                                <option value="4">MFILOU</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="date_start">Date départ</label>
                            <input type="date" id="date_start" name="date_start">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nbr_passager">Nombre de passager</label>
                            <input type="number" min="1" id="nbr_passager" name="nbr_passager">
                        </div>
                    </div>
                    <div class="form-submit">
                        <button type="submit">Réserver</button>
                    </div>
                </form>
            </div>
        </div> -->
        <div class="reserved container com-zephir">
            <h5>Réserver dès maintenant</h5>
            <form action="{{ route('post-reservation') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="name">Nom complet</label>
                            <input type="text" name="name" id="" placeholder="Ex : SITA Paul" required>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="number">Numéro</label>
                            <input type="text" name="number" id="" placeholder="Ex : 06 606 80 80" required>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="">Itinéraire</label>
                            <select name="destination_id" id="itineraire" required onchange="sectionTotal()">
                                <option value="">Choisissez un itinéraire</option>
                                @for($i=0; $i<count($reservations); $i++)
                                    <option value="{{ $reservations[$i]->id }}">{{ $reservations[$i]->ville_d }} <i class="fa fa-arrow-right"></i> {{ $reservations[$i]->ville_a }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="date_depart">Date départ</label>
                            <input type="date" name="date_depart" id="" required>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="gare_d">Gare départ</label>
                            <select name="gare_d" id="" required>
                                <option value="">Choisissez votre gare de départ</option>
                                @foreach($gares as $value)
                                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="gare_a">Gare d'arrivée</label>
                            <select name="gare_a" id="" required>
                                <option value="">Choisissez votre gare de destination</option>
                                @foreach($gares as $value)
                                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="">Prix</label>
                            <input type="text" name="" id="price" disabled onchange="sectionTotal()" value="15000" required>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="passager">Nombre de passager</label>
                            <input type="number" name="passager" id="passager" min="1" onchange="sectionTotal()" required>
                        </div>
                    </div>
                </div>
                <div class="section-total">
                    <div>
                        <div class="amount">
                            <h5>Nombre de passager : <span id="nbr_passager">0</span></h5>
                            <h5>Total : <span name="price" id="total_reservation">0</span> Xaf</h5>
                        </div>
                        <div class="submit">
                            <button type="submit">Enregistrer</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- /reservation -->

        <!-- Footer -->
        <footer class="menu mt-4 px-3 pt-5 pb-3 text-center">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-4 col-lg-4">
                        <div class="footer-title">
                            Qui sommes-nous ?
                        </div>
                        <div class="footer-description">
                            ZOE T & L est agence de voyage basé sur le Transport routier.
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
                <p>&copy; Copyrights, ZOE T & L. Tous droits réservés.</p>
            </div>
        </footer>
        <!-- /Footer -->
    </main>
    <script src={{ asset("./vendors/jquery/jquery-3.6.1.min.js") }}></script>
    <script src={{ asset("./vendors/bootstrap/js/bootstrap.bundle.min.js") }}></script>
    <script src={{ asset("./js/main.js") }}></script>
</body>

</html>
