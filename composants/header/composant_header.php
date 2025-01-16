<?php
require_once "composants/header/controleur_header.php";

class ComposantHeader extends ComposantGenerique {
	public function __construct () {
		parent::__construct();
		$this->controleur = new ControleurCompHeader();
	}


}
