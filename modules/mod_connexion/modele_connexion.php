<?php
class ModeleConnexion extends Connexion {

	public function get_utilisateur($login) {
		$req = self::$bdd->prepare("SELECT * from utilisateur WHERE login=?");
		$req->bindParam(1,$login);
		$req->execute();
		return $req->fetch();
	}

	public function ajout_utilisateur ($login, $mdp_hash, $role) {
		$req = self::$bdd->prepare("INSERT INTO utilisateur (login,mdp, role) VALUES(:login, :mdp, :role)");
		return $req->execute(["login" => $login, "mdp"=> $mdp_hash, "role"=>$role]);
	}	

	public function verifLogin($login){
		$req = self::$bdd->prepare("SELECT login from utilisateur WHERE login=?");
		$req->execute([$login]);
		return $req->fetch();
	}
}
