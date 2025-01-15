<?php
class VueDetailProjet {
    public function __construct() {}

    public function vueDetailProjet($etudiants, $projet, $intervenant){
        ?>
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-6">
                    <?php $this->sectionGroupe($etudiants, $projet); ?>
                </div>
                <div class="col-md-6">
                    <?php $this->sectionIntervenant($intervenant, $projet); ?>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-6">
                    <?php $this->sectionUpload($projet); ?>
                </div>
                <div class="col-md-6">
                    <?php $this->sectionAjoutDepot($projet); ?>
                </div>
            </div>
        </div>
        <?php
    }

    private function sectionGroupe($etudiants, $projet){
        ?>
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                Ajouter un Groupe
            </div>
            <div class="card-body">
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
                    <button type="submit" class="btn btn-primary">Soumettre</button>
                </form>
            </div>
        </div>
        <?php
    }

    private function sectionIntervenant($intervenants, $projet){
        ?>
        <div class="card shadow-sm">
            <div class="card-header bg-secondary text-white">
                Ajouter des Intervenants
            </div>
            <div class="card-body">
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
                    <button type="submit" class="btn btn-secondary">Soumettre</button>
                </form>
            </div>
        </div>
        <?php
    }

    private function sectionUpload($projet) {
        ?>
        <div class="card shadow-sm">
            <div class="card-header bg-success text-white">
                Déposer un Document
            </div>
            <div class="card-body">
                <form action="index.php?module=detailProjet&idProjet=<?= $projet['idProjet'] ?>&action=depDocu" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="NomRessource" class="form-label">Titre de la Ressource</label>
                        <input type="text" id="NomRessource" name="texte" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="file" class="form-label">Ajouter un Document :</label>
                        <input type="file" name="fichier" id="file" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-success">Déposer</button>
                </form>
            </div>
        </div>
        <?php
    }

    private function sectionAjoutDepot($projet) {
        ?>
        <div class="card shadow-sm">
            <div class="card-header bg-info text-white">
                Section à Compléter
            </div>
            <div class="card-body">
                <p>Section à compléter selon les besoins futurs.</p>
            </div>
        </div>
        <?php
    }
}
?>
