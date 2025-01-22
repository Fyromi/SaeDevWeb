<?php
// modules/mod_depot_devoirs/controleur_depotdevoirs.php

require_once 'modele_depotdevoirs.php';  // Inclure le modèle
require_once 'vue_depotdevoirs.php';  // Inclure la vue

class ControleurDepotDevoirs {
    private $modele;
    private $vue;
    private $action;

    public function __construct() {
        $this->modele = new ModeleDepotDevoirs();
        $this->vue = new VueDepotDevoirs();
        $this->action = isset($_GET["action"]) ? $_GET["action"] : "form_depot";
    }

    public function exec() {
        switch ($this->action) {
            case "form_depot":
                $this->form_depot();
                break;
            case "deposer_devoir":
                $this->deposer_devoir();
                break;
            default:
                die("Action inexistante");
        }
    }

    private function form_depot() {
        // Afficher le formulaire de dépôt
        $this->vue->afficherFormulaireDepot();
    }

    private function deposer_devoir() {
        // Gérer le dépôt du devoir (envoi de fichier)
        $this->vue->confirmationDepot();
    }
}
?>
