<?php
class VueENSEIGNANTS {
    public function __construct() {}

    public function afficherMenue($projetResponsable, $projetIntervention) {
        echo '<div class="container py-4">';
        
        if ($_SESSION['role'] == 'responsable') {
            $this->afficherMenueResponsable($projetResponsable, $projetIntervention);
        } else {
            $this->afficherMenueIntervenant($projetIntervention);
        }

        echo '</div>';
    }

    private function afficherMenueResponsable($projetResponsables, $projetsIntervention) {
        echo '<div class="mb-5">';
        echo '<div style="width: 450px; height:100%">';
        echo '<h3 class="border-bottom border-secondary pb-3 mb-5">Mes Projets</h3>';
        echo '</div>';
        if ($projetResponsables != null) {
            echo '<div class="row">';
            echo '<div class="col-lg-6 mb-9" height:100%;>';
            foreach ($projetResponsables as $projetResponsable) {
                
            
                echo "<a href='index.php?module=DETAILS&idProjet=" . $projetResponsable['idProjet'] . "' class='text-decoration-none'>";
                // Ajusté pour avoir la même hauteur que le bouton Créer projet
                echo '<div class="card shadow-sm" style="width: 600px; ">';
                    echo '<img src="images/imageGrp.jpg" class="card-img-top" alt="Projet" style="height: 100px; object-fit: cover;">'; // Réduit la hauteur
                    echo '<div class="card-body text-center py-2">'; // Réduit le padding vertical
                    echo '<h5 class="card-title fs-3 mb-0">' . $projetResponsable['titre'] . '</h5>'; // Supprimé la marge du bas
                echo '</div>';
                echo '</div>';
                echo '</a>';
         }
            echo '</div>';
            echo '<div class="col-lg-4 offset-lg-1 d-flex align-items-center">';
            $this->creerSAE();
            echo '</div>';
            echo '</div>';
        }
        echo '</div>';
        $this->afficherMenueIntervenant($projetsIntervention);
    }
    
    private function afficherMenueIntervenant($projetsIntervention) {
        if ($projetsIntervention != null) {
            echo '<div class="mt-5">'; // Augmenté margin
            // Augmenté la largeur de la barre
            echo '<div style="width: 450px;">'; // Augmenté de 200px à 450px
            echo '<h3 class="border-bottom border-secondary pb-3 mb-5">Intervention Projet</h3>'; // Augmenté padding et margin
            echo '</div>';
            echo '<div>';
            foreach ($projetsIntervention as $projetIntervention) {
                echo '<div class="mb-4" style="width: 600px;">'; // Doublé la largeur et augmenté margin
                echo "<a href='index.php?module=DETAILS&idProjet=".$projetIntervention['idProjet'] . "' class='text-decoration-none'>";
                echo '<div class="card shadow-sm">';
                echo '<div class="card-body text-center py-4">'; // Augmenté le padding
                echo '<h5 class="card-title fs-3">' . $projetIntervention['titre'] . '</h5>'; // Augmenté la taille de police
                echo '</div>';
                echo '</div>';
                echo '</a>';
                echo '</div>';
            }
            echo '</div>';
            echo '</div>';
        }
    }
    
    private function creerSAE() {
        echo "<a href='index.php?module=CREATION' class='text-decoration-none'>";
        echo '<div class="card shadow-sm text-center" style="width: 400px; height: 250px; border-radius: 15px; background-color: #f8f9fa;">'; 
        echo '<div class="card-body d-flex flex-column justify-content-center align-items-center">';
        echo '<img src="icons/plus.png" alt="Créer un projet" style="width: 100px; height: 100px;">';
        echo '<h5 class="card-title mt-3 fs-4" style="color: #000;">Créer un projet</h5>';
        echo '</div>';
        echo '</div>';
        echo '</a>';
    
    }
}
?>
