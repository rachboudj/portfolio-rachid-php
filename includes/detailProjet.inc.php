<?php
$errors = array();
if (!empty($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM projets WHERE id_projet = :id_projet";
    $query = $pdo = pdo()->prepare($sql);
    $query->bindValue(':id_projet', $id, PDO::PARAM_INT);
    $query->execute();
    $projet = $query->fetch();
    if (empty($projet)) {
        die('Erreur 404');
    }
} else {
    die('Erreur 404');
}

?>

<section id="detail-projet">
    <div class="container-detail-article">
        <div class="img-detail-projet">
            <img src="" alt="Projet">
        </div>
        <div class="text-detail-projet">
            <h1><?php echo ucfirst($projet['titre']); ?></h1>
            <span><?php echo ucfirst($projet['role']); ?></span>
            <p><?php echo nl2br($projet['description']); ?></p>

            <button><a href="<?php echo ucfirst($projet['url_github']); ?>">Voir le code sur GitHub</a></button>
            <button><a href="<?php echo ucfirst($projet['url_site']); ?>">Voir le site</a></button>
        </div>


        <?php
        if (isset($_SESSION['login']) && $_SESSION['login'] === true && $_SESSION['role'] == 'admin') {
            echo '
                    <div class="btn-edit-suppr">
                        <button><a href="index.php?page=modifProjet&amp;projetId=<?=' . $projet['id_projet'] . '?>">Modifier</a></button>
                        <button><a href="index.php?page=supprimerProjet&amp;projetId=<?=' . $projet['id_projet'] . '?>">Supprimer</a></button>
                    </div>';
        }
        ?>

        <button><a href="index.php?page=modifProjet&amp;projetId=<?= $projet['id_projet'] ?>">Modifier</a></button>
        <button><a href="index.php?page=supprimerProjet&amp;projetId=<?= $projet['id_projet'] ?>">Supprimer</a></button>
    </div>
</section>