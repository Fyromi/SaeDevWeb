<?php
class VueENSEIGNANTS {
    public function __construct() {}

    public function afficherMenue($projetResponsable, $projetIntervention) {
        if ($_SESSION['role'] == 'responsable') {
            $this->afficherMenueResponsable($projetResponsable, $projetIntervention);
        } else {
            $this->afficherMenueIntervenant($projetIntervention);
        }
    }

    private function afficherMenueResponsable($projetResponsables, $projetsIntervention) {
        echo '<div class="row pb-5">';
        echo '  <div class="col-sm-10 col-xs-6 col-9">';
        echo '      <h3 class="border-bottom border-secondary pb-3">Mes Projets</h3>';
        echo '  </div>';
        $this->creerSAE();
        if ($projetResponsables != null) {
            foreach ($projetResponsables as $projetResponsable) {
                $titreProjet = htmlspecialchars($projetResponsable['titre']); 
                $idProjet = htmlspecialchars($projetResponsable['idProjet']);
                echo '<div class="col-6 mb-2">';
                echo "  <a href='index.php?module=Details&idProjet=" . $idProjet . "' class='text-decoration-none'>";
                echo '      <div class="card shadow-sm">';
                echo '          <div class="card-body text-center p-0">';
                echo '              <h5 class="card-title fs-3 p-3 mb-0">' . $titreProjet . '</h5>';
                echo '              <img src="images/imageGrp.jpg" class="card-img m-0" alt="Projet">'; 
                echo '          </div>';
                echo '      </div>';
                echo '  </a>';
                echo '</div>';
            }

        }
        echo '</div>';
        $this->afficherMenueIntervenant($projetsIntervention);
    }
    
    private function afficherMenueIntervenant($projetsIntervention) {
        if ($projetsIntervention != null) {
            echo '<div class="row pb-5">';
            echo '  <div class="col-10">';
            echo '      <h3 class="border-bottom border-secondary pb-3">Intervention Projet</h3>';
            echo '  </div>';
            foreach ($projetsIntervention as $projetIntervention) {
                $titreIntervention = htmlspecialchars($projetIntervention['titre']); 
                $idProjetIntervention = htmlspecialchars($projetIntervention['idProjet']);
                echo '<div class="col-6 mb-2">';
                echo "  <a href='index.php?module=Details&idProjet=" . $idProjetIntervention . "' class='text-decoration-none'>";
                echo '      <div class="card shadow-sm">';
                echo '          <div class="card-body text-center py-4">';
                echo '              <h5 class="card-title fs-3 p-3 mb-0">' . $titreIntervention . '</h5>';
                echo '          </div>';
                echo '      </div>';
                echo '  </a>';
                echo '</div>';
            }
            echo '</div>';
        }
    }

    private function creerSAE() {
        echo '<div class="col-sm-2 col-xs-2 col-3 text-end">';
        echo '    <a href="index.php?module=Creation" class="btn">';
        echo '        <div class="card shadow-sm text-center">';
        echo '                <img class="card-img m-0" src="icons/plus.png" alt="Créer un projet">';
        echo '                <span class="card-title h6">Créer un projet</span>';
        echo '        </div>';
        echo '    </a>';
        echo '</div>';
    }
}
?>
