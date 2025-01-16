<?php
require_once "modules/mod_CREATION/vue_CREATION.php";
require_once "modules/mod_CREATION/modele_CREATION.php";


Class ControleurCREATION {

    private $modele;
	private $vue;
	private $action;

    public function __construct() {
		$this->modele = new ModeleCREATION();
		$this->vue = new VueCREATION();
	}

	public function exec() {
		$this->action = isset($_GET["action"]) ? $_GET["action"] : "form_ajoutsae";

		switch ($this->action) {
		
			case "form_ajoutsae" :
				$this->form_ajoutsae();
				break;
            case "verif_ajout" :
                    $this->verif_ajout();
                    break;
			default :
				die ("Action inexistante");
		}
	}

    public function form_ajoutsae(){
        $this->vue->form_ajoutsae();
    }
    public function verif_ajout(){
		$titre = isset ($_POST['titre']) ? $_POST['titre'] : die("titre manquant");
		$desc = isset ($_POST['desc']) ? $_POST['desc'] : die("desc manquant"); 
		$annee = isset ($_POST['annee']) ? $_POST['annee'] : die("annee manquant");
		$sem = isset ($_POST['sem']) ? $_POST['sem'] : die("sem manquant");


		if($this->modele->ajout_ajoutsae($titre, $desc,$annee,$sem))
			$this->vue->confirm_ajout();
		else
			$this->vue->erreur_ajout();

        
    }
}
