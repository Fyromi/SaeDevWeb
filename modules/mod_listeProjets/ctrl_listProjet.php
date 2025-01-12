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
        }

        public function exec(){

            switch ($this->action) {
                case 'descrProjet':
                    $idProjet = $_GET['id'];
                    $projet = $this->modele->getProjet($idProjet);
                    $profs = $this->modele->getProfProjet($idProjet);
                    $groupe = [$this->modele->getMemebreGrp($idProjet), $this->modele->getNomGrp($idProjet)];

                    $this->vue->afficherDetailProjet($projet,$profs,$groupe);
                    
                    break;
                case 'menu':
                        $this->vue->afficherMenue();
                    break;

                default:
                    $projet = $this->modele->getList();
                    $this->vue->afficherListProjet($projet);                  
                    break;
            }
        }

    }
    
?>