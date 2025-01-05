<?php
    include_once 'modele_listProjet.php';
    include_once 'vue_listProjet.php';

   class CtrlListProjet{

        private $vue;
        private $modele;
        private $action;

        public function __construct($vue, $modele) {
            $this->vue = new VueListProjet();
            $this->modele = new ModeleListProjet();
            if(isset($_GET['action']))
                $this->action = $_GET['action'];
            $this->start();
        }

        private function start(){

            if($this->action =='descrProjet'){

                $idProjet = $_GET['id'];
                $this->vue->afficherDetailProjet($this->modele->getProjet($idProjet));
            }
            else{
                $projet = $this->modele->getList();
                $this->vue->afficherListProjet($projet);
            }
        }

    }
    
?>