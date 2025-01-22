<?php
    include_once 'modele_RESSOURCES.php';
    include_once 'vue_RESSOURCES.php';

   class CtrlRESSOURCES{

        private $vue;
        private $modele;
        private $action;

        public function __construct($vue, $modele) {
            $this->vue = new VueRESSOURCES();
            $this->modele = new ModeleRESSOURCES();
            if(isset($_GET['action'])) {
                $this->action = $_GET['action'];
            }
        }

        public function exec(){

            switch ($this->action) {
                case 'menue':
                    $idProjet = $_GET['idProjet'];
                    $documents = $this->modele->getRessourcesByType($idProjet, 'documents');
                    $consigne = $this->modele->getRessourcesByType($idProjet,'consignes');
                    $depot = $this->modele->getDepot($idProjet);
                    $important = $this->modele->getRessourcesEnAvantByType($idProjet);
                    $this->vue->afficherProjet($documents, $consigne, $depot, $important);
                    break;
                default:
                    break;
            }
        }

    }
    
?>