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
if (!empty($_POST['submitted'])) {
    $auteur = trim(strip_tags($_POST['auteur']));
    $description = trim(strip_tags($_POST['description']));
    $errors = validationTexte($errors, $auteur, 'auteur', 1, 40);
    $errors = validationTexte($errors, $description, 'description', 1, 2000);
    if (count($errors) == 0) {
        $sql = "INSERT INTO commentaires (id_projet,description, auteur, created_at,modified_at,status)
            VALUES (:id_projet,:description,:auteur,NOW(),NOW(),'new')";
        $query = $pdo = pdo()->prepare($sql);
        $query->bindValue(':auteur', $auteur, PDO::PARAM_STR);
        $query->bindValue(':description', $description, PDO::PARAM_STR);
        $query->bindValue(':id_projet', $id, PDO::PARAM_INT);
        $query->execute();
        header('Location: index.php?page=detailProjet&id=' . $id);
        // exit();
    } else {
        // echo '<script>alert("Vous devez être iscrit en tant qu\'utilisateur pour ajouter un commentaire !");</script>';
    }
}

$sql = "SELECT * FROM commentaires WHERE id_projet = :id_projet";
$query = $pdo = pdo()->prepare($sql);
$query->bindValue(':id_projet', $id, PDO::PARAM_INT);
$query->execute();
$commentaires = $query->fetchAll();

?>

<div class="container-detail-projet">
    <div class="img-detail-projet">
        <img src="<?= $projet['image']; ?>" alt="<?= ucfirst($projet['titre']); ?>">
    </div>
    <div class="text-detail-projet">
        <div class="head-detail-projet">
            <h1><?php echo ucfirst($projet['titre']); ?></h1>
            <span class="role"><?php echo ucfirst($projet['role']); ?></span>
        </div>
        <p><?php echo nl2br($projet['description']); ?></p>
        <p><span class="bold">Temps de réalisation : </span><?php echo nl2br($projet['duree']); ?></p>
        <div class="btn-detail-projet">
            <a target="_blank" href="<?php echo ucfirst($projet['url_github']); ?>">Voir la maquette figma <i class="ti ti-arrow-up-right"></i></a>
            <a target="_blank" href="<?php echo ucfirst($projet['url_github']); ?>">Voir le code sur Github <i class="ti ti-arrow-up-right"></i></a>
            <a target="_blank" href="<?php echo ucfirst($projet['url_site']); ?>">Voir le site <i class="ti ti-arrow-up-right"></i></a>
        </div>
    </div>
</div>




    <div class="commentaires">
        <h2>Les commentaires</h2>

        <form class="form" action="" method="post">
            <label class="label" for="auteur">Auteur</label>
            <input class="input" type="text" id="auteur" name="auteur" value="">
            <span class="error"></span>

            <label class="label" for="description">Commentaire</label>
            <textarea class="textarea" name="description"></textarea>
            <span class="error"></span>

            <input class="buttons" type="submit" name="submitted" value="Ajouter">

            <?php if (!empty($commentaires)) { ?>

                <?php foreach ($commentaires as $commentaire) { ?>

                    <div class="detail-commentaires">
                        <p class="auteur"><?= $commentaire['auteur'] ?></p>
                        <p class="contenu"><?= $commentaire['description'] ?></p>
                        <div class="btn-commentaires">
                            <button><a class="btn-remove" href="index.php?page=supprimerCommentaire&amp;projetId=<?= $commentaire['id_commentaire'] ?>">Supprimer</a></button>
                            <button><a class="btn-edit" href="index.php?page=modifCommentaire&amp;projetId=<?= $commentaire['id_commentaire'] ?>">Modifier</a></button>
                        </div>
                    </div>
                <?php } ?>

    </div>

<?php } ?>