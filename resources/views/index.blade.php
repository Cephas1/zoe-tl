<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href={{ asset("./vendors/bootstrap/css/bootstrap.min.css") }}>
    <link rel="stylesheet" href={{ asset("./vendors/font-awesome/css/all.min.css") }}>
    <link rel="stylesheet" href={{ asset("./css/style.css") }}>
    <link rel="shortcut icon" href={{ "./img/fav-icon.png"  }} type="image/x-icon">
    <title>ZOE | Transport et logistique</title>
</head>

<body>

    <!-- Menu de navigation -->
    <div class="hero">
        <nav>
            <a href="{{ route('index') }}">
                <img src={{ asset("img/logo.png") }} alt="" class="logo">
            </a>
            <button class="menu-toggle" id="menu-toggle">
                <i class="fas fa-bars"></i>
            </button>
            <ul class="menu-lg">
                <li><a href="{{ route('index') }}">Accueil</a></li>
                <li><a href="{{ route('site-tarifs') }}">Nos Tarifs</a></li>
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
        <div class="content">
            <h1>Bienvenue chez <span>ZOE</span></h1>
            <h3>Profitez d'un magnifique voyage avec nous !</h3>
            <a href={{ route('site-create-reservation') }} class="button">Résever maintenant</a>
        </div>
    </div>
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
                <li><a href="{{ route('site-create-reservation') }}">Réserver</a></li>
                <li><a href="{{ route('contact') }}">Contact</a></li>
                @guest
                    <a href={{ route('login') }} class="button">Connexion</a>
                @endguest
                @auth
                    <a href={{ (Auth::user()->rule_id <=2? (route('admin-dashboard')) : ((Auth::user()->rule_id ==3)? (route('client-dashboard')) : (route('client-dashboard')))) }} class="button">Dashboard</a>
                @endauth
            </ul>
        </div>
    </div>
    <!-- /Menu de navigation -->


    <!-- A propos de zoe -->
    <section class="about">
        <div class="main">
            <img src="img/about.png" alt="">
            <div class="about-text">
                <h2>Qui sommes-nous?</h2>
                <h5> ZOE <span>Transport</span> & <span>Logistique</span></h5>
                <p>Nous sommes une entreprise novatrice dont le secteur d'activités
                    est le transport routier de passagers et de marchandises!
                    Nos voyages sont d'un confort sans pareil
                    avec des prix défiant toute concurrence.
                    Nous sommes également les premiers sur l'étendue du térritoire Congolais à
                    disposer de bus de voyages équipés d'internet haut débit.
                </p>
                <a href={{ route('contact') }} class="button">En savoir plus !</a>
            </div>
        </div>
    </section>
    <!-- /A propos de zoe -->

    <!-- loop -->
    <section class="loop">
        <video autoplay muted loop id="v1-loop">
            <source src="img/ban.mp4" type="video/mp4">
        </video>
        <!-- Services -->
        <div class="service">
            <div class="title">
                <h2>Nos Services</h2>
            </div>
            <div class="box">
                <div class="card-box">
                    <i class="fa-solid fa-bus"></i>
                    <h5>Transport de Passagers</h5>
                    <div class="pra">
                        <p>Nous garantissons le voyage de nos passagers en toute sécurité avec un maximum de confort.
                            La sécurité et le respect des horaires sont nos priorités.
                        </p>
                        <!-- <p><a href="" class="button">Lire la suite</a></p> -->
                    </div>
                </div>
                <div class="card-box">
                    <i class="fa-solid fa-truck"></i>
                    <h5>Transport de colis</h5>
                    <div class="pra">
                        <p>Pour transporter tous vos colis sur l'étendue du territoire national, pensez à nous.
                            Nous assurons le transport de colis à coups raisonnables et en toute sécurité.
                        </p>
                        <!-- <p><a href="" class="button">Lire la suite</a></p> -->
                    </div>
                </div>
            </div>
        </div>
        <!-- /Services -->
    </section>
    <!-- /loop -->

    <!-- Nos destinations -->
    <section class="destination">
        <div class="title">
            <h2>Nos itinéraires de voyages</h2>
        </div>
        <div class="destination-content">
            {{-- dd($destinations) --}}
            @foreach ($destinations as $key => $destination)
                <a href={{ route('site-create-reservation') }}>
                    <div class="col-content">
                        <img src="img/destination/paysage_{{ $key<10? $key+1 : 10 }}.jpg" alt="">
                        <h5>{{ $destination->ville_d }} <i class="fa fa-arrow-right"></i> {{ $destination->ville_a }}</h5>
                        <p>{{ $destination->price }} FCFA</p>
                    </div>
                </a>
            @endforeach
        </div>
    </section>
    <!-- /Nos destinations -->

    <!-- Footer -->
    <footer class="menu mt-4 px-3 pt-5 pb-3 text-center">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <div class="footer-title">
                        Qui sommes-nous ?
                    </div>
                    <div class="footer-description">
                        ZOE T & L est société de voyage basée sur le transport routier.
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
                            <!--<li class="footer-list">
                                Brazzaville
                            </li>
                            <li class="footer-list">
                                Ouesso
                            </li>-->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright">
            <p>&copy; Copyrights 2022, ZOE T & L. Tous droits réservés</p> <p>Designé par <a href="https://aquila-tech.cg">Aquila-tech</a></p>
        </div>
    </footer>
    <!-- /Footer -->

    <script src={{ asset("vendors/jquery/jquery-3.6.1.min.js") }}></script>
    <script src={{ asset("vendors/bootstrap/js/bootstrap.bundle.min.js") }}></script>
    <script src={{ asset("vendors/font-awesome/js/all.min.js") }}></script>
    <script src={{ asset("js/main.js") }}></script>
</body>

</html>
