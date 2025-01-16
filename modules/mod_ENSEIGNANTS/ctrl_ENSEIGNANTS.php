<?php
    include_once 'modele_ENSEIGNANTS.php';
    include_once 'vue_ENSEIGNANTS.php';

   class CtrlENSEIGNANTS{

        private $vue;
        private $modele;
        private $action;

        public function __construct($vue, $modele) {
            $this->vue = new VueENSEIGNANTS();
            $this->modele = new ModeleENSEIGNANTS();
            if(isset($_GET['action']))
                $this->action = $_GET['action'];
        }

        public function exec(){

            switch ($this->action) {
                case 'menu':
                        $projetResponsable = $this->modele->getProjetResponsable();
                        $afficherMenueIntervenant =  $this->modele->getInterventionProjet();
                        $this->vue->afficherMenue($projetResponsable,$afficherMenueIntervenant);
                    break;

                default:
                    $projet = $this->modele->getList();
                    $this->vue->afficherListProjet($projet);                  
                    break;
            }
        }

    }
    
?>