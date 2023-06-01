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
</head>
<body>
    <header>
        <div class="nom-poste">
            <span class="nom">
                Rachid Boudjakdji
            </span>
            <span class="poste">
                Développeur web
            </span>
        </div>
        <nav>
            <li><a href="#">Moi</a></li>
            <li><a href="index.php?page=projet">Projets</a></li>
            <li><a href="#">rboudjakdji@normandiewebschool.fr ↗</a></li>
            <li><a href="index.php?page=nouveauProjet">Ajouter projet</a></li>
            <?php
                if (isset($_SESSION['login']) && $_SESSION['login'] === true) {
                    echo '<li><a href="index.php?page=logout">Logout</a></li>';
                } else {
                    echo '<li><a href="index.php?page=login">Login</a></li>';                    
                }
                ?>
            <?php
                if (isset($_SESSION['login']) && $_SESSION['login'] === true && $_SESSION['role'] == 'admin') {
                    echo '
                    <div class="profil-admin">
                        <li><a href="index.php?page=utilisateur">Utilisateurs</a></li>
                    </div>';
                }
                ?>
        </nav>
    </header>