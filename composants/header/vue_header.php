<?php
class VueCompHeader extends VueCompGenerique {
    public function __construct() {
        $this->setHeader();
    }

    private function setHeader() {
        if(isset($_SESSION['login'])){
            $req = self::$bdd->prepare("SELECT profilpicture FROM utilisateur WHERE login=?");
            $req->bindParam(1, $_SESSION['login']);
            $req->execute();
            $pPictur = $req->fetch();
           
            $image = base64_encode($pPictur['profilpicture']);
        }
        if($_GET['module'] == 'CONNEXION') 
            $titre ='CONNEXION/INSCRIPTION';
        else $titre = htmlspecialchars($_GET['module'] ?? 'CONNEXION/INSCRIPTION');
       
        $this->affichage = '
        <!-- En-tête fixe contenant tous les éléments -->
        <header style="position: fixed; top: 0; left: 0; right: 0; height: 141px; background-color: #DDD1BC; z-index: 1000; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);">
            <!-- Bouton menu à gauche -->
            <div style="position: absolute; top: 30px; left: 20px;">
                <button class="btn btn-black" type="button" id="menuDropdown" data-bs-toggle="dropdown" aria-expanded="false" style="background-color: black; border: none; padding: 10px;">
                    <div style="width: 40px; height: 4px; background-color: white; margin: 8px 0;"></div>
                    <div style="width: 40px; height: 4px; background-color: white; margin: 8px 0;"></div>
                    <div style="width: 40px; height: 4px; background-color: white; margin: 8px 0;"></div>
                </button>
                <ul class="dropdown-menu" aria-labelledby="menuDropdown" style="font-size: 18px; min-width: 200px;">
        ';
        if (isset($_SESSION['login'])) {
            $this->affichage .= '<li><a class="dropdown-item" href="index.php?module=CONNEXION&action=deconnexion" style="padding: 12px 20px;">Déconnexion</a></li>';
        } else if (isset($_GET['action']) && ($_GET['action'] == 'form_inscription' || $_GET['action'] == 'inscription')) {
            $this->affichage .= '<li><a class="dropdown-item" href="index.php?module=CONNEXION&action=form_connexion" style="padding: 12px 20px;">Connexion</a></li>';
        } else {
            $this->affichage .= '<li><a class="dropdown-item" href="index.php?module=CONNEXION&action=form_inscription" style="padding: 12px 20px;">Inscription</a></li>';
        }
        $this->affichage .= '
                </ul>
            </div>
        
            <!-- Titre centré -->
            <h1 class="text-center" style="margin: 0; padding-top: 50px; font-size: 24px; font-weight: bold; color: black;">
                ' . $titre . '
            </h1>';
       
        if(isset($image) && !empty($image)) {
            $this->affichage .= '
            <!-- Image de profil à droite -->
            <div style="position: absolute; top:30px; right: 20px;">
                <a href="index.php?module=Profile&id=' . htmlspecialchars($_SESSION['login'] ?? '') . '">
                    <img src="data:image/png;base64,' . $image . '" alt="Profile" style="width: 70px; height: 70px; border-radius: 50%;">
                </a>
            </div>';
        }
       
        $this->affichage .= '
            <!-- Barre noire horizontale positionnée en bas du header -->
            <div style="height: 1px; background-color: black; width: 100%; position: absolute; bottom: 0;"></div>
        </header>
        
        <!-- Espace pour le contenu sous le header -->
        <div style="height: 141px;"></div>
        ';
    }
}
?>