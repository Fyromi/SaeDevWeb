<?php
class VueCONNEXION extends VueGenerique{
    public function __construct () {
        parent::__construct();
    }

    public function form_connexion() {
        ?>
        <form id="field_login"action="index.php?module=CONNEXION&action=verif_connexion" method="POST">
            <div class="input-group mb-3">
                <span class="input-group-text">Indentifiant</span>
                <input id="text_login" type="text" name="login" class="form-control" placeholder="Indentifiant">
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text">Mot de passe</span>
                <input id="text_mdp" type="password" name="mdp" class="form-control" placeholder="Mot de passe">
            </div>
            <button type="submit" class="btn btn-dark" id="bouton_co">Se connecter</button>
        </form>
        <?php
        }
        
        public function form_inscription() {
            ?>
            <form action="index.php?module=CONNEXION&action=inscription" method="POST">
                <div class="input-group mb-3">
                    <span class="input-group-text">Indentifiant</span>
                    <input id="login" type="text" name="login" class="form-control" placeholder="Indentifiant">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text">Mot de passe</span>
                    <input id="mdp" type="password" name="mdp" class="form-control" placeholder="Mot de passe">
                </div>
                <div class="input-group mb-3">
                    <select id="choix" name="role" class="form-select">
                        <option selected>Choisissez votre rôle</option>
                        <option value="etudiant">Étudiant</option>
                        <option value="intervenant">Intervenant</option>
                        <option value="responsable">Responsable</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-dark" id="bouton_co">S'inscrire</button>
            </form>
            <?php
            }

    public function confirm_inscription($login) {
?>
<div class="alert alert-success d-flex align-items-center" role="alert">
    <div>
        Inscription de: <b><?=$login?> réussie !</b>
    </div>
</div>
<?php
    }
    public function erreur_inscription($login) {
?>
<div class="alert alert-danger d-flex align-items-center" role="alert">
    <div>
        Echec de l'inscription de: <b><?=$login?></b>
    </div>
</div>
<?php
    }

    public function confirm_connexion ($login) {
?>
    <div class="alert alert-success d-flex align-items-center" role="alert">
        <div>
            Connexion en tant que: <b><?=$login?> réussie !</b>
        </div>
    </div>
<?php
    }

    public function echec_connexion ($login) {
?>
    <div class="alert alert-danger d-flex align-items-center" role="alert">
        <div>
            Echec de la connexion en tant que : <b><?=$login?></b>
        </div>
    </div>
<?php
    }

    public function utilisateur_inconnu ($login) {
?>
<div class="alert alert-danger d-flex align-items-center" role="alert">
    <div>
        Utilisateur: <b><?=$login?> inconnu</b>
    </div>
</div>
<?php
    }

}
