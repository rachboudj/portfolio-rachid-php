<?php

if (!empty($_GET['projetId']) && ctype_digit($_GET['projetId'])) 
{
    $id = $_GET['projetId'];
    if ($pdo = pdo()) {
        $sql = "DELETE FROM commentaires WHERE commentaires.id_commentaire = '$id'";
        $query = $pdo->query($sql);
        $query->execute();
        // header('Location: index.php?page=projetId&id='.$id);
        header('Location: index.php?page=detailProjet&id=' . $id);
        die('Problème au niveau de la redirection');
    }
    
} else {
    echo('<span>Le commentaire n\'a pas été supprimé...</span>');
}