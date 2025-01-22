<?php
Class ModeleAjoutNote extends Connexion {

    public function get_evaluations() {
        $req = self::$bdd->query("SELECT idEval FROM evaluation");
        return $req->fetchAll();
    }

    public function get_etudiants() {
        $req = self::$bdd->query("SELECT idUtilisateur FROM utilisateur Where role='etudiant'");
        return $req->fetchAll();
    }

    public function ajout_note($evaluation_id, $etudiant_id, $note) {
        $req = self::$bdd->prepare('INSERT INTO notesIndividuel (idEtud, idEval, note) VALUES (:evaluation_id, :etudiant_id, :note)');
        return $req->execute([
            'evaluation_id' => $evaluation_id,
            'etudiant_id' => $etudiant_id,
            'note' => $note
        ]);
    }
}
?>
