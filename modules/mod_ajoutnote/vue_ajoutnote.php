<?php
Class VueAjoutNote {

    public function accueil() {
        ?>
        <div class="accueil_ajoutnote">
            <h1>Accueil Ajout Note</h1>
            <a href="index.php?module=AjoutNote&action=form_ajoutnote"><img width="100px" src="images/ajout_croix.png"></a>
        </div>
        <?php
    }

    public function form_ajoutnote($evaluations, $etudiants) {
        ?>
        <div class="ajout_note">
            <h1>Ajouter une Note</h1>
            <form action="index.php?module=AjoutNote&action=verif_ajout" method="POST">
                <label for="evaluation_id">Évaluation</label>
                <select name="evaluation_id" id="evaluation_id">
                    <?php foreach ($evaluations as $evaluation){ 
                    
                     } ?>
                </select>
                <br>

                <label for="etudiant_id">Étudiant</label>
                <select name="etudiant_id" id="etudiant_id">
                    <?php foreach ($etudiants as $etudiant): ?>
                        <option value="<?= $etudiant['idUtilisateur'] ?>"></option>
                    <?php endforeach; ?>
                </select>
                <br>

                <label for="note">Note</label>
                <input type="number" step="0.01" name="note" id="note">
                <br>

                <input type="submit" value="Ajouter">
            </form>
        </div>
        <?php
    }

    public function confirm_ajout() {
        ?>
        Ajout réussie !
        <?php
    }

    public function erreur_ajout() {
        ?>
        Échec de l'ajout
        <?php
    }
}
?>
