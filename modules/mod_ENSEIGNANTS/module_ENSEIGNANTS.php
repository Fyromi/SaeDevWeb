<?php
include_once 'modele_ENSEIGNANTS.php';
include_once 'vue_ENSEIGNANTS.php';
include_once 'ctrl_ENSEIGNANTS.php';
require_once "modules/mod_connexion/controleur_connexion.php";

class ModENSEIGNANTS extends ModuleGenerique{
    public function __construct () {
		parent::__construct();
		$this->controleur = new CtrlENSEIGNANTS(new VueENSEIGNANTS(), new ModeleENSEIGNANTS());
    }
}

?>