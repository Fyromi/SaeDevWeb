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
        //echo '  <div style="width: 450px; height:100%">';
        echo '      <h3 class="border-bottom border-secondary pb-3 mb-5">Mes Projets</h3>';
        //echo '  </div>';
        echo '<div class="row">';
        if ($projetResponsables != null) {
            echo '<div class="col-lg-6 mb-9" style="height:100%;">'; // Corrigé le problème de "height"
            foreach ($projetResponsables as $projetResponsable) {
                echo "<a href='index.php?module=DETAILS&idProjet=" . $projetResponsable['idProjet'] . "' class='text-decoration-none'>";
                echo '<div class="card shadow-sm" style="width: 600px; margin-top: 2em;">';
                echo '  <div class="card-body text-center p-0">'; // Supprimé le padding

                // Titre maintenant avec un padding spécifique
                echo '      <h5 class="card-title fs-3 p-3 mb-0">' . $projetResponsable['titre'] . '</h5>';

                // Image sans marge ni padding
                echo '      <img src="images/imageGrp.jpg" class="card-img m-0" alt="Projet" style="height: 150px; object-fit: cover; width: 100%;">'; 
                echo '  </div>';
                echo '</div>';
                echo '</a>';
            }
            echo '</div>';
        }
        $this->creerSAE();
        echo '</div>';
        $this->afficherMenueIntervenant($projetsIntervention);
    }
    
    private function afficherMenueIntervenant($projetsIntervention) {
        if ($projetsIntervention != null) {
            echo '<div class="mt-5">';
            echo '  <div style="width: 450px;">';
            echo '      <h3 class="border-bottom border-secondary pb-3 mb-5">Intervention Projet</h3>';
            echo '  </div>';
            echo '<div>';
            foreach ($projetsIntervention as $projetIntervention) {
                echo '<div class="mb-4" style="width: 600px;">';
                echo "  <a href='index.php?module=DETAILS&idProjet=".$projetIntervention['idProjet'] . "' class='text-decoration-none'>";
                echo '  <div class="card shadow-sm">';
                echo '      <div class="card-body text-center py-4">';
                echo '          <h5 class="card-title fs-3">' . $projetIntervention['titre'] . '</h5>';
                echo '      </div>';
                echo '  </div>';
                echo '  </a>';
                echo '</div>';
            }
        }
    }

    private function creerSAE() {
        echo '<div class="col-lg-6 mb-9">';
        echo "  <a href='index.php?module=CREATION' class='text-decoration-none'>";
        echo '  <div class="card shadow-sm text-center" style="width: 400px; height: 250px; border-radius: 15px; background-color: #f8f9fa;">'; 
        echo '      <div class="card-body d-flex flex-column justify-content-center align-items-center">';
        echo '          <img src="icons/plus.png" alt="Créer un projet" style="width: 100px; height: 100px;">';
        echo '          <h5 class="card-title mt-3 fs-4" style="color: #000;">Créer un projet</h5>';
        echo '      </div>';
        echo '  </div>';
        echo '  </a>';
        echo '</div>';
    }
}
?>
