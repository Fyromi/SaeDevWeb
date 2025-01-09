<?php
class VueConnexion extends VueGenerique{
	public function __construct () {
		parent::__construct();

	}

	public function form_connexion() {

?>		<div class="connexion">
        <h1>Connexion</h1>
		<form id="field_login" action="index.php?module=connexion&action=verif_connexion" method="POST">
			   login :	
            <br>
            <input id="text_login" type="text" name="login"></input>
            <br>
			   mot de passe :
            <br>
            <input id="text_login" type="password" name="mdp"></input>
            <br>
			<input id="bouton_co" type="submit"/>
		</form>
        </div>
<?php

	}

	public function form_inscription() {
?>      <div class="connexion">
		<h1>Inscription</h1>
		<form action="index.php?module=connexion&action=inscription" method="POST">
			login : <input type="text" name="login"></input>
			mot de passe : <input type="password" name="mdp"></input>
			<label for="choix">Choisissez votre rôle :</label>

            <select id="choix" name="role">
                <option value="etudiant">Etudiant</option>
                <option value="intervenant">Intervenant</option>
				<option value="responsable">Responsable</option>

            </select><br><br>
			<input type="submit"/>
		</form>
        </div>
<?php

	}

	public function menu() {
		?><a href="index.php?module=connexion&action=form_connexion">Connexion</a>
		<a href="index.php?module=connexion&action=form_inscription">Inscription</a>
		<?php
	}

	public function confirm_inscription($login) {
?>
	Inscription de <?=$login?> réussie !
<?php
	}
	public function erreur_inscription($login) {
?>
	Echec de l'inscription de <?=$login?>
<?php
	}

	public function confirm_connexion ($login) {
?>
	Connexion en tant que <?=$login?> réussie !
<?php
	}

	public function echec_connexion ($login) {
?>
	Echec de la connexion en tant que <?=$login?>
<?php
	}

	public function utilisateur_inconnu ($login) {
?>
	Utilisateur <?=$login?> inconnu
<?php
	}

	public function confirm_deconnexion() {
		?>
		Vous êtes bien déconnecté(e)
		<?php
	}

	public function connecte(){
		header("location: http://localhost/SaeDevWeb/index.php?module=listeProjets&action=menu");
	}
}
