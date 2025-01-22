<?php
// modules/mod_depot_devoirs/vue_depot_devoirs.php

class VueDepotDevoirs {

    public function afficherFormulaireDepot() {
        ?>
        <form action="index.php?module=depotdevoirs&action=deposer_devoir" method="POST" enctype="multipart/form-data">
            <label for="devoir">Nom du devoir:</label>
            <input type="text" name="devoir" required><br>

            <label for="file">Sélectionner un fichier:</label>
            <input type="file" name="file" required><br>

            <input type="submit" value="Déposer le devoir">
        </form>
        <?php
    }

    public function confirmationDepot() {
        // Confirmer que le devoir a été correctement déposé
        echo "Le devoir a été déposé avec succès!";
    }
}
?>
