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

$reponse = $bdd->query('DELETE FROM transactions WHERE id = ' . $_GET['id']);

$donnees = $reponse->fetch();
$reponse->closeCursor();
header('Location: index.php');