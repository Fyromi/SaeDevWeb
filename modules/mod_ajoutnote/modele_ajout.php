<?php
Class ModeleAjoutNote extends Connexion {

    public function get_evaluations() {
        $req = self::$bdd->query("SELECT idEval FROM evaluation");
        return $req->fetchAll();
    }
    public function get_groupes() {
        $req = self::$bdd->query("SELECT idGroupe FROM groupeetudiant");
        return $req->fetchAll();
    }

    public function get_etudiants() {
        $req = self::$bdd->query("SELECT idUtilisateur FROM utilisateur Where role='etudiant'");
        return $req->fetchAll();
    }

    public function get_projets() {
        $req = self::$bdd->query("SELECT idProjet FROM Projet ");
        return $req->fetchAll();
    }

    public function ajout_note($evaluation_id, $etudiant_id,$projet_id, $note) {
        $req = self::$bdd->prepare('INSERT INTO notesIndividuel (idEtud, idEval,idProjet, note) VALUES (:etudiant_id,:evaluation_id,:projet_id, :note)');
        return $req->execute([
            'etudiant_id' => $etudiant_id,
            'evaluation_id' => $evaluation_id,
            'projet_id' => $projet_id,
            'note' => $note
        ]);
    }

    public function ajout_noteGrp($evaluation_id, $groupe_id,$projet_id, $note) {
        $req = self::$bdd->prepare('INSERT INTO notesGroupe (idGroupe, idEval,idProjet, note) VALUES (:groupe_id,:evaluation_id,:projet_id, :note)');
        return $req->execute([
            'groupe_id' => $groupe_id,
            'evaluation_id' => $evaluation_id,
            'projet_id' => $projet_id,
            'note' => $note
        ]);
    }
}
?>
