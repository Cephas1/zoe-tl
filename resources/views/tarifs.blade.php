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
                        <h2>Nos tarifs</h2>
                    </div>
                </div>
            </div>
        </div>

        <!-- Nos tarifs -->
        <section class="nos-tarifs">
            <div class="title">
                <h2>Découvrez nos différents tarifs</h2>
            </div>
            <div class="tarifs">
                @foreach($destinations as $key => $value)
                        <div class="box-tarif">
                            <div class="thum">
                                <a href="{{ route('site-create-reservation') }}">
                                    <img src="img/destination/brazzaville.jpg" alt="">
                                </a>
                            </div>
                            <div class="tarif-content">
                                <div class="location">
                                    <h4>{{ $value->ville_d }} <i class="fa fa-arrow-right"></i> {{ $value->ville_a }} </h4>
                                    <p><i class="fa-regular fa-clock"></i> {{ $value->heure_d }} - {{ $value->heure_a }}</p>
                                </div>
                                <div class="price-dest">
                                    <h3>{{ $value->price }} <span>FCFA</span></h3>
                                </div>
                            </div>
                        </div>
                @endforeach
                <!--<div class="box-tarif">
                    <div class="thum">
                        <img src="img/destination/brazzaville.jpg" alt="">
                    </div>
                    <div class="tarif-content">
                        <div class="location">
                            <h4>Pointe-Noire - Brazzaville</h4>
                            <p><i class="fa-regular fa-clock"></i> 6H - 7H</p>
                        </div>
                        <div class="price-dest">
                            <h3>15 000 <span>Fcfa</span></h3>
                        </div>
                    </div>
                </div>
                <div class="box-tarif">
                    <div class="thum">
                        <img src="img/destination/brazzaville.jpg" alt="">
                    </div>
                    <div class="tarif-content">
                        <div class="location">
                            <h4>Pointe-Noire - Brazzaville</h4>
                            <p><i class="fa-regular fa-clock"></i> 6H - 7H</p>
                        </div>
                        <div class="price-dest">
                            <h3>15 000 <span>Fcfa</span></h3>
                        </div>
                    </div>
                </div>
                <div class="box-tarif">
                    <div class="thum">
                        <img src="img/destination/brazzaville.jpg" alt="">
                    </div>
                    <div class="tarif-content">
                        <div class="location">
                            <h4>Pointe-Noire - Brazzaville</h4>
                            <p><i class="fa-regular fa-clock"></i> 6H - 7H</p>
                        </div>
                        <div class="price-dest">
                            <h3>15 000 <span>Fcfa</span></h3>
                        </div>
                    </div>
                </div>-->
            </div>
        </section>
        <!-- /Nos tarifs -->

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
                <p>&copy; Copyrights 2022, ZOE T & L. Tous droits réservés Aquila-tech.</p>
            </div>
        </footer>
        <!-- /Footer -->
    </main>
    <script src="./vendors/jquery/jquery-3.6.1.min.js"></script>
    <script src="./vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="./js/main.js"></script>
</body>

</html>
