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
        $isValid = true;
        $msgError = " ";

        if (isset ($_POST['titre']) && !empty($_POST['titre']))
            $titre = $_POST['titre'];
        else
            $isValid = false;
            $msgError = $msgError."Titre manquant, ";
            
        if (isset ($_POST['desc']) && !empty($_POST['titre']))
            $desc = $_POST['desc'];
        else
            $isValid = false;
            $msgError = $msgError."Description manquante, ";

        if (($_POST['annee'] >= 2000) && ($_POST['annee'] <= 3000))
            $annee = $_POST['annee'];
        else
            $isValid = false;
            $msgError = $msgError."L'année devrait etre comprise entre 2000 et 3000, ";

        if (($_POST['sem'] >= 1) && ($_POST['sem'] <= 6))
            $sem = $_POST['sem'];
        else
            $isValid = false;
            $msgError = $msgError."Le semestre devrait etre comprise entre 1 et 6 ";

        if($isValid)
            if($this->modele->ajout_ajoutsae($titre, $desc,$annee,$sem))
                $this->vue->confirm_ajout();
            else
                $this->vue->erreur_ajout($msgError);
        else
            $this->vue->erreur_ajout($msgError);

        
    }
}
