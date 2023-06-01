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

$errors = [];
if(!empty($_POST['submitted'])) {
    $auteur = trim(strip_tags($_POST['auteur']));
    $description = trim(strip_tags($_POST['description']));
    $errors = validationTexte($errors,$auteur,'auteur',1, 40);
    $errors = validationTexte($errors,$description,'description',1,2000);
    if(count($errors) == 0) {
        $sql = "INSERT INTO commentaires (id_projet,description, auteur, created_at,modified_at,status)
            VALUES (:id_projet,:description,:auteur,NOW(),NOW(),'new')";
        $query = $pdo=pdo()->prepare($sql);
        $query->bindValue(':auteur',$auteur,PDO::PARAM_STR);
        $query->bindValue(':description',$description,PDO::PARAM_STR);
        $query->bindValue(':id_projet',$id,PDO::PARAM_INT);
        $query->execute();
        header('Location: index.php?page=detailProjet&id='.$id);
        // exit();
    } else {
        // echo '<script>alert("Vous devez être iscrit en tant qu\'utilisateur pour ajouter un commentaire !");</script>';
    }
}

$sql = "SELECT * FROM commentaires WHERE id_projet = :id_projet";
$query = $pdo=pdo()->prepare($sql);
$query->bindValue(':id_projet',$id,PDO::PARAM_INT);
$query->execute();
$commentaires = $query->fetchAll();

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

    <h2>Ajouter un commentaire</h2>
    <form action="" method="post">
        <label for="auteur">Auteur *</label>
        <input type="text" id="auteur" name="auteur" value="<?= getValue('auteur'); ?>">
        <span class="error"><?php if (!empty($errors['auteur'])) {echo $errors['auteur'];} ?></span>

        <label for="description">Commentaire *</label>
        <textarea name="description"><?= getValue('description'); ?></textarea>
        <span class="error"><?php if (!empty($errors['description'])) {echo $errors['description'];} ?></span>

        <input type="submit" name="submitted" value="Ajouter">
    </form>

    <?php if(!empty($commentaires)) { ?>
        <h2>Les commentaires</h2>
        <?php foreach ($commentaires as $commentaire) { ?>
            <div class="commentaires">
                <p>Auteur : <?= $commentaire['auteur']?></p>
                <p>Content : <?= $commentaire['description']?></p>
                <button><a href="index.php?page=supprimerCommentaire&amp;projetId=<?= $commentaire['id_commentaire'] ?>">Supprimer</a></button>
                <button><a href="index.php?page=modifCommentaire&amp;projetId=<?= $commentaire['id_commentaire'] ?>">Modifier</a></button>
            </div>
        <?php } ?>
    <?php } ?>

</section>