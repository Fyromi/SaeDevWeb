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
            case "form_ajoutnoteGrp":
                $this->form_ajoutnoteGrp();
                break;    
            case "verif_ajout":
                $this->verif_ajout();
                break;
                case "verif_ajoutGrp":
                    $this->verif_ajoutGrp();
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
        $projets = $this->modele->get_projets();
    
    
        $this->vue->form_ajoutnote($evaluations, $etudiants, $projets);
    }
    public function form_ajoutnoteGrp() {
        $evaluations = $this->modele->get_evaluations();
        $groupe = $this->modele->get_groupes();
        $projets = $this->modele->get_projets();
    
    
        $this->vue->form_ajoutnoteGrp($evaluations, $groupe, $projets);
    }

    public function verif_ajout() {
        $evaluation_id = isset($_POST['evaluation_id']) ? $_POST['evaluation_id'] : die("Evaluation manquante");
        $etudiant_id = isset($_POST['etudiant_id']) ? $_POST['etudiant_id'] : die("Etudiant manquant");
        $projet_id =isset($_POST['projet_id']) ? $_POST['projet_id'] : die("Projet manquant");
        $note = isset($_POST['note']) ? $_POST['note'] : die("Note manquante");

        if ($this->modele->ajout_note($evaluation_id, $etudiant_id,$projet_id, $note)) {
            $this->vue->confirm_ajout();
        } else {
            $this->vue->erreur_ajout();
        }
    }
    public function verif_ajoutGrp() {
        $evaluation_id = isset($_POST['evaluation_id']) ? $_POST['evaluation_id'] : die("Evaluation manquante");
        $groupe_id = isset($_POST['groupe_id']) ? $_POST['groupe_id'] : die("Groupe manquant");
        $projet_id =isset($_POST['projet_id']) ? $_POST['projet_id'] : die("Projet manquant");
        $note = isset($_POST['note']) ? $_POST['note'] : die("Note manquante");

        if ($this->modele->ajout_noteGrp($evaluation_id, $groupe_id,$projet_id, $note)) {
            $this->vue->confirm_ajout();
        } else {
            $this->vue->erreur_ajout();
        }
    }
}
?>
