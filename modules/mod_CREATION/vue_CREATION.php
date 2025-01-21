<?php
Class VueCREATION {

    public function form_ajoutsae(){
        ?>
        <div class="row pb-5">
            <div class="col-sm-10 col-xs-6 col-9">
                <h3 class="border-bottom border-secondary pb-3">Ajouter un Projet</h3>
            </div>
            <div class="col-sm-1 col-xs-1 col-1 text-end">
                <a href="index.php?module=Enseignants&action=menu" class="btn">
                    <div class="card shadow-sm text-center p-1">
                        <img class="card-img m-0" src="icons/retour.png" alt="Retour">
                        <span class="card-title h6">Retour</span>
                    </div>
                </a>
                </div>
            </div>
        </div>
            <div class="ajout_sae">
                <form  action="index.php?module=Creation&action=verif_ajout" method="POST">
                    <div class="input-group mb-3">
                        <span class="input-group-text col-5 col-sm-3 col-lg-2">Titre de la SAE</span>
                        <input type="text" name="titre" class="form-control" placeholder="Titre de la SAE" required>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text col-5 col-sm-3 col-lg-2">Description</span>
                        <input type="text" name="desc" class="form-control" placeholder="Description" required>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text col-5 col-sm-3 col-lg-2">Année Universitaire</span>
                        <input type="number" name="annee" class="form-control" placeholder="Année Universitaire" required>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text col-5 col-sm-3 col-lg-2">Semestre</span>
                        <input type="number" name="sem" class="form-control" placeholder="Semestre" required>
                    </div>
                    <button type="submit" class="btn btn-dark" id="bouton_co">Ajouter</button>
                </form>
            </div>
<?php
    }

    public function confirm_ajout() {
        ?>
        <div class="row pb-5">
            <div class="col-sm-10 col-xs-6 col-9">
                <h3 class="border-bottom border-secondary pb-3">Ajouter un Projet</h3>
            </div>
            <div class="col-sm-1 col-xs-1 col-1 text-end">
                <a href="index.php?module=Enseignants&action=menu" class="btn">
                    <div class="card shadow-sm text-center p-1">
                        <img class="card-img m-0" src="icons/retour.png" alt="Retour">
                        <span class="card-title h6">Retour</span>
                    </div>
                </a>
                </div>
            </div>
        </div>
        <div class="alert alert-success d-flex align-items-center" role="alert">
            <div>
            Ajout réussie !</b>
            </div>
        </div>
        <?php
            }
    public function erreur_ajout($msgError) {
        ?>
        <div class="row pb-5">
            <div class="col-sm-10 col-xs-6 col-9">
                <h3 class="border-bottom border-secondary pb-3">Ajouter un Projet</h3>
            </div>
            <div class="col-sm-1 col-xs-1 col-1 text-end">
                <a href="index.php?module=Creation" class="btn">
                    <div class="card shadow-sm text-center p-1">
                        <img class="card-img m-0" src="icons/retour.png" alt="Retour">
                        <span class="card-title h6">Retour</span>
                    </div>
                </a>
                </div>
            </div>
        </div>
        <div class="alert alert-danger d-flex align-items-center" role="alert">
            <div>
            Echec de l'ajout: <b><?=$msgError?> !</b>
            </div>
        </div>
        <?php
    }

    
}