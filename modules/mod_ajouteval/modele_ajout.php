<?php
Class ModeleAjoutEvaluation extends Connexion {

    public function ajout_evaluation($nom,$projet,$date, $coeff) {
        $req = self::$bdd->prepare("INSERT INTO evaluation (nomEval,idProjet, date, coef) VALUES (:nom,:projet,:date,:coefficient)");
        return $req->execute(["nom" => $nom,"projet" => $projet, "date" => $date, "coefficient" => $coeff]);
    }

    public function get_projets() {
        $req = self::$bdd->query("SELECT idProjet FROM Projet ");
        return $req->fetchAll();
    }
}

