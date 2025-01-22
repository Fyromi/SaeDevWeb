<?php
    include_once 'modele_DEPOT.php';
    include_once 'vue_DEPOT.php';

   class CtrlDEPOT{

        private $vue;
        private $modele;
        private $action;

        public function __construct($vue, $modele) {
            $this->vue = new VueDEPOT();
            $this->modele = new ModeleDEPOT();
            if(isset($_GET['action'])) {
                $this->action = $_GET['action'];
            }
        }

        public function exec(){
            
            $this->vue->afficherDepot();
            switch ($this->action) {
                case 'ajoutDepot': 
                    $this->modele->ajoutDepot();
                    break;
                default:    
                    break;
            }
            
        }
    }
    
?>