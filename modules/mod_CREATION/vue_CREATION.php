<?php
Class VueCREATION {

    public function form_ajoutsae(){
        ?>
        <div class="row">
            <div class="ajout_sae col-lg-6 mb-9">
                <h3 class="border-bottom border-secondary pb-3 mb-5">Ajouter un Projets</h3>
                <form  action="index.php?module=CREATION&action=verif_ajout" method="POST">
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
            <div class="col-lg-6 mb-9">
                <a href='index.php?module=ENSEIGNANTS&action=menu' class='text-decoration-none'>
                    <div class="card shadow-sm text-center" style="width: 400px; height: 250px; border-radius: 15px; background-color: #f8f9fa;">
                        <div class="card-body d-flex flex-column justify-content-center align-items-center">
                            <img src="icons/retour.png" alt="Retour Projet" style="width: 100px; height: 100px;">
                            <h5 class="card-title mt-3 fs-4" style="color: #000;">Retour Projet</h5>
                        </div>
                    </div>
                </a>
            </div>
        </div>
<?php
    }

    public function confirm_ajout() {
        ?>
        <div class="row">
            <div class="col-lg-6 mb-9">
                <b>Ajout réussie !</b>
            </div>
            <div class="col-lg-6 mb-9">
                <a href='index.php?module=ENSEIGNANTS&action=menu' class='text-decoration-none'>
                    <div class="card shadow-sm text-center" style="width: 400px; height: 250px; border-radius: 15px; background-color: #f8f9fa;">
                        <div class="card-body d-flex flex-column justify-content-center align-items-center">
                            <img src="icons/retour.png" alt="Retour Projet" style="width: 100px; height: 100px;">
                            <h5 class="card-title mt-3 fs-4" style="color: #000;">Retour Projet</h5>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <?php
            }
    public function erreur_ajout($msgError) {
        ?>
        <div class="row">
            <div class="col-lg-6 mb-9">
                <b>Echec de l'ajout:</b>
        <?php
        echo $msgError;
        ?>
            </div>
            <div class="col-lg-6 mb-9">
                <a href='index.php?module=ENSEIGNANTS&action=menu' class='text-decoration-none'>
                    <div class="card shadow-sm text-center" style="width: 400px; height: 250px; border-radius: 15px; background-color: #f8f9fa;">
                        <div class="card-body d-flex flex-column justify-content-center align-items-center">
                            <img src="icons/retour.png" alt="Retour Projet" style="width: 100px; height: 100px;">
                            <h5 class="card-title mt-3 fs-4" style="color: #000;">Retour Projet</h5>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <?php
    }

    
}