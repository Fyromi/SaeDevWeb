<?php
include_once 'modele_enseignants.php';
include_once 'vue_enseignants.php';
include_once 'ctrl_enseignants.php';
require_once "modules/mod_connexion/controleur_connexion.php";

class ModEnseignants extends ModuleGenerique{
    public function __construct () {
		parent::__construct();
		$this->controleur = new CtrlENSEIGNANTS(new VueENSEIGNANTS(), new ModeleENSEIGNANTS());
    }
}

?>