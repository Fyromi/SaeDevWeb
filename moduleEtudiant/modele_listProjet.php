<?php
include_once 'Connexion.php';

class ModeleListProjet extends Connexion{

    public function __construct(){}

    public function getList(){
        $request = connexion::$database->prepare('SELECT DISTINCT projet.idProjet, projet.titre, projet.description, projet.anneeUniversitaire, projet.semestre
                                                  FROM utilisateur
                                                  JOIN appartientA ON utilisateur.idUtilisateur = appartientA.idUtilisateur
                                                  JOIN associeAProjet ON appartientA.idGroupe = associeAProjet.idGroupe
                                                  JOIN projet ON associeAProjet.idProjet = projet.idProjet
                                                  WHERE utilisateur.idUtilisateur = ?');
        $utilisateur = $this->getIDUtilisateur();
        $request->bindParam(1,$utilisateur);
        $request->execute();

        $projet= $request->fetchAll(PDO::FETCH_ASSOC);
        return $projet;
    }

    public function getProjet($id){
        $request = connexion::$database->prepare('SELECT DISTINCT *
                                                  FROM projet
                                                  WHERE idProjet = ?');
        $request->bindParam(1,$id);
        $request->execute();

        $projet= $request->fetch(PDO::FETCH_ASSOC);
        return $projet;
    }

    public function getIDUtilisateur(){
        $request = connexion::$database->prepare('SELECT idUtilisateur
                                                FROM utilisateur
                                                WHERE utilisateur.login = :logi AND utilisateur.mdp = :mdp'
                                                );
        
        $request->bindParam(':logi', $_GET['login']);
        $request->bindParam(':mdp', $_GET['pass']);

        $request->execute();
        $utilisateur = $request->fetch(PDO::FETCH_ASSOC);
        return $utilisateur['idUtilisateur'];
    }
}

?>