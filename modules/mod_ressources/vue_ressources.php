<?php
class VueRessources {
    public function __construct() {}

    function afficherProjet($documents, $consignes, $depots){

       $this->afficherDocuments($documents);
       $this->afficherConsignes($consignes);
       $this->afficherDepot($depots);
    }

    private function afficherDocuments($documents) {
        foreach ($documents as $chemin) {
            echo "<a href ='".$chemin['lienRessource']."'>"."Docu : ".$chemin['nomRessource']."</a></br>";  
        }
    }
    private function afficherConsignes($consignes) {
        echo '</br>';
        foreach ($consignes as $chemin) {
            echo "<a href ='".$chemin['lienRessource']."'>"."Consiggnes : ".$chemin['nomRessource']."</a></br>";  
        }
    }

    private function afficherDepot($dépots){
        echo '</br>';
        foreach ($dépots as $dépot) {
            echo "<a href ='index.php?module=DepotEtudiant&action'>"."Dépot : ".$dépot['nomRendu']."</a></br>";  
        }
    }
}
?>
