<?php
class VueRESSOURCES {
    public function __construct() {}

    public function afficherProjet($documents, $consignes, $depots) {
        ?>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
        <div class="row">
            <div class="col-sm-10 col-xs-6 col-9">
                <h3 class="border-bottom border-secondary pb-3">Documents</h3>
            </div>
            <div class="col-sm-1 col-xs-1 col-1 text-end">
                <a href="index.php?module=Projets&action=menu" class="btn">
                    <div class="card shadow-sm text-center p-1">
                        <img class="card-img m-0" src="icons/retour.png" alt="Retour">
                        <span class="card-title h6">Retour</span>
                    </div>
                </a>
            </div>
        </div>
        <div class="row pb-5 scrollable-section">
            <?php $this->afficherSection($documents, "icons/Document.png", "lienRessource", "nomRessource");?>
        </div>
        
        <div class="row">
            <div class="col-10">
                <h3 class="border-bottom border-secondary pb-3">Consignes</h3>
            </div>
        </div>
        <div class="row pb-5 scrollable-section">
            <?php $this->afficherSection($consignes, "icons/Consigne.png", "lienRessource", "nomRessource");?>
        </div>

        <div class="row">
            <div class="col-10">
                <h3 class="border-bottom border-secondary pb-3">Dépôts</h3>
            </div>
        </div>
        <div class="row pb-5 scrollable-section">
            <?php $this->afficherSection($depots, "icons/Depot.png", "lienDepot", "nomRendu", true);?>
        </div>
        <?php
    }

    private function afficherSection($elements, $iconPath, $linkKey, $nameKey, $isDepot = false) {
        foreach (array_slice($elements, 0, count($elements)) as $element) {
            // Vérification spécifique pour les consignes
            if ($nameKey == 'nomRessource' && $iconPath == 'icons/Consigne.png') {
                // Lien pour les consignes
                $link = 'index.php?module=Ressources&action=consignes&id=' . htmlspecialchars($element['idRessource']);
            } else {
                // Pour les autres ressources
                $link = $isDepot ? 'index.php?module=Depot' : (isset($element[$linkKey]) ? htmlspecialchars($element[$linkKey]) : '#');
            }

            // Affichage du lien avec les éléments
            echo '<div class="col-4 border-end border-dark p-1 px-3">';
            echo '  <div class="card shadow text-center">';
            echo '      <a href="' . $link . '" class="btn btn-light border">';
            echo '        <div class="row">';
            echo '          <div class="col-sm-4 col-lg-2">';
            echo '              <img src="' . htmlspecialchars($iconPath) . '" class="card-img m-0">';
            echo '          </div>';
            echo '          <div class="col text-center pt-2">';
            echo '              <h6 >' . htmlspecialchars($element[$nameKey]) . '</h6>';
            echo '          </div>';
            echo '        </div>';
            echo '      </a>';
            echo '  </div>';
            echo '</div>';
        }
    }
}
?>
