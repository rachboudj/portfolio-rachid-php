<?php
$errors = array();
if (!empty($_GET['projetId']) && is_numeric($_GET['projetId'])) {
    $id = $_GET['projetId'];
    $sql = "SELECT * FROM projets WHERE id_projet = :id_projet";
    $query = $pdo = pdo()->prepare($sql);
    $query->bindValue(':id_projet', $id, PDO::PARAM_INT);
    $query->execute();
    $projet = $query->fetch();

    if (!empty($_POST['submitted'])) {
        $titre = trim(strip_tags($_POST['titre']));
        $image = trim(strip_tags($_POST['image']));
        $role = trim(strip_tags($_POST['role']));
        $description = trim(strip_tags($_POST['description']));
        $duree = trim(strip_tags($_POST['duree']));
        $urlFigma = trim(strip_tags($_POST['url_figma']));
        $urlGithub = trim(strip_tags($_POST['url_github']));
        $urlSite = trim(strip_tags($_POST['url_site']));
        $status = trim(strip_tags($_POST['status']));

        $errors = validationTexte($errors, $titre, 'titre', 2, 100);
        $errors = validationTexte($errors, $image, 'image', 2, 1000);
        $errors = validationTexte($errors, $role, 'role', 2, 100);
        $errors = validationTexte($errors, $description, 'description', 10, 1000);
        $errors = validationTexte($errors, $duree, 'duree', 2, 100);
        // $errors = validationTexte($errors, $urlFigma, 'url_figma', 2, 1000);
        $errors = validationTexte($errors, $urlGithub, 'url_github', 2, 100);
        // $errors = validationTexte($errors, $urlSite, 'url_site', 2, 100);
        $errors = validationTexte($errors, $status, 'status', 3, 20);

        $projet2 = $projet['id_projet'];

        if (count($errors) === 0) {
            $sql = "UPDATE projets SET titre= :titre, role= :role, image= :image, description= :description, duree= :duree, url_figma= :url_figma, url_github= :url_github, url_site= :url_site, status= :status WHERE id_projet= :id_projet";
            $query = $pdo = pdo()->prepare($sql);
            $query->bindValue(':titre', $titre, PDO::PARAM_STR);
            $query->bindValue(':image', $image, PDO::PARAM_STR);
            $query->bindValue(':role', $role, PDO::PARAM_STR);
            $query->bindValue(':description', $description, PDO::PARAM_STR);
            $query->bindValue(':duree', $duree, PDO::PARAM_STR);
            $query->bindValue(':url_figma', $urlFigma, PDO::PARAM_STR);
            $query->bindValue(':url_github', $urlGithub, PDO::PARAM_STR);
            $query->bindValue(':url_site', $urlSite, PDO::PARAM_STR);
            $query->bindValue(':status', $status, PDO::PARAM_STR);
            $query->bindValue(':id_projet', $id, PDO::PARAM_INT);
            $query->execute();
            echo "<script>window.location.replace('index.php?page=projet&amp;id={$projet['id_projet']}')</script>";
        }
    }
}
?>

<div class="container-form">
    <h2>Modifier le projet</h2>
    <button class="mt"><a class="buttons2" href="index.php?page=projetAdmin">Revenir en arrière</a></button>
    <form class="form" action="" method="post">
        <div class="label-input">
            <label class="label" for="titre">Titre</label>
            <input class="input" type="text" name="titre" id="titre" value="<?= getValue('titre', $projet['titre']) ?>">
            <span class="error"><?php if (!empty($errors['titre'])) {
                                    echo $errors['titre'];
                                } ?></span>
        </div>

        <div class="label-input">
            <label class="label" for="image">URL de l'image</label>
            <input class="input" type="text" name="image" id="image" value="<?= getValue('image', $projet['image']) ?>">
            <span class="error"><?php if (!empty($errors['image'])) {
                                    echo $errors['image'];
                                } ?></span>
        </div>

        <div class="label-input">
            <label class="label" for="role">Role</label>
            <input class="input" type="text" name="role" id="role" value="<?= getValue('role', $projet['role']) ?>">
            <span class="error"><?php if (!empty($errors['role'])) {
                                    echo $errors['role'];
                                } ?></span>
        </div>

        <div class="label-input">
        <label class="label" for="description">Description</label>
        <textarea class="textarea" name="description" id="description" cols="30" rows="10"><?= getValue('description', $projet['description']) ?></textarea>
        <span class="error"><?php if (!empty($errors['description'])) {
                                echo $errors['description'];
                            } ?></span>
        </div>

        <div class="label-input">
            <label class="label" for="duree">Temps de réalisation</label>
            <input class="input" type="text" name="duree" id="duree" value="<?= getValue('duree', $projet['duree']) ?>">
            <span class="error"><?php if (!empty($errors['duree'])) {
                                    echo $errors['duree'];
                                } ?></span>
        </div>


        <div class="label-input">
            <label class="label" for="url_figma">Lien de la maquette</label>
            <input class="input" type="text" name="url_figma" id="url_figma" value="<?= getValue('url_figma', $projet['url_figma']) ?>">
            <span class="error"><?php if (!empty($errors['url_figma'])) {
                                    echo $errors['url_figma'];
                                } ?></span>
        </div>

        <div class="label-input">
            <label class="label" for="url_github">Lien du GitHub</label>
            <input class="input" type="text" name="url_github" id="url_github" value="<?= getValue('url_github', $projet['url_github']) ?>">
            <span class="error"><?php if (!empty($errors['url_github'])) {
                                    echo $errors['url_github'];
                                } ?></span>
        </div>

        <div class="label-input">
            <label class="label" for="url_site">Lien du site</label>
            <input class="input" type="text" name="url_site" id="url_site" value="<?= getValue('url_site', $projet['url_site']) ?>">
            <span class="error"><?php if (!empty($errors['url_site'])) {
                                    echo $errors['url_site'];
                                } ?></span>
        </div>

        <div class="label-input">
            <label class="label" for="status">Status du projet</label>

            <?php
            $status = array(
                'draft' => 'Brouillon',
                'publish' => 'Publié'
            );
            ?>


            <select class="select" name="status">
                <option value="">Choisir le status</option>
                <?php foreach ($status as $key => $value) {
                    $selected = '';
                    if (!empty($_POST['status'])) {
                        if ($_POST['status'] == $key) {
                            $selected = ' selected="selected"';
                        }
                    } elseif ($projet['status'] == $key) {
                        $selected = ' selected="selected"';
                    }
                ?>
                    <option value="<?php echo $key; ?>" <?php echo $selected; ?>><?php echo $value; ?></option>
                <?php } ?>
            </select>
            <span class="error"><?php if (!empty($errors['status'])) {
                                    echo $errors['status'];
                                } ?></span>
        </div>

        <div class="buttons-input">
            <input class="buttons" type="submit" name="submitted" value="Modifier le projet">

        </div>









    </form>
</div>