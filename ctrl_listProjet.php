<?php
    include_once 'modele_lisProjet.php';
    include_once 'vue_listProjet.php';

   class CtrlListProjet{

        private $vue;
        private $modele;

        public function __construct($vue, $modele) {
            $this->vue = new VueListProjet();
            $this->modele = new ModeleListProjet();
            $this->start();
        }

        private function start(){

            $projet = $this->modele->getProjets();
            $this->vue->afficherListProjet($projet);
        }

    }
    
?>