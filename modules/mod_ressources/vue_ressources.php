<?php
class VueRESSOURCES {
    public function __construct() {}
   
    public function afficherProjet($documents, $consignes, $depots) {
        echo '<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">';
        echo '<div class="container px-8" style="max-width: 800px; margin: auto; font-family: \'Inter\', sans-serif;">';
        $this->afficherSection("Documents", $documents, "icons/Document.png", "lienRessource", "nomRessource");
        $this->afficherSection("Consignes", $consignes, "icons/Consigne.png", "lienRessource", "nomRessource");
        $this->afficherSection("Dépôts", $depots, "icons/Depot.png", "lienDepot", "nomRendu", true);
        echo '</div>';
    }

    private function afficherSection($titre, $elements, $iconPath, $linkKey, $nameKey, $isDepot = false) {
        echo '<div class="row justify-content-center">';
        // Titre aligné avec la colonne
        echo '<div class="col-md-10">';
        echo '<div class="mb-4 mt-5 text-start">';
        echo '<small style="font-weight: 500; font-family: \'Inter\', sans-serif; font-size: 1.1rem;">' . ucfirst($titre) . '</small>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        
        echo '<div class="row justify-content-center">';
        // Colonne gauche avec padding droit ajouté
        echo '<div class="col-md-5 border-end border-dark" style="padding-right: 40px;">';
        $firstHalf = array_slice($elements, 0, ceil(count($elements) / 2));
        foreach ($firstHalf as $element) {
            $this->afficherElement($element, $iconPath, $linkKey, $nameKey, $isDepot);
        }
        echo '</div>';
        // Colonne droite avec padding gauche ajouté
        echo '<div class="col-md-5" style="padding-left: 40px;">';
        $secondHalf = array_slice($elements, ceil(count($elements) / 2));
        foreach ($secondHalf as $element) {
            $this->afficherElement($element, $iconPath, $linkKey, $nameKey, $isDepot);
        }
        echo '</div>';
        echo '</div>';
    }

    private function afficherElement($element, $iconPath, $linkKey, $nameKey, $isDepot) {
        // Vérification spécifique pour les consignes
        if ($nameKey == 'nomRessource' && $iconPath == 'icons/Consigne.png') {
            // Lien pour les consignes
            $link = 'index.php?module=Ressources&action=consignes&id='.$element['idRessource'];
        } else {
            // Pour les autres ressources
            $link = $isDepot ? 'index.php?module=DepotEtudiant' : ($element[$linkKey] ?? '#');
        }
    
        // Affichage du lien avec les éléments
        echo '<a href="' . $link . '" class="btn btn-light border mb-3 d-flex align-items-center p-3" style="font-family: \'Inter\', sans-serif;">';
        echo '<img src="' . $iconPath . '" style="width: 24px;" class="me-3">';
        echo '<strong style="font-size: 1.05rem;">' . $element[$nameKey] . '</strong>';
        echo '</a>';
    }
    
}
?>