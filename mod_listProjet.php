<?php
include_once 'modele_lisProjet.php';
include_once 'vue_listProjet.php';
include_once 'ctrl_listProjet.php';
include_once 'Connexion.php';


$vue = new VueListProjet();
$modele = new ModeleListProjet();
new CtrlListProjet($vue, $modele);

?>