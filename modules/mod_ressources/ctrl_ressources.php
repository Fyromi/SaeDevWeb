<?php
    include_once 'modele_ressources.php';
    include_once 'vue_ressources.php';

   class CtrlRessources{

        private $vue;
        private $modele;
        private $action;

        public function __construct($vue, $modele) {
            $this->vue = new VueRessources();
            $this->modele = new ModeleRessources();
            if(isset($_GET['action']))
                $this->action = $_GET['action'];
        }

        public function exec(){

            switch ($this->action) {
                case 'menue':
                    $idProjet = $_GET['idProjet'];
                    echo "test mon reuf";
                    break;
                default:
                    break;
            }
        }

    }
    
?>