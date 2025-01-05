<?php

require_once "composants/footer/vue_footer.php";


class ControleurCompFooter {

	public function __construct() {
		$this->vue = new VueCompFooter();
	}


	public function exec () {
		$this->vue->vue_footer();
	}


}
