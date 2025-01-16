<?php
class VueDETAILS {
    public function __construct() {}

    public function vueDetailProjet($etudiants, $projet, $intervenants, $estResponsableDe){
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
            </style>

            <h3 class="section-title">Gestion des Accès Utilisateur</h3>
            <div class="row">
                <div class="col-md-6">
                    <div class="custom-card">
                        <div class="custom-card-body">
                            <h4 class="mb-4">Ajouter un Groupe</h4>
                            <form action="index.php?module=detailProjet&idProjet=<?= $projet['idProjet'] ?>&action=creerGrp" method="POST">
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
                            <form action="index.php?module=detailProjet&idProjet=<?= $projet['idProjet'] ?>&action=ajtInter" method="POST">
                                <div class="mb-3">
                                    <label class="form-label">Choisissez les intervenants à ajouter :</label>
                                    <?php foreach ($intervenants as $intervenant) { ?>
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
                            <form action="index.php?module=detailProjet&idProjet=<?= $projet['idProjet'] ?>&action=depDocu" method="POST" enctype="multipart/form-data">
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
                            <h4 class="mb-4">Section à Compléter</h4>
                            <p>Section à compléter selon les besoins futurs.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
}
?>