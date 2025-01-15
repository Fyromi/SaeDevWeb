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
                case 'creer':
                    $this->modele->ajoutGroupeBD($_GET['idProjet']);
                
                default:
                    $etudiantSansGrp = $this->modele->getEtudiantSansGrp($_GET['idProjet']);
                    $projet = $this->modele->getProjet($_GET['idProjet']);
                    $this->vue->vueDetailProjet($etudiantSansGrp,$projet);
                    break;
            }
            
            
        }

    }
    
?>