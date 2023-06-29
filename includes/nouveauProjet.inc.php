<h1>Ajouter un article</h1>

<?php
if (isset($_SESSION['login']) && $_SESSION['login'] === true) {
    $errors = array();

    if (!empty($_POST['frmNouveauProjet'])) {
        $titre = trim(strip_tags($_POST['titre']));
        $image = trim(strip_tags($_POST['image']));
        $role = trim(strip_tags($_POST['role']));
        $description = trim(strip_tags($_POST['description']));
        $urlFigma = trim(strip_tags($_POST['url_figma']));
        $urlGithub = trim(strip_tags($_POST['url_github']));
        $urlSite = trim(strip_tags($_POST['url_site']));
        $status = trim(strip_tags($_POST['status']));

        $errors = validationTexte($errors, $titre, 'titre', 2, 100);
        $errors = validationTexte($errors, $image, 'image', 2, 1000);
        $errors = validationTexte($errors, $role, 'role', 2, 100);
        $errors = validationTexte($errors, $description, 'description', 10, 1000);
        $errors = validationTexte($errors, $urlFigma, 'url_figma', 2, 100);
        $errors = validationTexte($errors, $urlGithub, 'url_github', 2, 100);
        $errors = validationTexte($errors, $urlSite, 'url_site', 2, 100);
        $errors = validationTexte($errors, $status, 'status', 3, 20);

        if (count($errors) === 0) {
            $requeteNewProjet = "INSERT INTO projets(titre,image,role,description,url_figma,url_github,url_site,created_at,modified_at,status)VALUES (:titre, :image, :role,:description,:url_figma,:url_github,:url_site,NOW(),NOW(),:status)";
            // die($requeteNewArticle);
            $query = pdo()->prepare($requeteNewProjet);
            $query->bindValue(':titre', $titre, PDO::PARAM_STR);
            $query->bindValue(':image', $image, PDO::PARAM_STR);
            $query->bindValue(':role', $role, PDO::PARAM_STR);
            $query->bindValue(':description', $description, PDO::PARAM_STR);
            $query->bindValue(':url_figma', $urlFigma, PDO::PARAM_STR);
            $query->bindValue(':url_github', $urlGithub, PDO::PARAM_STR);
            $query->bindValue(':url_site', $urlSite, PDO::PARAM_STR);
            $query->bindValue(':status', $status, PDO::PARAM_STR);
            $query->execute();
        }
    }
} else {
    // echo "<script>window.location.replace('index.php?page=login')</script>";
}

?>

<form action="index.php?page=nouveauProjet" method="post">
    <label for="titre">Titre</label>
    <input type="text" name="titre" id="titre" value="<?php if (!empty($_POST['titre'])) {
                                                            echo $_POST['titre'];
                                                        } ?>">
    <span class="error"><?php if (!empty($errors['titre'])) {
                            echo $errors['titre'];
                        } ?></span>

    <label for="role">Role</label>
    <input type="text" name="role" id="role" value="<?php if (!empty($_POST['role'])) {
                                                        echo $_POST['role'];
                                                    } ?>">
    <span class="error"><?php if (!empty($errors['role'])) {
                            echo $errors['role'];
                        } ?></span>

    <label for="description">Description</label>
    <textarea name="description" id="description" cols="30" rows="10"><?php if (!empty($_POST['description'])) {
                                                                            echo $_POST['description'];
                                                                        } ?></textarea>
    <span class="error"><?php if (!empty($errors['description'])) {
                            echo $errors['description'];
                        } ?></span>

    <label for="url_figma">Lien du Figma</label>
    <input type="text" name="url_figma" id="url_figma" value="<?php if (!empty($_POST['url_figma'])) {
                                                                    echo $_POST['url_figma'];
                                                                } ?>">
    <span class="error"><?php if (!empty($errors['url_figma'])) {
                            echo $errors['url_figma'];
                        } ?></span>

    <label for="url_github">Lien de Gituhub</label>
    <input type="text" name="url_github" id="url_github" value="<?php if (!empty($_POST['url_github'])) {
                                                                    echo $_POST['url_github'];
                                                                } ?>">
    <span class="error"><?php if (!empty($errors['url_github'])) {
                            echo $errors['url_github'];
                        } ?></span>

    <label for="url_site">Lien du site</label>
    <input type="text" name="url_site" id="url_site" value="<?php if (!empty($_POST['url_site'])) {
                                                                echo $_POST['url_site'];
                                                            } ?>">
    <span class="error"><?php if (!empty($errors['url_site'])) {
                            echo $errors['url_site'];
                        } ?></span>

    <label for="image">URL de l'image</label>
    <input type="text" name="image" id="image" value="<?php if (!empty($_POST['image'])) {
                                                                echo $_POST['image'];
                                                            } ?>">
    <span class="error"><?php if (!empty($errors['image'])) {
                            echo $errors['image'];
                        } ?></span>


    <label for="status">Status du projet</label>

    <?php
    $status = array(
        'draft' => 'Brouillon',
        'publish' => 'Publié'
    );

    ?>
    <select name="status">
        <option value="">Choisir le status</option>
        <?php foreach ($status as $key => $value) {
            $selected = '';
            if (!empty($_POST['status'])) {
                if ($_POST['status'] == $key) {
                    $selected = ' selected="selected"';
                }
            }
        ?>
            <option value="<?php echo $key; ?>" <?php echo $selected; ?>><?php echo $value; ?></option>
        <?php } ?>
    </select>
    <span class="error"><?php if (!empty($errors['status'])) {
                            echo $errors['status'];
                        } ?></span>

    <input type="submit" name="frmNouveauProjet" value="Ajouter un article">
</form>