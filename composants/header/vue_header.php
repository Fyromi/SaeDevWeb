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
        if ($_GET['module'] == 'Connexion')
            if(isset($_GET['action']) && ($_GET['action'] == 'form_inscription' || $_GET['action'] == 'inscription' || $_GET['action'] == 'form_inscriptionAdmin'))
                $titre = 'Inscription';
            else
                $titre = 'Connexion';
        else
            $titre = htmlspecialchars($_GET['module']);
        $this->affichage = '
        <!-- En-tête fixe contenant tous les éléments -->
        <div class="row pb-3">
            <!-- Bouton menu à gauche -->
            <div class="col-3" >
                <nav class="navbar navbar-expand-sm">
                    <div class="container-fluid">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">';
                if (isset($_SESSION['login'])) {
                    $this->affichage .= '<li><a class="btn btn-dark" href="index.php?module=Connexion&action=deconnexion">Déconnexion</a></li>';
                } else if (isset($_GET['action']) && ($_GET['action'] == 'form_inscription' || $_GET['action'] == 'inscription')) {
                    $this->affichage .= '<li><a class="btn btn-dark" href="index.php?module=Connexion&action=form_connexion">Connexion</a></li>';
                } else {
                    $this->affichage .= '<li><a class="btn btn-dark" href="index.php?module=Connexion&action=form_inscription">Inscription</a></li>';
                }
                $this->affichage .='
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
            <!-- Titre centré -->
            <div class="col-6 text-center">
                <h1>
                    ' . $titre . '
                </h1>
            </div>';
        if(isset($image) && !empty($image)) {
            if(htmlspecialchars($_SESSION['login'] ?? '') =='tux') $login = 'Administrateur';
            else $login = htmlspecialchars($_SESSION['login'] ?? '');
            $this->affichage .= '
            <!-- Image de profil à droite -->
            <div class="col-3 text-end p-0">
                <a class="btn p-0" style="pointer-events: none;">
                    <img class="card-img m-0" src="' . $image . '" alt="Profile" style="width: 50px">
                    <p class="card-title h7">' . $login . '</p>
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