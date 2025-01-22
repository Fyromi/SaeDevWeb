<?php
class VueRESSOURCES {
    public function __construct() {}

    public function afficherProjet($documents, $consignes, $depots, $important) {
        ?>
        <div class="row">
            <div class="col-sm-10 col-xs-6 col-9"></div>
            <div class="col-sm-1 col-xs-1 col-1 text-end">
                <a href="index.php?module=Projets&action=descrProjet&idProj&id=<?=$_GET['idProjet']?>" class="btn">
                    <div class="card shadow-sm text-center p-1">
                        <img class="card-img m-0" src="icons/retour.png" alt="Retour">
                        <span class="card-title h6">Retour</span>
                    </div>
                </a>
            </div>

            <?php if($important!=null){ ?>
                <div class="">
                    <h3 class="border-bottom border-secondary pb-3">Important</h3>
                </div>
                <div class="row pb-5 scrollable-section">
                    <?php $this->afficherSection($important, "icons/Attention.png", "lienRessource", "nomRessource");?>
                </div>
            <?php } ?>

            <?php if($documents!=null){ ?>
                <div class="">
                    <div class="col-sm-10">
                        <h3 class="border-bottom border-secondary pb-3">Documents</h3>
                    </div>
                </div>
                <div class="row pb-5 scrollable-section">
                    <?php $this->afficherSection($documents, "icons/Document.png", "lienRessource", "nomRessource");?>
                </div>
            <?php } ?>

            <?php if($consignes!=null){ ?>
                <div class="">
                    <div class="col-10">
                        <h3 class="border-bottom border-secondary pb-3">Consignes</h3>
                    </div>
                </div>
                <div class="row pb-5 scrollable-section">
                    <?php $this->afficherSection($consignes, "icons/Consigne.png", "lienRessource", "nomRessource");?>
                </div>
            <?php } ?>
            
            <?php if($depots!=null){ ?>
                <div class="">
                    <div class="col-10">
                        <h3 class="border-bottom border-secondary pb-3">Dépôts</h3>
                    </div>
                </div>
                <div class="row pb-5 scrollable-section">
                    <?php $this->afficherSection($depots, "icons/Depot.png", "lienDepot", "nomRendu", true);?>
                </div>
            <?php } ?>
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
                $link = $isDepot ? "index.php?module=Depot&idProjet=".$_GET['idProjet']."&idDepot=".$element["idRendu"] : (isset($element[$linkKey]) ? htmlspecialchars($element[$linkKey]) : '#');
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
            if($isDepot) echo $element["date_limite"];
            echo '</div>';
        }
    }
}
?>
