<?php

require 'Modele/Modele.php';

function accueil() {
    $transactions = getTransactions();
    require 'Vue/vueAccueil.php';
}

function transaction($idTransaction, $erreur) {
    $transaction = getTransaction($idTransaction);
    $codesrabais = getCodesRabais($idTransaction);
    require 'Vue/vueTransaction.php';
}

function codeRabais($coderabais) {
    if (!filter_var($coderabais['transaction_id'], FILTER_VALIDATE_INT) === false) {
        setCodeRabais($coderabais);
        header('Location: index.php?action=transaction&id=' . $coderabais['transaction_id']);
    } else {
        header('Location: index.php?action=transaction&id=' . $coderabais['transaction_id'] . '&erreur=courriel');
    }
}

function confirmer($id) {
    $coderabais = getCodeRabais($id);
    require 'Vue/vueConfirmer.php';
}

function supprimer($id) {
    $coderabais = getCodeRabais($id);
    deleteCodeRabais($id);
    header('Location: index.php?action=transaction&id=' . $coderabais['transaction_id']);
}

function nouvelleTransaction() {
    require 'Vue/vueAjouter.php';
}

function ajouter($transaction) {
    setTransaction($transaction);
    header('Location: index.php');
}

function quelsTypes($term) {
    echo searchType($term);
}
function erreur($msgErreur) {
    require 'Vue/vueErreur.php';
}
