<?php
Class VueAjoutNote {

    public function accueil() {
        ?>
        <div class="accueil_ajoutnote">
            <h1>Accueil Ajout Note</h1>
            <li><a class="btn btn-dark" href="index.php?module=AjoutNote&action=form_ajoutnote">Ajouter une note Individuel</a></li>
            <li><a class="btn btn-dark" href="index.php?module=AjoutNote&action=form_ajoutnoteGrp">Ajouter une note de Groupe</a></li>
        </div>
        <?php
    }

    public function form_ajoutnote($evaluations, $etudiants,$projets) {
      
        $evaluationOptions = "";
        foreach ($evaluations as $evaluation) {
            $evaluationOptions .= "<option value='{$evaluation['idEval']}'>Évaluation ID {$evaluation['idEval']}</option>";
        }

     
        $etudiantOptions = "";
        foreach ($etudiants as $etudiant) {
            $etudiantOptions .= "<option value='{$etudiant['idUtilisateur']}'>Étudiant ID {$etudiant['idUtilisateur']}</option>";
        }

        $projetOptions = "";
        foreach ($projets as $projet) {
            $projetOptions .= "<option value='{$projet['idProjet']}'>Projet ID {$projet['idProjet']}</option>";
        }

        ?>
        <div class="ajout_note">
            <h1>Ajouter une Note</h1>
            <form action="index.php?module=AjoutNote&action=verif_ajout" method="POST">
                <label for="evaluation_id">Évaluation</label>
                <select name="evaluation_id" id="evaluation_id">
                    <?= $evaluationOptions; ?>
                </select>
                <br>

                <label for="etudiant_id">Étudiant</label>
                <select name="etudiant_id" id="etudiant_id">
                    <?= $etudiantOptions; ?>
                </select>
                <br>

                <label for="projet_id">Projet</label>
                <select name="projet_id" id="projet_id">
                    <?= $projetOptions; ?>
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

    public function form_ajoutnoteGrp($evaluations, $groupes,$projets) {
   
        $evaluationOptions = "";
        foreach ($evaluations as $evaluation) {
            $evaluationOptions .= "<option value='{$evaluation['idEval']}'>Évaluation ID {$evaluation['idEval']}</option>";
        }

       
        $groupeOptions = "";
        foreach ($groupes as $groupe) {
            $groupeOptions .= "<option value='{$groupe['idGroupe']}'>Groupe ID {$groupe['idGroupe']}</option>";
        }

        $projetOptions = "";
        foreach ($projets as $projet) {
            $projetOptions .= "<option value='{$projet['idProjet']}'>Projet ID {$projet['idProjet']}</option>";
        }

        ?>
        <div class="ajout_note">
            <h1>Ajouter une Note</h1>
            <form action="index.php?module=AjoutNote&action=verif_ajoutGrp" method="POST">
                <label for="evaluation_id">Évaluation</label>
                <select name="evaluation_id" id="evaluation_id">
                    <?= $evaluationOptions; ?>
                </select>
                <br>

                <label for="groupe_id">Groupe</label>
                <select name="groupe_id" id="groupe_id">
                    <?= $groupeOptions; ?>
                </select>
                <br>

                <label for="projet_id">Projet</label>
                <select name="projet_id" id="projet_id">
                    <?= $projetOptions; ?>
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
