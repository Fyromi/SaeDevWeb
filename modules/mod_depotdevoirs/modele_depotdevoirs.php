<?php
require_once 'connexion.php';  // Inclure la classe de connexion à la base de données

class ModeleDepotDevoirs extends Connexion {

    // Fonction pour enregistrer le devoir dans la base de données
    public function deposerDevoir($cours, $fichier) {
        // Insérer les informations du devoir dans la base de données
        $sql = "INSERT INTO devoirs (cours, fichier) VALUES (:cours, :fichier)";
        $stmt = self::$bdd->prepare($sql);
        $stmt->bindParam(':cours', $cours);
        $stmt->bindParam(':fichier', $fichier);
        return $stmt->execute();
    }
}
?>
