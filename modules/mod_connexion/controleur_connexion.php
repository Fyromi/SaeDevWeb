<?php
require_once "modules/mod_connexion/vue_connexion.php";
require_once "modules/mod_connexion/modele_connexion.php";

class ControleurConnexion {

	private $modele;
	private $vue;
	private $action;

	public function __construct() {
		$this->modele = new ModeleConnexion();
		$this->vue = new VueConnexion();
	}

	public function exec() {
		$this->action = isset($_GET["action"]) ? $_GET["action"] : "form_connexion";

		switch ($this->action) {

			case "verif_connexion" :
				$this->verif_connexion();

			case "form_connexion" :

				if(!isset($_SESSION['login']))
					$this->form_connexion();
				else $this->modele->connecte($_SESSION['login']);
				 
				break;
			
			case "inscription" :
				$this->inscription();
			
			case "form_inscription" :
				$this->form_inscription();
				break;
			
			case "deconnexion" :
				$this->deconnexion();
				break;
			default :
				die ("Action inexistante");
		}
	}

	private function form_connexion () {
		$this->vue->form_connexion();
	}

	private function form_inscription () {
		$this->vue->form_inscription();
	}

	private function verif_connexion () {
		$login = isset ($_POST['login']) ? $_POST['login'] : die ("paramètre manquant");
		$mdp = isset ($_POST['mdp']) ? $_POST['mdp'] : die ("paramètre manquant");
		$util = $this->modele->get_utilisateur($login);
		if ($util === false) {
			$this->vue->utilisateur_inconnu($login);
		}
			
		if (password_verify($mdp, $util["mdp"])){
			$_SESSION['login'] = $login;
			$this->modele->connecte($login);
		}
		else {
			$this->vue->echec_connexion($login);
			$_GET['action'] = 'form_connexion';

		}
	}

	private function inscription () {
		$login = isset ($_POST['login']) ? $_POST['login'] : die("paramètre manquant");
		$mdp = isset ($_POST['mdp']) ? $_POST['mdp'] : die ("paramètre manquant");
		$role = isset ($_POST['role']) ? $_POST['role'] : die ("paramètre manquant");
		$mdp_hash = password_hash($mdp, PASSWORD_BCRYPT);
		if ($this->modele->verifLogin($login)==false &&$this->modele->ajout_utilisateur($login, $mdp_hash, $role)) {
			$this->vue->confirm_inscription($login);
		}
		else {
			$this->vue->erreur_inscription($login);
		}
	}

        public function deconnexion () {
		unset($_SESSION['login']);
		$this->vue->form_connexion();
	}

}
