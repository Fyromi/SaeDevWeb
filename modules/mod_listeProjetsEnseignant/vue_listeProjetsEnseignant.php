<?php
class VueListeProjetsEnseignant {
    public function __construct() {}

    public function afficherMenue($projetResponsable,$projetIntervention) {
        if($_SESSION['role']=='responsable') $this->afficherMenueResponsable($projetResponsable,$projetIntervention);
        else $this->afficherMenueIntervenant($projetIntervention);
    }

    private function afficherMenueResponsable($projetResponsable,$projetsIntervention){

        echo '<pre>';
        echo 'Je suis responsable du projet '.$projetResponsable['titre'].'</br></br>';
    
        foreach ($projetsIntervention as $projetIntervention) {
            
            echo "J'interviens dans le projet ".$projetIntervention['titre'].'</br>';
            echo '</pres>';
        }
    }

    private function afficherMenueIntervenant($projetIntervention){
        echo 'Ici sera le menu des Intervenants';
    }
}
?>
