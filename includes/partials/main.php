<main>

<?php 
    $page = $_GET['page'] ?? "accueil";
    autoInclude($page);
?>

</main>