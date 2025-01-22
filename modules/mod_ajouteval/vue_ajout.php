<?php
Class VueAjoutEvaluation {

    public function accueil(){
        ?>
        <div class="accueil_ajoutevaluation">
            <h1>Accueil Ajout Evaluation</h1>
            <a href="index.php?module=AjoutEval&action=form_ajoutevaluation"><img width="100px" src="images/ajout_croix.png"></a>
        </div>
        <?php
    }

    public function form_ajoutevaluation(){
        ?>
        <div class="ajout_evaluation">
            <h1>Ajouter une Evaluation</h1>
            <form action="index.php?module=AjoutEval&action=verif_ajout" method="POST">
                Nom de l'Evaluation
                <input type="text" name="nom"></input>
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
