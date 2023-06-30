<?php
$sql = "SELECT * FROM projets WHERE status = 'publish' ORDER BY created_at DESC LIMIT 2";
$query = pdo()->prepare($sql);
$query->execute();
$projets = $query->fetchAll();

?>


<!----------------- Présentation ----------------->
<section id="presentation">
    <div class="presentation">
        <h1>Rachid Boudjakdji</h1>
        <p>Je suis un développeur front-end basé sur Vernon. <br>Étudiant en développement web à la Normandie Webschool.
        </p>
        <button><a href="mailto:rboudjakdji@normandiewebschool.fr?subject=Rachid, votre profil m'intéresse !">rboudjakdji@normandiewebschool.fr ↗</a></button>
    </div>
</section>

<!----------------- À propos ----------------->
<section id="a-propos">
    <div class="img-a-propos">
        <img src="./assets/img/rachid.JPG" alt="Photo de Rachid Boudjakdji en noir et blanc" />
        <div class="ombre">
        </div>
    </div>
    <div class="container-text">
        <div class="text-a-propos">
            <h2>Hey !</h2>
            <p>
                Je m'appelle Rachid, développeur front-end et étudiant à la Normandie Web School.
                Mon objectif est de créer des solutions attrayantes et fonctionnelles qui améliorent la vie des utilisateurs et des clients.
                J'aime l'alliance entre l'esthétique et l'utilité, en proposant des sites web interactifs et intuitifs.
                Je suis constamment à la recherche de nouvelles technologies pour rester à jour et offrir des solutions innovantes.
                Je suis ouvert aux opportunités et prêt à contribuer à des projets passionnants.
            </p>
            <button class="mt3"><a target="_blank" class="btn-lien" href="./assets/pdf/v4-cv-rachid.pdf">Voir mon CV ↗</a></button>
        </div>
    </div>
</section>


<!----------------- Projets ----------------->
<section id="projets">
    <h2>Mes projets</h2>
    <p>Intégration, CRUD, ajout d’élément en base de donnée...</p>

    <div class="container-card">
        <!-- 1er projet  -->
        <?php foreach ($projets as $projet) { ?>
            <div class="card-project">
                <img src="<?= $projet['image'] ?>" alt="<?= ucfirst($projet['titre']); ?>">

                <div class="content">
                    <div class="titre">
                        <h3><?= ucfirst($projet['titre']); ?></h3>
                        <span class="role"><?= ucfirst($projet['role']); ?></span>
                    </div>

                    <div class="btn">
                        <button><a href="index.php?page=detailProjet&amp;id=<?= $projet['id_projet']; ?>">Voir le projet ↗</a></button>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
    <div class="btn-voir-projet">
        <button><a href="index.php?page=projet">Voir tous les projets</a></button>
    </div>
</section>


<!----------------- Skills ----------------->
<section id="skills">
    <h2>Mes skills</h2>

    <div class="container-skills">
        <div class="card-skills">
            <h3>Front</h3>
            <ul>
                <li><img src="./assets/img/etoile.png" alt="Étoile bleu">HTML</li>
                <li><img src="./assets/img/etoile.png" alt="Étoile bleu">CSS</li>
                <li><img src="./assets/img/etoile.png" alt="Étoile bleu">JS</li>
            </ul>
        </div>
        <div class="card-skills">
            <h3>Back</h3>
            <ul>
                <li><img src="./assets/img/etoile.png" alt="Étoile bleu">PHP</li>
                <li><img src="./assets/img/etoile.png" alt="Étoile bleu">MYSQL</li>
                <li><img src="./assets/img/etoile.png" alt="Étoile bleu">SYMFONY</li>
            </ul>
        </div>
        <div class="card-skills">
            <h3>Autres</h3>
            <ul>
                <li><img src="./assets/img/etoile.png" alt="Étoile bleu">GIT</li>
                <li><img src="./assets/img/etoile.png" alt="Étoile bleu">FIGMA</li>
            </ul>
        </div>
    </div>
</section>


<!----------------- Formation ----------------->
<section id="formation">
    <h2>Formations</h2>
    <div class="timeline">
        <div class="container-timeline left">
            <div class="content-timeline">
                <h3><img src="./assets/img/etoile.png" alt="Étoile bleu">En cours</h3>
                <span class="etablissement">Normandie Web School</span>
                <p>Bachelor chef de projet digital, spécialité développement web</p>
            </div>
        </div>
        <div class="container-timeline right">
            <div class="content-timeline">
                <h3><img src="./assets/img/etoile.png" alt="Étoile bleu">2022</h3>
                <span class="etablissement">ESCCI</span>
                <p>Titre RNCP de niveau 3 (bac +2), programmation/développeur informatique</p>
            </div>
        </div>
        <div class="container-timeline left">
            <div class="content-timeline">
                <h3><img src="./assets/img/etoile.png" alt="Étoile bleu">2018</h3>
                <span class="etablissement">Lycée Georges Dumézil</span>
                <p>Bac Économie & Social</p>
            </div>
        </div>
    </div>
</section>