<?php

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio de Rachid</title>

    <link rel="stylesheet" href="./assets/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons@latest/iconfont/tabler-icons.min.css" />
</head>

<body>
    <!-- Le header -->
    <header id="haut">
        <div class="container-header">
            <div class="logo">
                <p>Rachid Boudjakdji</p>
                <span class="status">Développeur front-end</span>
            </div>

            <!-- Le menu burger -->
            <div class="menu-burger">
                <div class="burger-button">
                    <span class="burger-top"></span>
                    <span class="burger-middle"></span>
                    <span class="burger-bottom"></span>
                </div>
                <div class="burger-menu">
                    <div class="nav-burger">
                        <ul>
                            <li><a href="index.php">Home</a></li>
                            <li><a href="index.php#a-propos">Moi</a></li>
                            <li><a href="index.php?page=projet">Projets</a></li>
                        </ul>
                    </div>
                    <div class="contact-burger">
                        <div class="reseau">
                            <h3 class="type-reseau">Mon compte</h3>
                            <?php
                            if (isset($_SESSION['login']) && $_SESSION['login'] === true && $_SESSION['role'] == 'admin') {
                                echo '
                                        <a class="lien-reseau" href="index.php?page=nouveauProjet">AJOUTER UN PROJET</a>
                                        <a class="lien-reseau" href="index.php?page=projetAdmin">LISTE DES PROJETS</a>
                                        <a class="lien-reseau" href="index.php?page=utilisateur">LISTE DES UTILISATEURS</a>
                                    ';
                            }
                            ?>
                            <?php
                            if (isset($_SESSION['login']) && $_SESSION['login'] === true) {
                                echo '<a class="lien-reseau logout-burger" href="index.php?page=logout">DÉCONNEXION</a>';
                            } else {
                                echo '
                                <a class="lien-reseau" href="index.php?page=inscription">INSCRIPTION</a>
                                <a class="lien-reseau" href="index.php?page=login">CONNEXION</a>
                                ';
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Le menu ordi -->
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="index.php#a-propos">Moi</a></li>
                    <li><a href="index.php?page=projet">Projets</a></li>
                    <li>
                    </li>
                    <li class="sub-menu-parent" tab-index="0">
                        Mon compte
                        <ul class="sub-menu">
                            <?php
                            if (isset($_SESSION['login']) && $_SESSION['login'] === true && $_SESSION['role'] == 'admin') {
                                echo '
                                        <li><a href="index.php?page=nouveauProjet">AJOUTER UN PROJET</a></li>
                                        <li><a href="index.php?page=projetAdmin">LISTE DES PROJETS</a></li>
                                        <li><a href="index.php?page=utilisateur">LISTE DES UTILISATEURS</a></li>
                                    ';
                            }
                            ?>
                            <?php
                            if (isset($_SESSION['login']) && $_SESSION['login'] === true) {
                                echo '<li class="logout"><a href="index.php?page=logout">DÉCONNEXION</a></li>';
                            } else {
                                echo '
                                <li><a href="index.php?page=inscription">INSCRIPTION</a></li>
                                <li><a href="index.php?page=login">CONNEXION</a></li>
                                ';
                            }
                            ?>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </header>