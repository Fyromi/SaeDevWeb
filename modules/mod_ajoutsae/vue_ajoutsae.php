<?php
Class VueAjoutSae {

    public function accueil(){
        ?><div class="accueil_ajoutsae">
        <h1>Accueil Ajout Sae</h1>
        <a href="index.php?module=ajoutsae&action=form_ajoutsae"><img width="100px" src="images/ajout_croix.png"></a>
        </div>
        <?php
    }

    public function form_ajoutsae(){
        ?>		<div class="ajout_sae">
        <h1>Ajouter un Projets</h1>
		<form  action="index.php?module=ajoutsae&action=verif_ajout" method="POST">
             Titre de la SAE
            <input type="text" name="titre"></input>
            <br>
			Description
            <input type="text" name="desc"></input>
            <br>
            Année Universitaire
            <input type="number" name="annee"></input>
            <br>
            Semestre
            <input type="number" name="sem"></input>
            <br>
			<input  type="submit"/>
		</form>
        </div>
<?php
    }

    public function confirm_ajout() {
        ?>
            ajout réussie !
        <?php
            }
    public function erreur_ajout() {
        ?>
            Echec de l'ajout
        <?php
            }

    
}