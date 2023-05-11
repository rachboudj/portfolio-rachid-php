<?php

if (!empty($_GET['usersId']) && ctype_digit($_GET['usersId']) && verifierAdmin()) 
{
    $id = $_GET['usersId'];
    if ($pdo = pdo()) {
        $sql = "DELETE FROM utilisateurs WHERE utilisateurs.id_utilisateur = '$id'";
        $query = $pdo->query($sql);
        $query->execute();
        echo "<script>window.location.replace('http://localhost:8888/portfolio-rachid/index.php?page=utilisateur')</script>";
        // die('Problème au niveau de la redirection');
    }
    
} else {
    die('L\'utilisateur n\'a pas été supprimé...');
}