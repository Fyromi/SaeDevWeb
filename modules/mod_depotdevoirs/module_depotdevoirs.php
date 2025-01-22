<?php
// modules/mod_depot_devoirs/module_depotdevoirs.php

require_once 'ctrl_depotdevoirs.php';  // Inclure le contrôleur

class Moddepotdevoirs extends ModuleGenerique {
    public function __construct() {
        parent::__construct();
        $this->controleur = new ControleurDepotDevoirs();
    }
}
?>
