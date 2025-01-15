<?php
class VueConnexion extends VueGenerique{
	public function __construct () {
		parent::__construct();
	}

	public function form_connexion() {
		?>
		<div class="connexion d-flex flex-column justify-content-center position-fixed" style="top: 30%; left: 30%;">
			<h1 class="text-center mb-4">Connexion</h1>
			<form id="field_login" class="d-flex flex-column" action="index.php?module=connexion&action=verif_connexion" method="POST">
				<label for="text_login" class="form-label">Login :</label>
				<input id="text_login" type="text" name="login" class="form-control mb-3" style="width: 600px; height: 50px; background: #FFFFFF; border: 1px solid #D9D9D9; border-radius: 20px; outline: transparent;">
				
				<label for="text_mdp" class="form-label">Mot de passe :</label>
				<input id="text_mdp" type="password" name="mdp" class="form-control mb-3" style="width: 600px; height: 50px; background: #FFFFFF; border: 1px solid #D9D9D9; border-radius: 20px; outline: transparent;">
				
				<input id="bouton_co" type="submit" value="Se connecter" class="btn btn-dark align-self-end mt-3" style="width: 220px; height: 70px; border-radius: 20px;">
			</form>
		</div>
		<?php
		}
		

		public function form_inscription() {
			?>
			<div class="connexion d-flex flex-column justify-content-center position-fixed" style="top: 30%; left: 30%;">
				<h1 class="text-center mb-4">Inscription</h1>
				<form action="index.php?module=connexion&action=inscription" method="POST" class="d-flex flex-column" style="height: 50%;">
					<label for="login" class="form-label">Login :</label>
					<input id="login" type="text" name="login" class="form-control mb-3" 
						   style="width: 600px; height: 50px; background: #FFFFFF; border: 1px solid #D9D9D9; border-radius: 20px; outline: transparent;">
			
					<label for="mdp" class="form-label">Mot de passe :</label>
					<input id="mdp" type="password" name="mdp" class="form-control mb-3" 
						   style="width: 600px; height: 50px; background: #FFFFFF; border: 1px solid #D9D9D9; border-radius: 20px; outline: transparent;">
			
					<label for="choix" class="form-label">Choisissez votre rôle :</label>
					<select id="choix" name="role" class="form-select mb-3" 
							style="width: 600px; height: 50px; border: 1px solid #D9D9D9; border-radius: 20px;">
						<option value="etudiant">Étudiant</option>
						<option value="intervenant">Intervenant</option>
						<option value="responsable">Responsable</option>
					</select>
			
					<input type="submit" value="S'inscrire" class="btn btn-dark align-self-end" 
						   style="width: 220px; height: 70px; border-radius: 20px; margin-top: 20px;">
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

}
