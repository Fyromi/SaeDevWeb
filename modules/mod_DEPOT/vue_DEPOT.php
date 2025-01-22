<?php
class VueDEPOT {
    public function __construct() {}

    public function afficherDepot(){
        ?>
        <div class="row pb-5">
            <div class="col-sm-10 col-xs-6 col-9">
                <h3 class="border-bottom border-secondary pb-3">Déposer un document</h3>
            </div>
            <div class="col-sm-1 col-xs-1 col-1 text-end">
                <a href="index.php?module=Ressources&action=menue&idProjet=<?=$_GET['idProjet']?>" class="btn">
                    <div class="card shadow-sm text-center p-1">
                        <img class="card-img m-0" src="icons/retour.png" alt="Retour">
                        <span class="card-title h6">Retour</span>
                    </div>
                </a>
            </div>

            <div class="col-sm-10 col-xs-12 col-12 mb-2 mx-auto">
                <div class="card text-center">
                    <div class="card-body d-flex flex-column justify-content-between align-items-center h-100">
                        <form action="index.php?module=Depot&action=ajoutDepot&idDepot=<?=$_GET['idDepot']?>&idProjet=<?=$_GET['idProjet']?>" method="POST" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="file" class="form-label">Ajouter un Document</label>
                                <input type="file" name="fichier" id="file" class="form-control" required onchange="document.getElementById('fileName').textContent = this.files[0].name">
                            </div>
                            <button type="submit" class="btn btn-dark">Déposer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
}
?>
