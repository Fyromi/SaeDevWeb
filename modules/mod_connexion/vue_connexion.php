<?php
class VueCONNEXION extends VueGenerique {
    public function __construct () {
        parent::__construct();
    }

    public function form_connexion() {
        ?>
        <form id="field_login" action="index.php?module=Connexion&action=verif_connexion" method="POST">
            <div class="input-group mb-3">
                <span class="input-group-text col-5 col-sm-3 col-lg-2">Indentifiant</span>
                <input id="text_login" type="text" name="login" class="form-control" placeholder="Indentifiant" required>
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text col-5 col-sm-3 col-lg-2">Mot de passe</span>
                <input id="text_mdp" type="password" name="mdp" class="form-control" placeholder="Mot de passe" required>
            </div>
            <button type="submit" class="btn btn-dark" id="bouton_co">Se connecter</button>
        </form>
        <?php
    }
        
    public function form_inscription($isAdmin) {
        if($isAdmin){
            $action = 'inscriptionAdmin';
        } else $action = 'inscription';
        
        $messageBouton = "S'inscrire";

        ?>
        <form action="index.php?module=Connexion&action=<?=$action?>" method="POST">
            <div class="input-group mb-3">
                <span class="input-group-text col-5 col-sm-3 col-lg-2">Indentifiant</span>
                <input id="login" type="text" name="login" class="form-control" placeholder="Indentifiant" required>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text col-5 col-sm-3 col-lg-2">Mot de passe</span>
                <input id="mdp" type="password" name="mdp" class="form-control" placeholder="Mot de passe" required>
            </div>
            <?php if ($isAdmin) {
                $messageBouton = "L'inscrire";?>
                <div class="input-group mb-3">
                <select id="choix" name="role" class="form-select">
                    <option selected>Choisissez le rôle à attribuer a l'utilisateur</option>
                    <option value="etudiant">Étudiant</option>
                    <option value="intervenant">Intervenant</option>
                    <option value="responsable">Responsable</option>
                </select>
            </div>
            <?php
            }?>
            
            <button type="submit" class="btn btn-dark" id="bouton_co"><?=$messageBouton?></button>
        </form>
        <?php
    }

    public function confirm_inscription($login) {
        $safeLogin = htmlspecialchars($login, ENT_QUOTES, 'UTF-8');
        ?>
        <div class="alert alert-success d-flex align-items-center" role="alert">
            <div>
                Inscription de : <b><?= $safeLogin ?> réussie !</b>
            </div>
        </div>
        <?php
    }

    public function erreur_inscription($login) {
        $safeLogin = htmlspecialchars($login, ENT_QUOTES, 'UTF-8');
        ?>
        <div class="alert alert-danger d-flex align-items-center" role="alert">
            <div>
                Echec de l'inscription de : <b><?= $safeLogin ?></b>
            </div>
        </div>
        <?php
    }

    public function echec_connexion($login) {
        $safeLogin = htmlspecialchars($login, ENT_QUOTES, 'UTF-8');
        ?>
        <div class="alert alert-danger d-flex align-items-center" role="alert">
            <div>
                Echec de la connexion en tant que : <b><?= $safeLogin ?></b>
            </div>
        </div>
        <?php
    }

    public function utilisateur_inconnu($login) {
        $safeLogin = htmlspecialchars($login, ENT_QUOTES, 'UTF-8');
        ?>
        <div class="alert alert-danger d-flex align-items-center" role="alert">
            <div>
                Utilisateur: <b><?= $safeLogin ?> inconnu</b>
            </div>
        </div>
        <?php
    }
}
