<?php
require_once "modules/mod_CONNEXION/vue_CONNEXION.php";
require_once "modules/mod_CONNEXION/modele_CONNEXION.php";
require_once "TokenManager.php"; 

class ControleurCONNEXION {

    private $modele;
    private $vue;
    private $action;
    private $tokenManager;

    public function __construct() {
        $this->modele = new ModeleCONNEXION();
        $this->vue = new VueCONNEXION();
        $this->tokenManager = new TokenManager();
    }

    public function exec() {
        $this->action = isset($_GET["action"]) ? $_GET["action"] : "form_connexion";
        switch ($this->action) {
            case "verif_connexion":
                $this->verif_connexion();
                break;

            case "form_connexion":
                if (!isset($_SESSION['login'])) {
                    $this->form_connexion();
                } else {
                    $this->modele->connecte($_SESSION['login']);
                }
                break;
            
            case "inscription":
                $this->inscription(false);
                break;

            case "inscriptionAdmin":
                $this->inscription(true);
                break;
            
            case "form_inscription":
                $this->form_inscription(false);
                break;

            case "deconnexion":
                $this->deconnexion();
                break;
            case "form_inscriptionAdmin":
                $this->form_inscription(true);
                break;
            default:
                die("Action inexistante");
        }
    }

    private function form_connexion() {
        $this->vue->form_connexion();
    }

    private function form_inscription($isAdmin) {
        $this->vue->form_inscription($isAdmin);
    }

    private function verif_connexion () {
        $login = isset ($_POST['login']) ? $_POST['login'] : die ("paramètre manquant");
        $mdp = isset ($_POST['mdp']) ? $_POST['mdp'] : die ("paramètre manquant");
    
        $util = $this->modele->get_utilisateur($login);
    
        if ($util === false) {
            $this->vue->utilisateur_inconnu($login);
        } else {
            if (password_verify($mdp, $util["mdp"])) {
                $_SESSION['login'] = $login;
    
                $tokenManager = new TokenManager();
                $token = $tokenManager->genererToken($login);  
    
                if ($tokenManager::validerToken($token)) {
                    $tokenManager::supprimerToken($token);  
                    $this->modele->connecte($login);
                } else {
                    // Si le token n'est pas valide
                    $this->vue->echec_connexion($login);
                }
            } else {
                // Si le mot de passe est incorrect
                $this->vue->echec_connexion($login);
            }
        }
    }

    private function inscription($isAdmin) {
        $isValid = true;

        if (isset($_POST['login']) && !empty($_POST['login'])) {
            $login = $_POST['login'];
        } else {
            $isValid = false;
            $login = "";
        }

        if (isset($_POST['mdp']) && !empty($_POST['mdp'])) {
            $mdp = $_POST['mdp'];
        } else {
            $isValid = false;
        }

        if($isAdmin){
            if (isset($_POST['role']) && !empty($_POST['role']) && ($_POST['role'] == 'etudiant' || $_POST['role'] == 'intervenant' || $_POST['role'] == 'responsable')) {
                $role = $_POST['role'];
            } else {
                $isValid = false;
            }
        } else $role = 'etudiant';
        
        if ($isValid) {
            $mdp_hash = password_hash($mdp, PASSWORD_BCRYPT);
            if ($this->modele->verifLogin($login) == false && $this->modele->ajout_utilisateur($login, $mdp_hash, $role)) {
                $this->vue->confirm_inscription($login);
            } else {
                $this->vue->erreur_inscription($login);
            }
        } else {
            $this->vue->erreur_inscription($login);
        }
    }

    public function deconnexion() {
        unset($_SESSION['login']);
        unset($_SESSION['token']); 
        $this->vue->form_connexion();
    }
}
?>
