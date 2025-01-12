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
                    
                    $pairProf = $this->modele->getPaireNomImage($profs);
                    $pairEtudiant = $this->modele->getPaireNomImage($this->modele->getMemebreGrp($idProjet));

                    $groupe = [$this->modele->getNomGrp($idProjet), $pairEtudiant];

                    /*echo '<pre>';
                    print_r($pairProf);
                    print_r($groupe[1]);
                    echo '</pre>';
*/
                    $this->vue->afficherDetailProjet($projet,$pairProf,$groupe);

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