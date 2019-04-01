<?php $titre = "Gestionnaire de transactions - Transaction #" . $transaction['id']; ?>

<?php ob_start(); ?>
<article>
    <header>
        <h1 class="titreArticle">Transaction #<?= $transaction['id'] ?></h1>
        <p>Facture de <?= $transaction['montant'] ?>$</p>Par compte #<?= $transaction['compte_id'] ?>
    </header>
    <p><?= $transaction['commentaire'] ?></p>
    <p>Retard: <?= $transaction['retard'] ?></p>
</article>
<hr />
<hr />
<header>
    <h1 id="titreCoupons">Coupons rabais associés à la transaction #<?= $transaction['id'] ?> :</h1>
</header>
<?php foreach ($codesrabais as $coderabais): ?>
    <p><a href="../index.php?action=confirmer&id=<?= $coderabais['id'] ?>" >
            [Supprimer]
        </a>
        Coupon #<?= $coderabais['id'] ?> pour la transaction #<?= $transaction['id'] ?>, <?= $coderabais['nom'] ?>
        , donne un rabais de <?= $coderabais['pourcentage'] ?>%.<br/>
    </p>
<?php endforeach; ?>

<hr />
<hr />

<form action="index.php?action=coderabais" method="post">
    <h2>Ajouter un coupon rabais</h2>
    <p>
        <label for="transaction_id">ID de la transaction</label> : <input type="text" name="compte_id" id="nom" /><br />
        <label for="nom">Description du coupon</label> : <input type="text" name="commentaire" id="nom" /><br />
        Pourcentage de rabais :
        <select name="pourcentage">
            <option value="10">10</option>
            <option value="15">15</option>
            <option value="20">20</option>
            <option value="25">25</option>
            <option value="30">30</option>
            <option value="35">35</option>
            <option value="40">40</option>
            <option value="45">45</option>
            <option value="50">50</option>
        </select>
        <br />
        <input type="submit" value="Envoyer" />
    </p>
</form>

<?php $contenu = ob_get_clean(); ?>

<?php require 'Vue/gabarit.php'; ?>
