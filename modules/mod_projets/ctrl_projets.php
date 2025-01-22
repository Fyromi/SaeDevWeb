<?php
    include_once 'modele_projets.php';
    include_once 'vue_projets.php';

   class CtrlPROJETS{

        private $vue;
        private $modele;
        private $action;

        public function __construct($vue, $modele) {
            $this->vue = new VuePROJETS();
            $this->modele = new ModelePROJETS();
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