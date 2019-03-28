<?php
// Connexion à la base de données
try {
    $bdd = new PDO('mysql:host=localhost;dbname=facturetelephone;charset=utf8', 'root', 'mysql');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
// Préparation de la case à cocher
// Insertion du commentaire à l'aide d'une requête préparée
$req = $bdd->prepare('UPDATE transactions SET id = ?, compte_id = ?, commentaire = ?, montant = ?, retard = ? WHERE id = ?');
$req->execute(array($_POST['num'], $_POST['compte_id'], $_POST['commentaire'], $_POST['montant'], $_POST['retard'], $_POST['id_og']));

// Redirection du visiteur vers la page d'accueil du Blogue
// En commentaire si déboguage
header('Location: index.php');
?>
<!-- Pour déboguage -->
<html>
    <body>
		<h2>Mettre à jour une facture</h2>
        <form action="index.php">
            *** Pour déboguage ***<br />
            Voici le contenu de $_POST envoyé par le formulaire de modification et transmis à la requête : <br />
            <?php var_dump($_POST); ?>
            <input type="submit" value="Continuer">
        </form>
    </body>
</html>
