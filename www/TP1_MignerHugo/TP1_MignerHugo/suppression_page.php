<?php
// Connexion à la base de données
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=facturetelephone;charset=utf8', 'root', 'mysql');
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}

$reponse = $bdd->query('SELECT * FROM transactions WHERE id = ' . $_GET['id']);

$donnees = $reponse->fetch();
$reponse->closeCursor();



echo '
    <table>
        <tr>
            <td><strong>Statut de la facture:</strong></td>
        </tr>
        <tr>
            <td><u>ID</u>: ' . htmlspecialchars($donnees['id']) . '</td>
        </tr>
        <tr>
            <td><u>Numéro de compte</u>: ' . htmlspecialchars($donnees['compte_id']) . '</td>
        </tr>
        <tr>
            <td><u>Commentaire</u>: ' . htmlspecialchars($donnees['commentaire']) . '</td>
        </tr>
        <tr>
            <td><u>Balance approximative</u>: ' . htmlspecialchars($donnees['montant']) . '</td>
        </tr>
        <tr>
            <td><u>Retard</u>: ' . htmlspecialchars($donnees['retard']) . '</td>
        </tr>
        <tr>
            <td><u>Voulez-vous vraiment supprimer?      </u><a href="suppression_post.php?id=' . $donnees['id'] . '">&lt; supprimer &gt;</a>   <a href="index.php">&lt; annuler &gt;</a></td>
        </tr>
    </table>';