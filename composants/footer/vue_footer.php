<?php
class VueCompFooter extends VueCompGenerique {

	public function __construct() {
		$this->affichage .= '
    <footer class="text-center mt-4 py-2">
        <div>
            <p class="mb-0">© ' . date("Y") . ' Iut de Montreuil - Projet Développement WEB php</p>
            <small>Site réalisé dans un cadre pédagogique.</small>
        </div>
    </footer>';
	}
	

}
