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
            <h2>Contact</h2>
          </div>
        </div>
      </div>
    </div>
    {{--@if (Session::has('status'))
        <div class="alert alert-info">{{ Session::get('status') }}</div>
    @endif--}}
    <!-- Contact -->
    {{--@if ($message = Session::get('status'))
        <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif--}}

    {{--@if($message = Session::get('status'))
        <div class="modal fade" id="editProfile" tabindex="-1" aria-labelledby="editProfileLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editProfileLabel">Information</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-edit">
                                <div class="form-group">
                                    <label for="full_name">{{ $message }}</label>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif--}}

    <div class="container com-zephir">
      <div class="row">
        <div class="col-md-12 col-sm-12 mb-3">
          <div class="contact">
            <div class="col-md-12 col-sm-12 mt-3">
                <div class="row text-center">
                  <div class="col-md-6 col-sm-12">
                    <div class="address mt-1">
                      <div class="min-title">
                        ZOE T & L Pointe-Noire
                      </div>
                      <div class="min-desc">
                        <p><span>Tel :</span> +242 05 513 05 80 / +242 06 569 07 72</p>
                        <p><span>Mail :</span> contact@zoe-tl.com</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 col-sm-12">
                    <div class="address mt-1">
                      <div class="min-title">
                        ZOE T & L Brazzaville
                      </div>
                      <div class="min-desc">
                        <p><span>Tel :</span> +242 05 513 05 70 / +242 06 569 07 57</p>
                        <p><span>Mail :</span> contact@zoe-tl.com</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <div class="description">
              <br/>
            </div>
            <div class="form-contact">
              <form method="POST" action="{{ route('send-contact') }}" class="row">
                @csrf
                <div class="col-md-6 col-sm-12">
                  <div class="form-group">
                    <label for="fullname">Nom complet</label>
                    <input type="text" name="name" id="fullname" placeholder="Nom complet" required>
                  </div>
                </div>
                <div class="col-md-6 col-sm-12">
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="sender" id="email" placeholder="Email" required>
                  </div>
                </div>
                <div class="col-md-6 col-sm-12">
                  <div class="form-group">
                    <label for="phone">Téléphone</label>
                    <input type="tel" name="phone" id="phone" placeholder="Téléphone">
                  </div>
                </div>
                <div class="col-md-6 col-sm-12">
                  <div class="form-group">
                    <label for="city">Objet</label>
                    <input type="text" name="subject" id="city" placeholder="Objet">
                  </div>
                </div>
                <div class="col-md-12 col-sm-12">
                  <div class="form-group">
                    <label for="msg">Message</label>
                    <textarea name="body" id="msg" cols="30" rows="10"
                      placeholder="Veuillez saisir votre message"></textarea>
                  </div>
                </div>
                <div class="col-md-12 col-sm-12">
                  <div class="form-submit">
                    <button>Envoyer message</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>

      </div>
    </div>
    <!-- /Contact -->

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
  <script src="./vendors/jquery/jquery-3.6.1.min.js"></script>
  <script src="./vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="./js/main.js"></script>
</body>

</html>
