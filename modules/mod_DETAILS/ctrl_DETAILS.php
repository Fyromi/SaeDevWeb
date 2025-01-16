<?php
    include_once 'modele_DETAILS.php';
    include_once 'vue_DETAILS.php';

   class CtrlDETAILS{

        private $vue;
        private $modele;
        private $action;

        public function __construct($vue, $modele) {
            $this->vue = new VueDETAILS();
            $this->modele = new ModeleDETAILS();
            if(isset($_GET['action']))
                $this->action = $_GET['action'];
        }

        public function exec(){

            $etudiantSansGrp = $this->modele->getEtudiantSansGrp($_GET['idProjet']);
            $projet = $this->modele->getProjet($_GET['idProjet']);
            $intervenant = $this->modele->getIntervenant($_GET['idProjet']);
            $this->vue->vueDetailProjet($etudiantSansGrp,$projet, $intervenant);
            
            switch ($this->action) {
                case 'creerGrp':
                    $this->modele->ajoutGroupeBD($_GET['idProjet']);
                    break;
                case 'ajtInter':
                    $this->modele->ajoutIntervenantBD($_GET['idProjet']);
                    break;
                case 'depDocu' :
                    $this->modele->importFile($_GET['idProjet']);
                    break;
                default:
                    break;
            }
        }
    }
    
?>