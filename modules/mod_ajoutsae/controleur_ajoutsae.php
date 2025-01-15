<?php
require_once "modules/mod_ajoutsae/vue_ajoutsae.php";
require_once "modules/mod_ajoutsae/modele_ajout.php";


Class ControleurAjoutSae {

    private $modele;
	private $vue;
	private $action;

    public function __construct() {
		$this->modele = new ModeleAjoutSae();
		$this->vue = new VueAjoutSae();
	}

	public function exec() {
		$this->action = isset($_GET["action"]) ? $_GET["action"] : "Accueil";

		switch ($this->action) {
			case "accueil" :
				$this->accueil();
				break;
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

    public function accueil(){
        $this->vue->accueil();
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
