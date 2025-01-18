<?php
class VueDETAILS {
    public function __construct() {}

    public function vueDetailProjet($etudiants, $projet, $intervenantsLibre, $estResponsableDe, $intervenantPris, $groupeAndEtudiant){
        ?>
        <div class="container py-4">
            <!-- Style général pour les titres de section -->
            <style>
                @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap');
                
                * {
                    font-family: 'Inter', sans-serif;
                }
                
                .section-title {
                    font-size: 24px;
                    color: #000;
                    padding-bottom: 10px;
                    border-bottom: 2px solid #000;
                    margin-bottom: 25px;
                    font-weight: 500;
                }
                
                .custom-card {
                    background: #fff;
                    border-radius: 8px;
                    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
                    margin-bottom: 30px;
                    height: 400px;
                }
                
                .custom-card-body {
                    padding: 20px;
                    max-height: 360px;
                    overflow-y: auto;
                }
                
                .form-control {
                    border: 1px solid #ddd;
                    border-radius: 6px;
                }
                
                .btn-custom {
                    background-color: #000;
                    color: #fff;
                    border: none;
                    padding: 8px 20px;
                    border-radius: 6px;
                }
                
                .btn-custom:hover {
                    background-color: #333;
                    color: #fff;
                }

                .btn-danger {
                    background-color: #dc3545;
                    color: #fff;
                    border: none;
                    padding: 5px 10px;
                    border-radius: 6px;
                }

                .btn-danger:hover {
                    background-color: #b02a37;
                    color: #fff;
                }
            </style>

            <h3 class="section-title">Gestion des Accès Utilisateur</h3>
            <div class="row">
                <div class="col-md-6">
                    <div class="custom-card">
                        <div class="custom-card-body">
                            <h4 class="mb-4">Ajouter un Groupe</h4>
                            <form action="index.php?module=DETAILS&idProjet=<?= $projet['idProjet'] ?>&action=creerGrp" method="POST">
                                <div class="mb-3">
                                    <label for="texte" class="form-label">Nom du groupe pour le projet <?= $projet['titre'] ?></label>
                                    <input type="text" id="NomProjet" name="texte" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Choisissez les étudiants à ajouter :</label>
                                    <?php foreach ($etudiants as $etudiant) { ?>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="etudiant_<?= $etudiant['idUtilisateur'] ?>" name="etudiants[]" value="<?= $etudiant['idUtilisateur'] ?>">
                                            <label class="form-check-label" for="etudiant_<?= $etudiant['idUtilisateur'] ?>">
                                                <?= $etudiant['login'] ?>
                                            </label>
                                        </div>
                                    <?php } ?>
                                </div>
                                <button type="submit" class="btn btn-custom">Soumettre</button>
                            </form>
                        </div>
                    </div>
                </div>

                <?php if($estResponsableDe == 1): ?>
                <div class="col-md-6">
                    <div class="custom-card">
                        <div class="custom-card-body">
                            <h4 class="mb-4">Ajouter des Intervenants</h4>
                            <form action="index.php?module=DETAILS&idProjet=<?= $projet['idProjet'] ?>&action=ajtInter" method="POST">
                                <div class="mb-3">
                                    <label class="form-label">Choisissez les intervenants à ajouter :</label>
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
                                <button type="submit" class="btn btn-custom">Soumettre</button>
                            </form>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
            </div>

            <h3 class="section-title mt-5">Gestion des Documents</h3>
            <div class="row">
                <div class="col-md-6">
                    <div class="custom-card">
                        <div class="custom-card-body">
                            <h4 class="mb-4">Déposer un Document</h4>
                            <form action="index.php?module=DETAILS&idProjet=<?= $projet['idProjet'] ?>&action=depDocu" method="POST" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="NomRessource" class="form-label">Titre de la Ressource</label>
                                    <input type="text" id="NomRessource" name="texte" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label for="file" class="form-label">Ajouter un Document :</label>
                                    <input type="file" name="fichier" id="file" class="form-control" required>
                                </div>
                                <button type="submit" class="btn btn-custom">Déposer</button>
                            </form>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="custom-card">
                        <div class="custom-card-body">
                            <?php $this->creerDepot($projet);?>
                        </div>
                    </div>
                </div>
            </div>

            <h3 class="section-title mt-5">Vue sur le Projet</h3>
            <div class="col-md-6">
                    <div class="custom-card">
                        <div class="custom-card-body">
                            <?php $this->afficherGroupe($groupeAndEtudiant, $projet['idProjet']);?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="custom-card">
                        <div class="custom-card-body">
                            <h4 class="mb-4">Liste des Intervenants</h4>
                            <ul class="list-group">
                                <?php foreach ($intervenantPris as $intervenant) { 
                                    ?>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <?=
                                        $intervenant['login'] ?>
                                        <form action="index.php?module=DETAILS&idProjet=<?= $projet['idProjet'] ?>&action=delete" method="POST" class="m-0">
                                            <input type="hidden" name="idUtilisateur" value="<?= $intervenant['idUtilisateur'] ?>">
                                            <button type="submit" class="btn btn-danger">Supprimer</button>
                                        </form>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }

    public function creerDepot($projet) {
        ?>
        <div class="container py-4">
            <div class="custom-card">
                <div class="custom-card-body">
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
                        <button type="submit" class="btn btn-custom">Créer</button>
                    </form>
                </div>
            </div>
        </div>
        <?php
    }

    public function afficherGroupe($groupeAndEtudiant,$idProjet) {
        if(isset($groupeAndEtudiant)){
             echo "<h4>Groupe d'étudiant</h4>";
            foreach ($groupeAndEtudiant as $idGroupe => $etudiants) {
                var_dump($groupeAndEtudiant);
                echo "
                <div class='mb-4'>
                    
                    <div class='d-flex justify-content-between align-items-center'>
                   
                        <h4 class='mb-0'>id du grp: $idGroupe</h4>
                        <form action='index.php?module=DETAILS&idProjet=$idProjet&action=deleteGroupe' method='POST'>
                            <input type='hidden' name='idGroupe' value='$idGroupe'>
                            <button type='submit' class='btn btn-danger btn-sm'>Supprimer Groupe</button>
                        </form>
                    </div>";
        
                echo "<ul class='list-group mt-2'>";
                //foreach ($groupeAndEtudiant as $login) {
                    echo "
                    <li class='list-group-item d-flex justify-content-between align-items-center'>
                        $etudiants
                        <form action='index.php?module=DETAILS&idProjet=$idProjet&action=deleteUserGroupe' method='POST'>
                            <input type='hidden' name='login' value='$etudiants'>
                            <button type='submit' class='btn btn-danger btn-sm'>Supprimer Utilisateur</button>
                        </form>
                    </li>";
               //}
                echo "</ul></div>";
            }
        }
        
    
    }
    
    
    
      
}
?>
