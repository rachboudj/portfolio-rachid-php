<?php
$sql = "SELECT * FROM projets WHERE status = 'publish' ORDER BY created_at DESC";
$query = pdo()->prepare($sql);
$query->execute();
$projets = $query->fetchAll();

?>

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
</section>