<?php
require_once "modules/mod_ajoutnote/controleur_ajoutnote.php";

Class ModAjoutNote extends ModuleGenerique {
    public function __construct () {
        parent::__construct();
        $this->controleur = new ControleurAjoutNote();
    }
}
?>
