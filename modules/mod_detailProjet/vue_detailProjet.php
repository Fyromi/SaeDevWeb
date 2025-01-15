<?php
class VueDetailProjet {
    public function __construct() {}

    public function vueDetailProjet($etudiants, $projet, $intervenant){
        $this->sectionGroupe($etudiants, $projet);
        $this->sectionIntervenant($intervenant, $projet);

    }

    private function sectionGroupe($etudiants, $projet){
        
        echo "<form action='index.php?module=detailProjet&idProjet=".$projet['idProjet']."&action=creerGrp' method='POST'>";
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


    private function sectionIntervenant($intervenants, $projet){
        
        echo "<form action='index.php?module=detailProjet&idProjet=".$projet['idProjet']."&action=ajtInter' method='POST'>";
        ?>

            <label>Choisisser les intervenant a ajouter</label><br><br>
        <?php
            foreach ($intervenants as $intervenant) {
                echo "<label for='checkbox'>".$intervenant['login']."</label>";
                echo "<input type='checkbox' id='".$intervenant['idUtilisateur']."' name='".$intervenant['idUtilisateur']."'><br>";
            }
        ?>

            <!-- Bouton de soumission -->
            <input type="submit" value="Soumettre">
        </form>

        <?php
        
    }

}   
?>
