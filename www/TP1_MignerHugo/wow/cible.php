<!DOCTYPE html>
<html>
<head>
    <title>Coucou</title>
</head>
<body>
<p>Bonjour !</p>

<p>Je sais comment tu t'appelles, hé hé. Tu t'appelles <?php echo $_POST['prenom']; ?>
    ! <?php echo htmlspecialchars($_POST['message']); ?></p>
<p>Choix <?php echo $_POST['choix']; ?></p>
<?php $caseacocher = (isset($_POST['caseacocher'])) ? 1 : 0; ?>
<p>Case <?php echo $caseacocher ?>
<p>Frites <?php echo $_POST['frites']; ?></p>
<p>Si tu veux changer de prénom, <a href="index.php">clique ici</a> pour revenir à la page index.php.</p>
</body>
</html>