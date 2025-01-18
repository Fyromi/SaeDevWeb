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
           
            $image = $pPictur['profilpicture'];
        }
        if ($_GET['module'] == 'CONNEXION')
            if(isset($_GET['action']) && ($_GET['action'] == 'form_inscription' || $_GET['action'] == 'inscription'))
                $titre = 'Inscription';
            else
                $titre = 'Connexion';
        else
            $titre = htmlspecialchars($_GET['module']);
        $this->affichage = '
        <!-- En-tête fixe contenant tous les éléments -->
        <div class="row pb-3">
            <!-- Bouton menu à gauche -->
            <div class="col-4" >
                <nav class="navbar navbar-expand-lg">
                    <div class="container-fluid">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">';
                if (isset($_SESSION['login'])) {
                    $this->affichage .= '<li><a class="btn btn-dark" href="index.php?module=CONNEXION&action=deconnexion">Déconnexion</a></li>';
                } else if (isset($_GET['action']) && ($_GET['action'] == 'form_inscription' || $_GET['action'] == 'inscription')) {
                    $this->affichage .= '<li><a class="btn btn-dark" href="index.php?module=CONNEXION&action=form_connexion">Connexion</a></li>';
                } else {
                    $this->affichage .= '<li><a class="btn btn-dark" href="index.php?module=CONNEXION&action=form_inscription">Inscription</a></li>';
                }
                $this->affichage .='
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
            <!-- Titre centré -->
            <div class="col-4 text-center">
                <h1>
                    ' . $titre . '
                </h1>
            </div>';
        if(isset($image) && !empty($image)) {
            $this->affichage .= '
            <!-- Image de profil à droite -->
            <div class="col-4 text-end" >
                <a href="index.php?module=Profile&id=' . htmlspecialchars($_SESSION['login'] ?? '') . '">
                    <img src="' . $image . '" alt="Profile" style="width: 70px; height: 70px; border-radius: 50%;">
                </a>
            </div>';
        }
       
        $this->affichage .= '
        </div>
        <!-- Barre noire horizontale positionnée en bas du header -->
        <div style="height: 1px; background-color: black; width: 100%;"></div>
        ';
    }
}
?>