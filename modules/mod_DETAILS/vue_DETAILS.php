<?php
class VueDETAILS {
    public function __construct() {}

    public function vueDetailProjet($etudiants, $projet, $intervenantsLibre, $estResponsableDe, $intervenantPris, $groupeAndEtudiant){
        ?>
        <div class="row pb-3">
            <div class="col-sm-10 col-xs-6 col-9">
                <a class="text-decoration-none text-dark" data-toggle="collapse" href="#collapseUtilisateur" role="button" aria-expanded="false" aria-controls="collapseUtilisateur">
                    <h3 class="border-bottom border-secondary pb-3 dropdown-toggle">
                        Gestion des Accès Utilisateur
                    </h3>
                </a>
            </div>
            <div class="col-sm-1 col-xs-1 col-1 text-end">
                <a href="index.php?module=ENSEIGNANTS&action=menu" class="btn">
                    <div class="card shadow-sm text-center p-1">
                        <img class="card-img m-0" src="icons/retour.png" alt="Retour">
                        <span class="card-title h6">Retour</span>
                    </div>
                </a>
            </div>
            <div class="collapse row" id="collapseUtilisateur">
                <div class="col-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="mb-4">Ajouter un Groupe</h4>
                            <form action="index.php?module=DETAILS&idProjet=<?= $projet['idProjet'] ?>&action=creerGrp" method="POST">
                                <div class="mb-3">
                                    <label for="texte" class="form-label">Nom du groupe pour le projet <?= $projet['titre'] ?></label>
                                    <input type="text" id="NomProjet" name="texte" class="form-control" required>
                                </div>
                                <label class="form-label">Choisissez les étudiants à ajouter</label>
                                <div class="mb-3 scrollable-section">
                                    <?php foreach ($etudiants as $etudiant) { ?>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="etudiant_<?= $etudiant['idUtilisateur'] ?>" name="etudiants[]" value="<?= $etudiant['idUtilisateur'] ?>">
                                            <label class="form-check-label" for="etudiant_<?= $etudiant['idUtilisateur'] ?>">
                                                <?= $etudiant['login'] ?>
                                            </label>
                                        </div>
                                    <?php } ?>
                                </div>
                                <button type="submit" class="btn btn-dark">Soumettre</button>
                            </form>
                        </div>
                    </div>
                </div>

                <?php if($estResponsableDe == 1): ?>
                <div class="col-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="mb-4">Ajouter des Intervenants</h4>
                            <form action="index.php?module=DETAILS&idProjet=<?= $projet['idProjet'] ?>&action=ajtInter" method="POST">
                                <label class="form-label">Choisissez les intervenants à ajouter</label>
                                <div class="mb-3 scrollable-section">
                                    <?php foreach ($intervenantsLibre as $intervenant) {
                                        ?>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="intervenant_<?= $intervenant['idUtilisateur'] ?>" name="intervenants[]" value="<?= $intervenant['idUtilisateur'] ?>">
                                            <label class="form-check-label" for="intervenant_<?= $intervenant['idUtilisateur'] ?>">
                                                <?= $intervenant['login'] ?>
                                            </label>
                                        </div>
                                    <?php } ?>
                                </div>
                                <button type="submit" class="btn btn-dark">Soumettre</button>
                            </form>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>

        <div class="row pb-5">
            <div class="col-sm-10 col-xs-6 col-9">
                <a class="text-decoration-none text-dark" data-toggle="collapse" href="#collapseDocuments" role="button" aria-expanded="false" aria-controls="collapseUtilisateur">
                    <h3 class="border-bottom border-secondary pb-3 dropdown-toggle">
                        Gestion des Documents
                    </h3>
                </a>
            </div>
            <div class="collapse row" id="collapseDocuments">
                <div class="col-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="mb-4">Déposer un Document</h4>
                            <form action="index.php?module=DETAILS&idProjet=<?= $projet['idProjet'] ?>&action=depDocu" method="POST" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="NomRessource" class="form-label">Titre de la Ressource</label>
                                    <input type="text" id="NomRessource" name="texte" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label for="file" class="form-label">Ajouter un Document</label>
                                    <input type="file" name="fichier" id="file" class="form-control" required>
                                </div>
                                <button type="submit" class="btn btn-dark">Déposer</button>
                            </form>
                        </div>
                    </div>
                </div>
                
                <div class="col-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="mb-4">Créer un Dépôt</h4>
                            <form action="index.php?module=DETAILS&idProjet=<?=$projet['idProjet']?>&action=creerDepot" method="POST">
                                <div class="mb-3">
                                    <label for="nomDepot" class="form-label">Nom du Dépôt</label>
                                    <input type="text" id="nomDepot" name="nomDepot" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label for="dateDepot" class="form-label">Date du Dépôt</label>
                                    <input type="date" id="dateDepot" name="dateDepot" class="form-control" required>
                                </div>
                                <button type="submit" class="btn btn-dark">Créer</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php if((count($groupeAndEtudiant) != 0) && (count($intervenantPris) != 0)): ?>
        <div class="row pb-5">
            <div class="col-sm-10 col-xs-6 col-9">
                <a class="text-decoration-none text-dark" data-toggle="collapse" href="#collapseVue" role="button" aria-expanded="false" aria-controls="collapseUtilisateur">
                    <h3 class="border-bottom border-secondary pb-3 dropdown-toggle">
                    Vue sur le Projet
                    </h3>
                </a>
            </div>

            <?php if(count($groupeAndEtudiant) != 0): ?>
            <div class="collapse row" id="collapseVue">
                <div class="col-6">
                    <div class="card">
                        <div class="card-body">
                            <?php $this->afficherGroupe($groupeAndEtudiant, $projet['idProjet']);?>
                        </div>
                    </div>
                </div>

                <?php if(count($intervenantPris) != 0): ?>
                <div class="col-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="mb-4">Liste des Intervenants</h4>
                            <ul class="list-group">
                                <?php foreach ($intervenantPris as $intervenant) { 
                                    ?>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <?=
                                    $intervenant['login'] ?>
                                    <form action="index.php?module=DETAILS&idProjet=<?= $projet['idProjet'] ?>&action=deleteIntervenant" method="POST" class="m-0">
                                        <input type="hidden" name="idUtilisateur" value="<?= $intervenant['idUtilisateur'] ?>">
                                        <button type="submit" class="btn btn-danger">
                                            <img class='card-img m-0' src='icons/supprimer.png' alt='X'>
                                        </button>
                                    </form>
                                </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
            </div>
            <?php endif; ?>
        </div>
        <?php endif; ?>

<!--TODO
Un gros boutton rouge en bas de page 'Supprimer projet' 
qui mène vers index.php?module=DETAILS&idProjet=<?= $projet['idProjet'] ?>&action=deleteProjet-->
        <?php
    }

    public function afficherGroupe($groupeAndEtudiant, $idProjet) {
        if(isset($groupeAndEtudiant)){
            echo "<h4>Groupe d'étudiant</h4>";
            echo "<ul class='list-group mt-2'>";
            foreach ($groupeAndEtudiant as $idGroupe => $etudiants) {
                echo "<li class='list-group-item'>";
                echo "  <div class='row mb-1'>";
                echo "      <h6 class='col-10 mb-0'>$idGroupe :</h6>";
                echo "      <form class='col-2  text-end' action='index.php?module=DETAILS&idProjet=$idProjet&echo action=deleteGroupe' method='POST'>";
                echo "          <input type='hidden' name='idGroupe' value='$idGroupe'>";
                echo "          <button type='submit' class='btn btn-danger btn-sm'>";
                echo "              <img class='card-img m-0' src='icons/Supprimer.png' alt='X'>";
                echo "          </button>";
                echo "      </form>";
                echo "  </div>";
                foreach ($etudiants as $login) {
                echo "      <ul class='col-12 mb-1'>";
                echo "          <li class='d-flex justify-content-between'>";
                echo "              - $login";
                echo "              <form action='index.php?module=DETAILS&idProjet=$idProjet&action=deleteUserGroupe' method='POST'>";
                echo "                  <input type='hidden' name='login' value='$login'>";
                echo "                  <input type='hidden' name='idGroupe' value='$idGroupe'>";
                echo "                  <button type='submit' class='btn btn-danger btn-sm'>";
                echo "                      <img class='card-img m-0' src='icons/Supprimer.png' alt='X'>";
                echo "                  </button>";
                echo "              </form>";
                echo "          </li>";
                echo "      </ul>";
                }
                echo "</li>";
            }
            echo "</ul>";
        }
    }
}
?>
