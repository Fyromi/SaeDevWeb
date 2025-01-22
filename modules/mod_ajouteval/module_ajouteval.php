<?php
require_once "modules/mod_ajouteval/controleur_ajout.php";

Class ModAjoutEval extends ModuleGenerique {
    public function __construct () {
        parent::__construct();
        $this->controleur = new ControleurAjoutEvaluation();
    }
}
