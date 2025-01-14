<?php
include_once 'modele_listeProjetsEnseignant.php';
include_once 'vue_listeProjetsEnseignant.php';
include_once 'ctrl_listeProjetsEnseignant.php';
require_once "modules/mod_connexion/controleur_connexion.php";

class ModlisteProjetsEnseignant extends ModuleGenerique{
    public function __construct () {
		parent::__construct();
		$this->controleur = new CtrlListeProjetsEnseignant(new VueListeProjetsEnseignant(), new ModeleListeProjetsEnseignant());
    }
}

?>