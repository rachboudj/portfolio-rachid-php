<div class="container-form">
    <h1>Inscription</h1>
    <form class="form" action="index.php?page=inscription" method="post">
        <div class="label-input">
            <label class="label" for="nom">Nom :</label>
            <input class="input" type="text" id="nom" name="nom" value="<?= $nom ?>" />
        </div>

        <div class="label-input">
            <label class="label" for="prenom">Prénom :</label>
            <input class="input" type="text" id="prenom" name="prenom" value="<?= $prenom ?>" />
        </div>

        <div class="label-input">
            <label class="label" for="email">E-mail :</label>
            <input class="input" type="text" id="email" name="email" value="<?= $email ?>" />
        </div>

        <div class="label-input">
            <label class="label" for="mdp1">Mot de passe :</label>
            <input class="input" type="password" id="mdp1" name="mdp1" />
        </div>

        <div class="label-input">
            <label class="label" for="mdp2">Vérification mot de passe :</label>
            <input class="input" type="password" id="mdp2" name="mdp2" />
        </div>

        <div class="checkbox-input">
            <input type="checkbox" name="cgu" id="cgu" value="1" <?= isset($_POST['cgu']) ? "checked" : ''; ?> /><label for="cgu">J'accepte les <a href="index.php?page=cgu" target="_blank">Conditions Générales d'Utilisation</a></label>
        </div>

        <div class="buttons-input">
            <input class="buttons2" type="reset" value="Effacer" />
            <input class="buttons" type="submit" value="Envoyer" />
        </div>

        <input type="hidden" name="frmInscription" />
    </form>
</div>