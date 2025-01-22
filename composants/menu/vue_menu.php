<?php
class VueCompMenu extends VueCompGenerique {

	public function __construct(){
		if (isset($_SESSION['login'])) {
			$this->affichage .= '<li><a href="index.php?module=connexion&action=deconnexion">Déconnexion</a></li>';
			$this->affichage .= '<li><a href="index.php?module=ajoutsae&action=accueil">Ajoutsae</a></li>';
			$this->affichage .= '<li><a href="index.php?module=depotdevoirs&action=form_depot">AjoutDepot</a></li>';
		}
		else {
			$this->affichage .= '<li><a href="index.php?module=connexion&action=form_connexion">Connexion</a></li>';
		}
		$this->affichage .= "</ul>";

	}


}
