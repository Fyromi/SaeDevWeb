<?php
require_once "modules/mod_CONNEXION/vue_CONNEXION.php";
require_once "modules/mod_CONNEXION/modele_CONNEXION.php";

class ControleurCONNEXION {

    private $modele;
    private $vue;
    private $action;

    public function __construct() {
        $this->modele = new ModeleCONNEXION();
        $this->vue = new VueCONNEXION();
    }

    public function exec() {
        $this->action = isset($_GET["action"]) ? $_GET["action"] : "form_connexion";

        switch ($this->action) {

            case "verif_connexion" :
                $this->verif_connexion();

            case "form_connexion" :

                if(!isset($_SESSION['login']))
                    $this->form_connexion();
                else $this->modele->connecte($_SESSION['login']);
                 
                break;
            
            case "inscription" :
                $this->inscription();
            
            case "form_inscription" :
                $this->form_inscription();
                break;
            
            case "deconnexion" :
                $this->deconnexion();
                break;
            default :
                die ("Action inexistante");
        }
    }

    private function form_connexion () {
        $this->vue->form_connexion();
    }

    private function form_inscription () {
        $this->vue->form_inscription();
    }

    private function verif_connexion () {
        $login = isset ($_POST['login']) ? $_POST['login'] : die ("paramètre manquant");
        $mdp = isset ($_POST['mdp']) ? $_POST['mdp'] : die ("paramètre manquant");
        $util = $this->modele->get_utilisateur($login);
        if ($util === false) {
            $this->vue->utilisateur_inconnu($login);
        }
            
        if (password_verify($mdp, $util["mdp"])){
            $_SESSION['login'] = $login;
            $this->modele->connecte($login);
        }
        else {
            $this->vue->echec_connexion($login);
            $_GET['action'] = 'form_connexion';

        }
    }

    private function inscription () {
        $isValid = true;
     

        if (isset ($_POST['login']) && !empty($_POST['login']))
            $login = $_POST['login'];
        else
            $isValid = false;
			$login = empty(" ");

        if (isset ($_POST['mdp']) && !empty($_POST['mdp']))
            $mdp = $_POST['mdp'];
        else
            $isValid = false;  

        if (isset ($_POST['role']) && !empty($_POST['role']) && ($_POST['role'] == 'etudiant' || $_POST['role'] == 'intervenant' || $_POST['role'] == 'responsable'))
            $role = $_POST['role'];
        else
        	$isValid = false;

        if($isValid) {
            $mdp_hash = password_hash($mdp, PASSWORD_BCRYPT);
            if ($this->modele->verifLogin($login)==false &&$this->modele->ajout_utilisateur($login, $mdp_hash, $role)) {
                $this->vue->confirm_inscription($login);
            }
            else {
                $this->vue->erreur_inscription($login);
            }
        } else {
            $this->vue->erreur_inscription($login);
        }
    }

        public function deconnexion () {
        unset($_SESSION['login']);
        $this->vue->form_connexion();
    }

}
