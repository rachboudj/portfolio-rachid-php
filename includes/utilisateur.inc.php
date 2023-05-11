<h1>Les utilisateurs</h1>

<?php 

$sql = "SELECT * FROM utilisateurs ORDER BY id_utilisateur DESC";
$query = pdo()->prepare($sql);
$query->execute();
$utilisateurs = $query->fetchAll();

?>

<table>
    <thead>
        <tr>
            <th>id</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Email</th>
            <th>Mots de passe</th>
            <th>Rôle</th>
            <th colspan="2">Opérations</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($utilisateurs as $utilisateur) { ?>
            <tr>
                <td><?= $utilisateur['id_utilisateur']; ?></td>
                <td><?= $utilisateur['nom']; ?></td>
                <td><?= $utilisateur['prenom']; ?></td>
                <td><?= $utilisateur['email']; ?></td>
                <td><?= $utilisateur['mdp']; ?></td>
                <td><?= $utilisateur['role']; ?></td>
                <td><a href="index.php?page=modifUtilisateur&amp;usersId=<?= $utilisateur['id_utilisateur'] ?>">Éditer</a></td>
                <td><a href="index.php?page=supprimerUtilisateur&amp;usersId=<?= $utilisateur['id_utilisateur'] ?>">Supprimer</a></td>
            </tr>
        <?php } ?>
    </tbody>
</table>