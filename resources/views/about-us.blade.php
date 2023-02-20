<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('vendors/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('vendors/font-awesome/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <link rel="shortcut icon" href="{{ asset('img/fav-icon.png') }}" type="image/x-icon">
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
      <nav class="navbar navbar-expand-lg menu">
        <div class="container-fluid">
          <a class="nav-logo" href="index.html">ZOE TRANSPORT & LOGISTIQUE</a>
          <button class="navbar-toggler btn-shop" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="fa-solid fa-bars"></span>
          </button>
          <div class="collapse navbar-collapse d-lg-flex justify-content-end" id="navbarNav">
            <div class="row w-75">
              <div class="col-md-8">
                <ul class="navbar-nav">
                  <li class="nav-list">
                    <a class="nav-link-zoe" href="{{ route('index') }}">Accueil</a>
                  </li>
                  <li class="nav-list">
                    <a class="nav-link-zoe active" aria-current="page" href="{{ route('about-us') }}">Qui sommes-nous</a>
                  </li>
                  <li class="nav-list">
                    <a class="nav-link-zoe" href="{{ route('reserver') }}">Réserver</a>
                  </li>
                  <li class="nav-list">
                    <a class="nav-link-zoe" href="{{ route('contact') }}">Contact</a>
                  </li>
                </ul>
              </div>
              <div class="col-md-4">
                @auth()
                    <ul class="navbar-nav justify-content-end">
                        <li class="nav-list">
                        <a class="nav-link-zoe" href="#">Mon tableau de bord</a>
                        </li>
                        <!--<li class="nav-list">
                        <a class="nav-link-zoe" href="javascript:void(0);" data-bs-toggle="modal"
                            data-bs-target="#register">S'inscrire</a>
                        </li>-->
                        <!-- <li class="nav-list">
                        <a class="nav-link-zoe" href="#">Tableau de bord</a>
                        </li> -->
                    </ul>
                @endauth
                @guest
                    <ul class="navbar-nav justify-content-end">
                        <li class="nav-list">
                        <a class="nav-link-zoe" href="javascript:void(0);" data-bs-toggle="modal"
                            data-bs-target="#login">Connexion</a>
                        </li>
                        <li class="nav-list">
                        <a class="nav-link-zoe" href="javascript:void(0);" data-bs-toggle="modal"
                            data-bs-target="#register">S'inscrire</a>
                        </li>
                        <!-- <li class="nav-list">
                        <a class="nav-link-zoe" href="#">Tableau de bord</a>
                        </li> -->
                    </ul>
                @endguest
              </div>
            </div>
          </div>
        </div>
      </nav>
    </header>
    <!-- /Menu de navigation -->

    <div class="banniere" data-setbg="img/ban.jpg">
      <div class="content">
        <div class="reservation">
          <div class="title">
            <h2>Qui sommes-nous ?</h2>
          </div>
        </div>
      </div>
    </div>

    <!-- about-us -->
    <div class="container about-us">
      <div class="description">
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nobis, harum quis laudantium amet ipsa veniam corrupti dolor voluptate omnis vitae cum in inventore possimus tempora voluptas expedita. Repellendus, accusamus consequuntur!
        Quos itaque nobis iure accusantium harum dolore voluptatibus expedita facere, quis, deserunt laboriosam quod rem et. Nisi doloribus obcaecati quae dolore necessitatibus eius architecto, fugit nobis ea maiores quam ab?
        Quaerat velit cumque deserunt in eos consequuntur odio veritatis aperiam minima nobis adipisci iusto quae, sapiente perferendis non! Magni ipsa quisquam dignissimos sint doloremque tenetur libero cupiditate dolore nemo eligendi?</p>
      </div>
    </div>
    <!-- /about-us -->

    <!-- Modal Login -->
    <div class="modal fade" id="login" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">S'identifier</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="login">
              <form action="">
                <div class="form-group">
                  <label for="fullname">Nom d'utilisateur</label>
                  <input type="text" name="fullname" id="fullname" placeholder="Nom d'utilisateur">
                </div>
                <div class="form-group">
                  <label for="fullname">Mot de passe</label>
                  <input type="password" name="fullname" id="fullname" placeholder="Mot de passe">
                </div>
                <div class="forgot">
                  <a href="">Mot de passe oublié ?</a>
                </div>
                <div class="form-submit">
                  <button>Se connecter <i class="fa-solid fa-right-to-bracket"></i></button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /Modal Login -->

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
    <footer class="menu mt-4 px-3 pt-5 pb-3">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-6 col-lg-4">
            <div class="footer-title">
              Qui sommes-nous ?
            </div>
            <div class="footer-description">
              ZOE T & L est agence de voyage basé sur le Transport routier.
            </div>
          </div>
          <div class="col-sm-12 col-md-6 col-lg-4">
            <div class="footer-title">
              ZOE T & L
            </div>
            <div class="footer-description">
              <ul class="navbar-nav">
                <li class="footer-list">
                  <a class="footer-link" aria-current="page" href="index.html">Accueil</a>
                </li>
                <li class="footer-list">
                  <a class="footer-link" href="about-us.html">Qui sommes-nous</a>
                </li>
                <li class="footer-list">
                  <a class="footer-link" href="contact.html">Contact</a>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-sm-12 col-md-12 col-lg-4">
            <div class="footer-title">
              Nos zone de servies
            </div>
            <div class="footer-description">
              <ul class="navbar-nav">
                <li class="footer-list">
                  Pointe-Noire
                </li>
                <li class="footer-list">
                  Brazzaville
                </li>
                <li class="footer-list">
                  Ouesso
                </li>
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
  <script src="{{ asset('vendors/jquery/jquery-3.6.1.min.js') }}"></script>
  <script src="{{ asset('vendors/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>
