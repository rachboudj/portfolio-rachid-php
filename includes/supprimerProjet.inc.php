<?php

if (!empty($_GET['projetId']) && ctype_digit($_GET['projetId'])) 
{
    $id = $_GET['projetId'];
    if ($pdo = pdo()) {
        $sql = "DELETE FROM projets WHERE projets.id_projet = '$id'";
        $query = $pdo->query($sql);
        $query->execute();
        echo "<script>window.location.replace('index.php?page=projet')</script>";
    }
    
} else {
    // echo('L\'article n\'a pas été supprimé...');
}