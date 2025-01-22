<?php
require_once "modules/mod_ajoutnote/vue_ajoutnote.php";
require_once "modules/mod_ajoutnote/modele_ajout.php";

Class ControleurAjoutNote {

    private $modele;
    private $vue;
    private $action;

    public function __construct() {
        $this->modele = new ModeleAjoutNote();
        $this->vue = new VueAjoutNote();
    }

    public function exec() {
        $this->action = isset($_GET["action"]) ? $_GET["action"] : "Accueil";

        switch ($this->action) {
            case "Accueil":
                $this->accueil();
                break;
            case "form_ajoutnote":
                $this->form_ajoutnote();
                break;
            case "verif_ajout":
                $this->verif_ajout();
                break;
            default:
                die("Action inexistante");
        }
    }

    public function accueil() {
        $this->vue->accueil();
    }

    public function form_ajoutnote() {
        $evaluations = $this->modele->get_evaluations();
        $etudiants = $this->modele->get_etudiants();
        $this->vue->form_ajoutnote($evaluations, $etudiants);
    }

    public function verif_ajout() {
        $evaluation_id = isset($_POST['evaluation_id']) ? $_POST['evaluation_id'] : die("Evaluation manquante");
        $etudiant_id = isset($_POST['etudiant_id']) ? $_POST['etudiant_id'] : die("Etudiant manquant");
        $note = isset($_POST['note']) ? $_POST['note'] : die("Note manquante");

        if ($this->modele->ajout_note($evaluation_id, $etudiant_id, $note)) {
            $this->vue->confirm_ajout();
        } else {
            $this->vue->erreur_ajout();
        }
    }
}
?>
