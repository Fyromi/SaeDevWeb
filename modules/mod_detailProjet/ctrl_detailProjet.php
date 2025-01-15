<?php
    include_once 'modele_detailProjet.php';
    include_once 'vue_detailProjet.php';

   class CtrlDetailProjet{

        private $vue;
        private $modele;
        private $action;

        public function __construct($vue, $modele) {
            $this->vue = new VueDetailProjet();
            $this->modele = new ModeleDetailProjet();
            if(isset($_GET['action']))
                $this->action = $_GET['action'];
        }

        public function exec(){

            switch ($this->action) {
                case 'descrProjet':
                   
                    break;
                case 'menu':
                        
                    break;

                default:
                        echo 'module correctement creer';           
                    break;
            }
        }

    }
    
?>