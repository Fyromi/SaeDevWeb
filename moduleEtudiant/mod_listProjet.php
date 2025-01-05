<?php
include_once 'modele_listProjet.php';
include_once 'vue_listProjet.php';
include_once 'ctrl_listProjet.php';
include_once 'Connexion.php';
Connexion::connect();

new CtrlListProjet(new VueListProjet(), new ModeleListProjet());

?>

<h1>test</h1>