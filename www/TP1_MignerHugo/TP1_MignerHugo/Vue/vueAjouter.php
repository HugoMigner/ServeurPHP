<?php $titre = "Transactions Telephone"; ?>

<?php ob_start(); ?>
<header>
    <h1 id="titreReponses">Ajouter une transaction :</h1>
</header>
<form action="index.php?action=ajouter" method="post">
    <h2>Ajouter une transaction</h2>
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
        <input type="submit" value="Ajouter" />
    </p>
</form>

<?php $contenu = ob_get_clean(); ?>

<?php require 'Vue/gabarit.php'; ?>
