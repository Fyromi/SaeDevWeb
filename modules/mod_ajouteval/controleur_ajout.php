<?php
require_once "modules/mod_ajouteval/vue_ajout.php";
require_once "modules/mod_ajouteval/modele_ajout.php";

Class ControleurAjoutEvaluation {

    private $modele;
    private $vue;
    private $action;

    public function __construct() {
        $this->modele = new ModeleAjoutEvaluation();
        $this->vue = new VueAjoutEvaluation();
    }

    public function exec() {
        $this->action = isset($_GET["action"]) ? $_GET["action"] : "Accueil";

        switch ($this->action) {
            case "Accueil" :
                $this->accueil();
                break;
            case "form_ajoutevaluation" :
                $this->form_ajoutevaluation();
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

    public function form_ajoutevaluation(){
        $projets = $this->modele->get_projets();

        $this->vue->form_ajoutevaluation($projets);
    }

    public function verif_ajout(){
        $nom = isset($_POST['nom']) ? $_POST['nom'] : die("Nom manquant");
        $projet = isset($_POST['projet']) ? $_POST['projet'] : die("projet manquant");
        $date = isset($_POST['date']) ? $_POST['date'] : die("Date manquante");
        $coeff = isset($_POST['coeff']) ? $_POST['coeff'] : die("Coefficient manquant");

        if($this->modele->ajout_evaluation($nom,$projet, $date, $coeff))
            $this->vue->confirm_ajout();
        else
            $this->vue->erreur_ajout();
    }
}

