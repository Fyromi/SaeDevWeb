<?php
Class VueAjoutEvaluation {

    public function accueil(){
        ?>
        <div class="accueil_ajoutevaluation">
            <h1>Accueil Ajout Evaluation</h1>
            <li><a class="btn btn-dark" href="index.php?module=AjoutEval&action=form_ajoutevaluation">Ajouter Evaluation</a></li>
        </div>
        <?php
    }

    public function form_ajoutevaluation($projets){
        $projetOptions = "";
        foreach ($projets as $projet) {
            $projetOptions .= "<option value='{$projet['idProjet']}'>Projet ID {$projet['idProjet']}</option>";
        }
        ?>
        <div class="ajout_evaluation">
            <h1>Ajouter une Evaluation</h1>
            <form action="index.php?module=AjoutEval&action=verif_ajout" method="POST">
                Nom de l'Evaluation
                <input type="text" name="nom"></input>
                <br>
                <label for="projet_id">Projet</label>
                <select name="projet" id="projet">
                    <?= $projetOptions; ?>
                </select>
                <br>
                Date
                <input type="date" name="date"></input>
                <br>
                Coefficient
                <input type="number" step="0.01" name="coeff"></input>
                <br>
                <input type="submit"/>
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
        Echec de l'ajout
        <?php
    }
}
?>
