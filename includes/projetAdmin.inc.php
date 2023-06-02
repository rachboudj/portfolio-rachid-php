<h1>Les articles</h1>

<?php

$sql = "SELECT * FROM projets ORDER BY created_at DESC";
$query = pdo()->prepare($sql);
$query->execute();
$projets = $query->fetchAll();

?>

<table>
    <thead>
        <tr>
            <th>id</th>
            <th>Titre</th>
            <th>Image</th>
            <th>Contenu</th>
            <th>Rôle</th>
            <th>URL du Figma</th>
            <th>URL du Github</th>
            <th>URL du site</th>
            <th>Date de création</th>
            <th>Date de modification</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($projets as $projet) { ?>
            <tr>
                <td><?= $projet['id_projet']; ?></td>
                <td><?= $projet['titre']; ?></td>
                <td><?= $projet['image']; ?></td>
                <td><?= $projet['description']; ?></td>
                <td><?= $projet['role']; ?></td>
                <td><?= $projet['url_figma']; ?></td>
                <td><?= $projet['url_github']; ?></td>
                <td><?= $projet['url_site']; ?></td>
                <td><?= $projet['created_at']; ?></td>
                <td><?= $projet['modified_at']; ?></td>
                <td><?= $projet['status']; ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>