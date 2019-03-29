<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Modifier une facture</title>
</head>
<style>
    form
    {
        text-align:center;
    }
</style>
<body>


<?php
// Connexion à la base de données
try {
    $bdd = new PDO('mysql:host=localhost;dbname=facturetelephone;charset=utf8', 'root', 'mysql');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

// Récupération du message à modifier
$reponse = $bdd->query('SELECT * FROM transactions WHERE id = ' . $_GET['id']);

// Affichage du message à modifer (toutes les données externes sont protégées par htmlspecialchars)
$donnees = $reponse->fetch();
$reponse->closeCursor();
?>


<form action="modifier_post.php" method="post">
    <h2>Modifier une facture</h2>
    <p>
        <!--<label for="id">ID</label> : <input type="text" name="num" value="<?php echo htmlspecialchars($donnees['id']); ?>" /><br />-->
        <label for="compte_id">Compte ID</label> :  <input type="text" name="compte_id" id="titre" value="<?php echo htmlspecialchars($donnees['compte_id']); ?>" /><br />
        <label for="commentaire">Commentaire</label> :  <textarea type="text" name="commentaire" id="texte" ><?php echo htmlspecialchars($donnees['commentaire']); ?></textarea><br />
        <label for="montant">Montant</label>
        <select name="montant">
            <option value="100"<?php if ($donnees['montant'] == 100) echo ' selected="selected"'; ?>>100</option>
            <option value="200"<?php if ($donnees['montant'] == 200) echo ' selected="selected"'; ?>>200</option>
            <option value="300"<?php if ($donnees['montant'] == 300) echo ' selected="selected"'; ?>>300</option>
            <option value="400"<?php if ($donnees['montant'] == 400) echo ' selected="selected"'; ?>>400</option>
        </select> <br />
        <input type="radio" name="retard" value="oui" id="oui" checked="checked"/> <label for="oui">Oui</label>
        <input type="radio" name="retard" value="non" id="non"/> <label for="non">Non</label>
        <input type="hidden" name="id_og" value="<?php echo $donnees['id']; ?>" />
        <input type="submit" value="Modifier" />
        <a href="index.php"><input type="button" value="Annuler" /></a>
    </p>
</form>
</body>
</html>