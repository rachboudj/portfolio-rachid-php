<div class="container-form">
    <h1>Connexion</h1>

    <form class="form" action="index.php?page=login" method="post">
        <div class="label-input">
            <label class="label" for="email">E-mail :</label>
            <input class="input" type="text" id="email" name="email" value="<?= $email ?>" />
        </div>
        <div class="label-input">
            <label class="label" for="mdp">Mot de passe :</label>
            <input class="input" type="password" id="mdp" name="mdp" />
        </div>
        <div class="buttons-input ">
            <input class="buttons2" type="reset" value="Effacer" />
            <input class="buttons" type="submit" value="Se connecter" />
        </div>
        <input type="hidden" name="frmLogin" />
    </form>
</div>