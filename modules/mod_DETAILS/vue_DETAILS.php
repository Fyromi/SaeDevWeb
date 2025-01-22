<?php
class VueDETAILS {
    public function __construct() {}

    public function vueDetailProjet($etudiants, $projet, $intervenantsLibre, $estResponsableDe, $intervenantPris, $groupeAndEtudiant, $groupeName, $ressources){
        ?>
        <div class="row pb-3">
            <div class="col-sm-10 col-xs-6 col-9">
                <a class="text-decoration-none text-dark" data-toggle="collapse" href="#collapseUtilisateur" role="button" aria-expanded="true" aria-controls="collapseUtilisateur">
                    <h3 class="border-bottom border-secondary pb-3 dropdown-toggle">
                        Gestion des Accès Utilisateur
                    </h3>
                </a>
            </div>
            <div class="col-sm-1 col-xs-1 col-1 text-end">
                <a href="index.php?module=Enseignants&action=menu" class="btn">
                    <div class="card shadow-sm text-center p-1">
                        <img class="card-img m-0" src="icons/retour.png" alt="Retour">
                        <span class="card-title h6">Retour</span>
                    </div>
                </a>
            </div>
            <div class="collapse row show" id="collapseUtilisateur">
                <div class="col-12 col-sm-6 mb-2">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="mb-4">Ajouter un Groupe</h4>
                            <form action="index.php?module=Details&idProjet=<?= htmlspecialchars($projet['idProjet']) ?>&action=creerGrp" method="POST">
                                <div class="mb-3">
                                    <label for="texte" class="form-label">Nom du groupe pour le projet <?= htmlspecialchars($projet['titre']) ?></label>
                                    <input type="text" id="NomProjet" name="texte" class="form-control" required>
                                </div>
                                <label class="form-label">Choisissez les étudiants à ajouter</label>
                                <div class="mb-3 scrollable-section">
                                    <?php foreach ($etudiants as $etudiant) { ?>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="etudiant_<?= htmlspecialchars($etudiant['idUtilisateur']) ?>" name="etudiants[]" value="<?= htmlspecialchars($etudiant['idUtilisateur']) ?>">
                                            <label class="form-check-label" for="etudiant_<?= htmlspecialchars($etudiant['idUtilisateur']) ?>">
                                                <?= htmlspecialchars($etudiant['login']) ?>
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
                <div class="col-12 col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="mb-4">Ajouter des Intervenants</h4>
                            <form action="index.php?module=Details&idProjet=<?= htmlspecialchars($projet['idProjet']) ?>&action=ajtInter" method="POST">
                                <label class="form-label">Choisissez les intervenants à ajouter</label>
                                <div class="mb-3 scrollable-section">
                                    <?php foreach ($intervenantsLibre as $intervenant) { ?>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="intervenant_<?= htmlspecialchars($intervenant['idUtilisateur']) ?>" name="intervenants[]" value="<?= htmlspecialchars($intervenant['idUtilisateur']) ?>">
                                            <label class="form-check-label" for="intervenant_<?= htmlspecialchars($intervenant['idUtilisateur']) ?>">
                                                <?= htmlspecialchars($intervenant['login']) ?>
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
                <a class="text-decoration-none text-dark" data-toggle="collapse" href="#collapseDocuments" role="button" aria-expanded="true" aria-controls="collapseDocuments">
                    <h3 class="border-bottom border-secondary pb-3 dropdown-toggle">
                        Gestion des Documents
                    </h3>
                </a>
            </div>
            <div class="collapse row show" id="collapseDocuments">
                <div class="col-12 col-sm-6 mb-2">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="mb-4">Déposer un Document</h4>
                            <form action="index.php?module=Details&idProjet=<?= htmlspecialchars($projet['idProjet']) ?>&action=depDocu" method="POST" enctype="multipart/form-data">
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
                
                <div class="col-12 col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="mb-4">Créer un Dépôt</h4>
                            <form action="index.php?module=Details&idProjet=<?= htmlspecialchars($projet['idProjet']) ?>&action=creerDepot" method="POST">
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

        <?php if((count($groupeAndEtudiant) != 0) || (count($intervenantPris) != 0)): ?>
            <div class="row pb-5">
                <div class="col-sm-10 col-xs-6 col-9">
                    <a class="text-decoration-none text-dark" data-toggle="collapse" href="#collapseVue" role="button" aria-expanded="true" aria-controls="collapseVue">
                        <h3 class="border-bottom border-secondary pb-3 dropdown-toggle">
                        Vue sur le Projet
                        </h3>
                    </a>
                </div>
                <div class="collapse row show" id="collapseVue">
                    <?php if(count($groupeAndEtudiant) != 0): ?>
                    <div class="col-12 col-sm-6 mb-2">
                        <div class="card">
                            <div class="card-body">
                                <?php $this->afficherGroupe($groupeAndEtudiant, htmlspecialchars($projet['idProjet']), $groupeName); ?>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php if(count($intervenantPris) != 0 && $estResponsableDe == 1): ?>
                    <div class="col-12 col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="mb-4">Liste des Intervenants</h4>
                                <ul class="list-group scrollable-section">
                                    <?php foreach ($intervenantPris as $intervenant) { ?>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <?= htmlspecialchars($intervenant['login']) ?>
                                        <form action="index.php?module=Details&idProjet=<?= htmlspecialchars($projet['idProjet']) ?>&action=deleteIntervenant" method="POST" class="m-0">
                                            <input type="hidden" name="idUtilisateur" value="<?= htmlspecialchars($intervenant['idUtilisateur']) ?>">
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
                    <?php if(count($groupeAndEtudiant) != 0): ?>
                    <div class="col-12 col-sm-6 mb-2">
                        <div class="card">
                            <div class="card-body">
                                <?php $this->afficherRessource($groupeAndEtudiant, htmlspecialchars($projet['idProjet']), $groupeName, $ressources); ?>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>
        <?php if($estResponsableDe == 1): ?>
        <form action="index.php?module=Details&idProjet=<?= $projet['idProjet'] ?>&action=deleteProjet" method="POST">
            <button type='submit' class='btn btn-danger btn-lg w-100 p-4'>
                <img src='icons/Supprimer.png';>
            </button>
        </form>
        <?php endif;
    }

    public function afficherGroupe($groupeAndEtudiant, $idProjet, $groupeName) {
        if(isset($groupeAndEtudiant)){
            echo "<h4 class='mb-4'>Groupe d'étudiant</h4>";
            echo "<ul class='list-group mt-2 scrollable-section'>";
            foreach ($groupeAndEtudiant as $idGroupe => $etudiants) {
                foreach ($groupeName as $groupeTableau) {
                    if ($groupeTableau['idGroupe'] == $idGroupe) {
                        $groupe = htmlspecialchars($groupeTableau['nomGroupe']);
                        echo "<li class='list-group-item'>";
                        echo "  <div class='row mb-1'>";
                        echo "      <h6 class='col mb-0'>$groupe :</h6>";
                        echo "      <form class='col-4 text-end' action='index.php?module=Details&idProjet=" . htmlspecialchars($idProjet) . "&action=deleteGroupe' method='POST'>";
                        echo "          <input type='hidden' name='idGroupe' value='$idGroupe'>";
                        echo "          <button type='submit' class='btn btn-danger btn-sm'>";
                        echo "              <img class='card-img m-0' src='icons/Supprimer.png' alt='X'>";
                        echo "          </button>";
                        echo "      </form>";
                        echo "  </div>";
                        foreach ($etudiants as $etudiant) {
                            echo "  <ul class='col-12 mb-1'>";
                            echo "      <li class='d-flex justify-content-between'>";
                            echo "          - " . htmlspecialchars($etudiant['login']);
                            echo "          <form action='index.php?module=Details&idProjet=" . htmlspecialchars($idProjet) . "&action=deleteUserGroupe' method='POST'>";
                            echo "              <input type='hidden' name='login' value='" . htmlspecialchars($etudiant['login']) . "'>";
                            echo "              <input type='hidden' name='idGroupe' value='$idGroupe'>";
                            echo "              <button type='submit' class='btn btn-danger btn-sm'>";
                            echo "                  <img class='card-img m-0' src='icons/Supprimer.png' alt='X'>";
                            echo "              </button>";
                            echo "          </form>";
                            echo "      </li>";
                            echo "  </ul>";
                        }
                        echo "</li>";
                    }
                }
            }
            echo "</ul>";
        }
    }

    public function afficherRessource($groupeAndEtudiant, $idProjet, $groupeName, $ressources) {
        if (isset($groupeAndEtudiant)) {
            echo "<h4 class='mb-4'>Dépôt d'étudiant</h4>";
            echo "<ul class='list-group mt-2 scrollable-section'>";
            foreach ($groupeAndEtudiant as $idGroupe => $etudiants) {
                foreach ($groupeName as $groupeTableau) {
                    if ($groupeTableau['idGroupe'] == $idGroupe) {
                        $groupDirectoryExists = false;
                        
                        foreach ($ressources as $item) {
                            if (strpos($item['lienRessource'], "/groupe" . $idGroupe . "/") !== false) {
                                $groupDirectoryExists = file_exists($item['lienRessource']);
                                break;
                            }
                        }
                        
                        if (!$groupDirectoryExists) {
                            continue;
                        }
                        
                        $groupe = htmlspecialchars($groupeTableau['nomGroupe']);
                        echo "<li class='list-group-item'>";
                        echo "  <div class='d-flex justify-content-between align-items-center mb-1'>";
                        echo "      <h6 class='mb-0'>$groupe :</h6>";
                        
                        foreach ($ressources as $item) {
                            if (strpos($item['lienRessource'], "/groupe" . $idGroupe . "/") !== false) {
                                $positionProjet = strpos($item['lienRessource'], "/SaeDevWeb/");
                                $cheminRepertoire = substr($item['lienRessource'], $positionProjet, strpos($item['lienRessource'], "/groupe" . $idGroupe . "/") + strlen("/groupe" . $idGroupe . "/") - $positionProjet);
                                $lienRepertoire = htmlspecialchars($cheminRepertoire);
                                echo "      <a href='$lienRepertoire' class='btn btn-dark btn-sm' target='_blank'>Dépôt Du Groupe</a>";
                                break;
                            }
                        }
                        
                        echo "  </div>";
    
                        foreach ($etudiants as $etudiant) {
                            $studentDirectoryExists = false;
                            foreach ($ressources as $item) {
                                if (strpos($item['lienRessource'], "/etudiant" . $etudiant['idUtilisateur'] . "/") !== false) {
                                    $studentDirectoryExists = file_exists($item['lienRessource']);
                                    break;
                                }
                            }
                            
                            if (!$studentDirectoryExists) {
                                continue;
                            }
                            
                            echo "  <ul class='col-12 mb-1'>";
                            echo "      <li class='d-flex flex-column'>";
                            echo "          <span>- " . htmlspecialchars($etudiant['login']) . "</span>";
    
                            echo "          <div class='d-flex flex-wrap mt-1'>";
                            foreach ($ressources as $item) {
                                if (strpos($item['lienRessource'], "/etudiant" . $etudiant['idUtilisateur'] . "/") !== false) {
                                    $nomRessource = htmlspecialchars($item['nomRessource']);
                                    $lienRessource = htmlspecialchars($item['lienRessource']);
                                    echo "              <a href='$lienRessource' class='btn btn-dark btn-sm me-2 mb-2'>$nomRessource</a>";
                                }
                            }
                            echo "          </div>";
                            echo "      </li>";
                            echo "  </ul>";
                        }
                        echo "</li>";
                    }
                }
            }
            echo "</ul>";
        }
    }
}
?>
