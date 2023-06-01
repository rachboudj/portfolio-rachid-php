<?php
$sql = "SELECT * FROM projets WHERE status = 'draft' ORDER BY created_at DESC LIMIT 10";
$query = pdo()->prepare($sql);
$query->execute();
$projets = $query->fetchAll();

?>


<section id="projets">
    <h1>Mes projets</h1>
    <p class="title">Intégration, CRUD, ajout d’élément en base de donnée...</p>
    <div class="container-projets">
        <?php foreach ($projets as $projet) {
        ?>
            <div class="card-projets">
                <img src="" alt="Projet">
                <div class="text-card">
                    <h2><?= ucfirst($projet['titre']); ?></h2>
                    <p><?= ucfirst($projet['role']); ?></p>
                    <button><a href="index.php?page=detailProjet&amp;id=<?= $projet['id_projet']; ?>">Voir le projet</a></button>
                </div>

            </div>

        <?php } ?>
    </div>

</section>