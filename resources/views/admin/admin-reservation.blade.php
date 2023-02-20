<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./vendors/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="./vendors/font-awesome/css/all.min.css">
    <link rel="stylesheet" href="./css/admin.css">
    <link rel="shortcut icon" href="./img/fav-icon.png" type="image/x-icon">
    <title>ZOE | Transport et logistique</title>
</head>

<body>

    <section id="menu">
        <div class="logo">
            <img src="img/logo.png" alt="">
        </div>

        <div class="items">
            <li><i class="fa-solid fa-chart-pie"></i><a href="admin-index.html">Tableau de bord</a></li>
            <li class="active"><i class="fas fa-users-line"></i><a href="admin-reservation.html">Reservation clients</a></li>
            <li><i class="fa-solid fa-location-pin"></i><a href="admin-ges-destination.html">Gestion des destination</a></li>
            <li><i class="fa-solid fa-money-bill"></i><a href="admin-ges-tarifs.html">Gestion des tarifs</a></li>
            <li><i class="fa-solid fa-users"></i></i><a href="admin-ges-users.html">Gestion des utilisateurs</a></li>
            <li><i class="fa-solid fa-user-gear"></i></i><a href="admin-mon-compte.html">Mon compte</a></li>
            <li id="logout"><i class="fa-solid fa-right-from-bracket"></i><a href="index.html">Déconnexion</a></li>
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
            Reservation clients
        </h3>

        <div class="cards row">
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
        </div>

        <div class="board">
            <table width="100%" id="user-historique" class="dataTable">
                <thead>
                    <tr>
                        <td>Nom</td>
                        <td>Destination</td>
                        <td>Date depart</td>
                        <td>Nombre de passager</td>
                        <td>Tarifs</td>
                        <td>Status</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
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
                </tbody>
            </table>
        </div>
    </section>

    <script src="./vendors/jquery/jquery-3.6.1.min.js"></script>
    <script src="./vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="./js/jquery.dataTables.min.js"></script>
    <script src="./js/dataTables.bootstrap4.min.js"></script>
    <script src="./js/main.js"></script>
</body>

</html>