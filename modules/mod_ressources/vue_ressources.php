<?php
class VueRessources {
    public function __construct() {}

    function afficherProjet($documents, $consignes){

       $this->afficherDocuments($documents);
       $this->afficherConsignes($consignes);
    }

    private function afficherDocuments($documents) {
        foreach ($documents as $chemin) {
            echo "<a href ='".$chemin['lienRessource']."'>"."Docu : ".$chemin['nomRessource']."</a></br>";  
        }
    }
    private function afficherConsignes($consignes) {
        foreach ($consignes as $chemin) {
            echo "<a href ='".$chemin['lienRessource']."'>"."Consiggnes : ".$chemin['nomRessource']."</a></br>";  
        }
    }

}
?>
