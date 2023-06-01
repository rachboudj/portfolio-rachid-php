<?php

if (!empty($_GET['projetId']) && ctype_digit($_GET['projetId'])) 
{
    $id = $_GET['projetId'];
    if ($pdo = pdo()) {
        $sql = "DELETE FROM commentaires WHERE commentaires.id_commentaire = '$id'";
        // die($sql);
        $query = $pdo->query($sql);
        $query->execute();
        // header('Location: index.php?page=projetId&id='.$id);
        // die('Problème au niveau de la redirection');
    }
    
} else {
    die('Le commentaire n\'a pas été supprimé...');
}