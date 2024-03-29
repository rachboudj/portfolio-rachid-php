<?php
$errors = array();
if (!empty($_GET['usersId']) && is_numeric($_GET['usersId'])) {
    $id = $_GET['usersId'];
    $sql = "SELECT * FROM utilisateurs WHERE id_utilisateur = :id_utilisateur";
    $query = $pdo = pdo()->prepare($sql);
    $query->bindValue(':id_utilisateur', $id, PDO::PARAM_INT);
    $query->execute();
    $utilisateur = $query->fetch();
    if (empty($utilisateur)) {
        // die();
    }

    if (!empty($_POST['submitted'])) {
        $nom = trim(strip_tags($_POST['nom']));
        $prenom = trim(strip_tags($_POST['prenom']));
        $email = trim(strip_tags($_POST['email']));
        $mdp = trim(strip_tags($_POST['mdp']));
        $role = trim(strip_tags($_POST['role']));

        $errors = validationTexte($errors, $nom, 'nom', 3, 100);
        $errors = validationTexte($errors, $prenom, 'prenom', 3, 1000);
        $errors = validationTexte($errors, $email, 'email', 3, 100);
        $errors = validationTexte($errors, $mdp, 'mdp', 3, 100);
        $errors = validationTexte($errors, $role, 'role', 3, 100);

        if (count($errors) === 0) {
            $sql = "UPDATE utilisateurs SET nom= :nom, prenom= :prenom, email= :email, mdp= :mdp, role= :role WHERE id_utilisateur= :id_utilisateur";
            // die($sql);
            $query = $pdo = pdo()->prepare($sql);
            $query->bindValue(':nom', $nom, PDO::PARAM_STR);
            $query->bindValue(':prenom', $prenom, PDO::PARAM_STR);
            $query->bindValue(':email', $email, PDO::PARAM_STR);
            $query->bindValue(':mdp', $mdp, PDO::PARAM_STR);
            $query->bindValue(':role', $role, PDO::PARAM_STR);
            $query->bindValue(':id_utilisateur', $id, PDO::PARAM_INT);
            $query->execute();
            header('Location: index.php?page=utilisateur');
        }
    }
} else {
    // die();
}
?>

<div class="container-form">
    <h2>Modifier les utilisateurs</h2>

    <button class="mt3"><a class="buttons2" href="index.php?page=utilisateur">Retour</a></button>

    <form class="form" action="" method="post">
        <div class="label-input">
            <label class="label" for="nom">Nom</label>
            <input class="input" type="text" name="nom" id="nom" value="<?= getValue('nom', $utilisateur['nom']) ?>">
            <span class="error"><?php if (!empty($errors['nom'])) {
                                    echo $errors['nom'];
                                } ?></span>
        </div>

        <div class="label-input">
            <label class="label" for="prenom">Prénom</label>
            <input class="input" type="text" name="prenom" id="prenom" value="<?= getValue('prenom', $utilisateur['prenom']) ?>">
            <span class="error"><?php if (!empty($errors['prenom'])) {
                                    echo $errors['prenom'];
                                } ?></span>
        </div>

        <div class="label-input">
            <label class="label" for="email">Email</label>
            <input class="input" type="text" name="email" id="email" value="<?= getValue('email', $utilisateur['email']) ?>">
            <span class="error"><?php if (!empty($errors['email'])) {
                                    echo $errors['email'];
                                } ?></span>
        </div>

        <div class="label-input">
            <label class="label" for="mdp">Mots de passe</label>
            <input class="input" type="text" name="mdp" id="mdp" value="<?= getValue('mdp', $utilisateur['mdp']) ?>">
            <span class="error"><?php if (!empty($errors['mdp'])) {
                                    echo $errors['mdp'];
                                } ?></span>
        </div>

        <div class="label-input">
            <label class="label" for="status">Rôle de l'utilisateur</label>

            <?php
            $role = array(
                'utilisateurInscrit' => 'Utilisateur inscrit',
                'admin' => 'Administrateur'
            );

            ?>


            <select class="select" name="role">
                <option value="">Choisir le rôle</option>
                <?php foreach ($role as $key => $value) {
                    $selected = '';
                    if (!empty($_POST['role'])) {
                        if ($_POST['role'] == $key) {
                            $selected = ' selected="selected"';
                        }
                    } elseif ($utilisateur['role'] == $key) {
                        $selected = ' selected="selected"';
                    }
                ?>
                    <option value="<?php echo $key; ?>" <?php echo $selected; ?>><?php echo $value; ?></option>
                <?php } ?>
            </select>
            <span class="error"><?php if (!empty($errors['role'])) {
                                    echo $errors['role'];
                                } ?></span>
        </div>








        <div class="buttons-input">
            <input class="buttons" type="submit" name="submitted" value="Modifier l'utilisateur">
        </div>
    </form>
</div>