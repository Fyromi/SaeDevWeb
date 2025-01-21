<?php
class ModeleCONNEXION extends Connexion {

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

	private function setRoleSession($login) {
		$req = self::$bdd->prepare("SELECT role FROM utilisateur WHERE idUtilisateur=?");
		$req->bindParam(1, $this->get_utilisateur($login)['idUtilisateur']);
		$req->execute();
		$_SESSION['role'] = $req->fetchColumn(); 
	}

	public function connecte($login){
		
		$this->setRoleSession($login);

		if($_SESSION['role'] === 'etudiant') {
			header("location: index.php?module=Projets&action=menu");
		}
		else if($_SESSION['role'] == 'responsable' || $_SESSION['role'] == 'intervenant'){
			header("location: index.php?module=Enseignants&action=menu");
		}
	}
}
