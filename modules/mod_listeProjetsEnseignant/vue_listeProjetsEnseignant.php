<?php
class VueListeProjetsEnseignant {
    public function __construct() {}

    public function afficherMenue() {
        if($_SESSION['role']=='responsable') afficherMenueResponsable();
        else afficherMenueIntervenant();
    }

    private function afficherMenueResponsable(){
        echo 'Ici sera le menu des Responsables';
    }

    private function afficherMenueIntervenant(){
        echo 'Ici sera le menu des Intervenants';
    }
}
?>
