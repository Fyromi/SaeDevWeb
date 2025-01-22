<?php
Class ModeleAjoutEvaluation extends Connexion {

    public function ajout_evaluation($nom, $date, $coeff) {
        $req = self::$bdd->prepare("INSERT INTO evaluation (nomEval, date, coef) VALUES (:nom, :date, :coefficient)");
        return $req->execute(["nom" => $nom, "date" => $date, "coefficient" => $coeff]);
    }
}

