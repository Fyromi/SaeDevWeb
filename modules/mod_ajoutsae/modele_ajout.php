<?php
Class ModeleAjoutSae extends Connexion{


    public function ajout_ajoutsae($titre, $desc,$annee,$sem) {
		$req = self::$bdd->prepare("INSERT INTO projet (titre,description,anneeUniversitaire,semestre) VALUES(:titre,:description,:anneeUniversitaire,:semestre)");
		$sae = $req->execute(["titre"=>$titre, "description"=>$desc,"anneeUniversitaire"=>$annee,"semestre"=>$sem]);
		$idProjet = self::$bdd->lastInsertId();

		$req2 = self::$bdd->prepare("
            SELECT idUtilisateur
            FROM utilisateur
            WHERE utilisateur.login = ?
        ");
		$req2->bindParam(1, $_SESSION['login']);
		$req2->execute();
		$idUtilisateur = $req2->fetchColumn();

		$req3 = self::$bdd->prepare("
            INSERT INTO estresponsablede (idUtilisateur, idProjet) 
            VALUES (:idUtilisateur, :idProjet)
        ");
        $req3->execute([
            "idUtilisateur" => $idUtilisateur,
            "idProjet" => $idProjet
        ]);
        $this->creerRepo($idProjet);
		return $sae;
	}


    private function creerRepo($idProjet){
        $repertoire = "Projet/Projet".$idProjet;
        if (!file_exists($repertoire)) {
            mkdir($repertoire, 0777, true);
        }
        $repertoireRessource = "Projet/Projet".$idProjet."/ressource";
        if (!file_exists($repertoireRessource)) {
            mkdir($repertoireRessource, 0777, true);
        }
        $repertoireDepot = "Projet/Projet".$idProjet."/depot";
        if (!file_exists($repertoireDepot)) {
            mkdir($repertoireDepot, 0777, true);
        }

    }


}