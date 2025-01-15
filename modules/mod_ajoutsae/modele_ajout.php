<?php
Class ModeleAjoutSae extends Connexion{


    public function ajout_ajoutsae ($titre, $desc,$annee,$sem) {
		$req = self::$bdd->prepare("INSERT INTO projets (titre,description,anneeUniversitaire,semestre) VALUES(:titre,:description,:anneeUniversitaire,:semestre)");
		return $req->execute(["titre"=>$titre, "description"=>$desc,"anneeUniversitaire"=>$annee,"semestre"=>$sem]);
	}


}