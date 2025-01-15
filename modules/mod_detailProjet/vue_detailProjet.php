<?php
class VueDetailProjet {
    public function __construct() {}

    public function vueDetailProjet($etudiants, $projet){
        $this->sectionGroupe($etudiants, $projet);

    }

    private function sectionGroupe($etudiants, $projet){
        
        echo "<form action='index.php?module=detailProjet&idProjet=".$projet['idProjet']."&action=creer' method='POST'>";
        ?>
            <!-- Champ texte -->
            <?php
            echo "<label for='texte'>Nom du groupe pour le projet ".$projet['titre']."</label><br>";
            ?>
            <input type="text" id="NomProjet" name="texte" required><br><br>

            <label>Choisisser les étudiants a ajouter</label><br><br>
        <?php
            foreach ($etudiants as $etudiant) {
                echo "<label for='checkbox'>".$etudiant['login']."</label>";
                echo "<input type='checkbox' id='".$etudiant['idUtilisateur']."' name='".$etudiant['idUtilisateur']."'><br>";
            }
        ?>

            <!-- Bouton de soumission -->
            <input type="submit" value="Soumettre">
        </form>

        <?php
        
    }

}   
?>
