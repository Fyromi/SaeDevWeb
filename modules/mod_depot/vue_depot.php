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

            <div class="col-12 col-sm-6 mb-2">
                <div class="card text-center">
                    <div class="card-body d-flex flex-column justify-content-between align-items-center h-100">
                        <form action="index.php?module=Depot&action=ajoutDepot&idDepot=<?=$_GET['idDepot']?>&idProjet=<?=$_GET['idProjet']?>" method="POST" enctype="multipart/form-data">
                            <div class="mb-3 text-center">
                                <label for="file" class="form-label w-100">
                                    <img src="icons/plus.png" alt="Ajouter un document" class="img-fluid w-50" style="cursor: pointer;">
                                </label>
                                <input type="file" name="fichier" id="file" class="form-control d-none" required onchange="document.getElementById('fileName').textContent = this.files[0].name">
                            </div>
                            <div class="d-flex justify-content-end align-items-center mt-3 w-100">
                                <span id="fileName" class="me-3 text-muted">Aucun fichier sélectionné</span>
                                <button type="submit" class="btn btn-dark position-absolute bottom-0 end-0 m-3">OK</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php       
    }
}
?>
