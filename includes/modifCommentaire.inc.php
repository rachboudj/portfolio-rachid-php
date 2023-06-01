<?php
$errors = array();
if(!empty($_GET['projetId']) && is_numeric($_GET['projetId'])) {
    $id = $_GET['projetId'];
    $sql = "SELECT * FROM commentaires WHERE id_commentaire = :id_commentaire";
    $query = $pdo=pdo()->prepare($sql);
    $query->bindValue(':id_commentaire',$id, PDO::PARAM_INT);
    $query->execute();
    $commentaire = $query->fetch();
    if (empty($commentaire)) {
        // die();
    }

    if (!empty($_POST['submitted'])) 
    {
        $description = trim(strip_tags($_POST['description']));
        $auteur = trim(strip_tags($_POST['auteur']));

        $errors = validationTexte($errors,$description,'description',10,1000);
        $errors = validationTexte($errors,$auteur,'auteur',3,100);

        if(count($errors) === 0 && verifierAdmin()) 
        {
            $sql = "UPDATE commentaires SET description= :description, auteur= :auteur, modified_at = NOW(),status= 'new' WHERE id_commentaire= :id_commentaire";
            $query = $pdo=pdo()->prepare($sql);
            $query->bindValue(':description',$description, PDO::PARAM_STR);
            $query->bindValue(':auteur',$auteur, PDO::PARAM_STR);
            $query->bindValue(':id_commentaire',$id, PDO::PARAM_INT);
            $query->execute();
        }
    }
} else {
    // die();
}
?>

<h1>Modifier le commentaire</h1>
<form action="" method="post">

    <label for="description">Contenu</label>
    <textarea name="description" id="description" cols="30" rows="10"><?= getValue('description', $commentaire['description']) ?></textarea>
    <span class="error"><?php if (!empty($errors['description'])) {echo $errors['description'];} ?></span>

    <label for="auteur">Auteur</label>
    <input type="text" name="auteur" id="auteur" value="<?= getValue('auteur', $commentaire['auteur']) ?>">
    <span class="error"><?php if (!empty($errors['auteur'])) {echo $errors['auteur'];} ?></span>

    <input type="submit" name="submitted" value="Modifier le commentaire">
</form>