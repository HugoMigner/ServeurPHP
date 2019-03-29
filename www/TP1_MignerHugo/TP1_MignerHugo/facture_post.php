
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

// Insertion du message à l'aide d'une requête préparée
$req = $bdd->prepare('INSERT INTO transactions (id, compte_id, montant, commentaire, retard) VALUES(null, ?, ?, ?, ?)');
$req->execute(array($_POST['compte_id'], $_POST['montant'], $_POST['commentaire'], $_POST['retard']));

// Redirection du visiteur vers la page de la facture
header('Location: index.php');
?>