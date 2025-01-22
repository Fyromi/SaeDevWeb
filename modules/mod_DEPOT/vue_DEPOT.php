<?php
class VueDEPOT {
    public function __construct() {}


    public function afficherDepot(){
        ?>
     <div class="collapse row show" id="collapseDocuments">
   <div class="col-12 col-sm-6 mb-2">
       <div class="card text-center">
           <div class="card-body d-flex flex-column justify-content-between align-items-center h-100">
               <h4 class="fw-bold">Déposer un Document</h4>
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
