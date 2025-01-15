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