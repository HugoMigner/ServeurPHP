<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Facture téléphone</title>
</head>
<style>
    form
    {
        text-align:center;
    }
    a:hover
    {
        background-color: lightgreen;
    }
    a
    {
        display:inline-block;
        border: 1px solid black;
    }
    u
    {
        font-weight: bold;
    }
    strong
    {
        font-size: large;
    }
</style>
<body>
<a href="apropos.html">À propos</a>

<form action="facture_post.php" method="post">
    <p>
        <!--<label for="id">ID</label> : <input type="text" name="id" id="nom" /><br />-->
        <label for="compteid">CompteID</label> : <input type="text" name="compte_id" id="nom" /><br />
        <label for="commentaire">Commentaire</label> : <input type="text" name="commentaire" id="nom" /><br />
        Balance approximative : <br />
        <select name="montant">
            <option value="100">100</option>
            <option value="200">200</option>
            <option value="300">300</option>
            <option value="400">400</option>
        </select>
        <br />Retard?<br />
        <input type="radio" name="retard" value="oui" id="oui" checked="checked"/> <label for="oui">Oui</label>
        <input type="radio" name="retard" value="non" id="non"/> <label for="non">Non</label>
        <br />
        <input type="submit" value="Envoyer" />
    </p>
</form>

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

// Récupération des 10 derniers messages
$reponse = $bdd->query('SELECT id, compte_id, montant, commentaire, retard FROM transactions');

// Affichage de chaque message (toutes les données sont protégées par htmlspecialchars)
while ($donnees = $reponse->fetch())
{
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
            <td><a href="modifier_page.php?id=' . $donnees['id'] . '">&lt; modifier &gt;&nbsp;</a><a href="suppression_page.php?id=' . $donnees['id'] . '">&lt; supprimer &gt;</a></td>
        </tr>
    </table>';
}

$reponse->closeCursor();

?>
</body>
</html>