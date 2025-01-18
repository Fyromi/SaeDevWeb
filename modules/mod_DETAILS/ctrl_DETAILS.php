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

            $etudiantSansGrp = $this->modele->getEtudiantSansGrp();
            $projet = $this->modele->getProjet();
            $intervenantLibre = $this->modele->getIntervenantLibre();
            $estResponsableDe = $this->modele->estResponsableDe();
            $intervenantPris = $this->modele->getIntervenantPris();
            $groupeAndEtudiant = $this->modele->groupeAndEtudiant();

            switch ($this->action) {
                case 'creerGrp':
                    $this->modele->ajoutGroupeBD();
                    break;
                case 'ajtInter':
                    $this->modele->ajoutIntervenantBD();
                    break;
                case 'depDocu' :
                    $this->modele->importFile();
                    break;
                case 'creerDepot' : 
                    $this->modele->creerDepot();
                    break;
                case 'deleteIntervenant' :
                    $this->modele->deleteIntervenant();
                    break;w
                case 'deleteGroupe' :
                    $this->modele->deleteGroupe();
                    break;
                case 'deleteUserGroupe' :
                    $this->modele->deleteUserGroupe();
                    break;
                default:
                    break;
            }
            $this->vue->vueDetailProjet($etudiantSansGrp,$projet, $intervenantLibre, $estResponsableDe,$intervenantPris, $groupeAndEtudiant);
        }
    }
    
?>