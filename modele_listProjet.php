<?php
include_once 'Connexion.php';

class ModeleListProjet extends Connexion{
    public function __construct(){}

    public function getProjets(){
        $request = connexion::$database->prepare('SELECT DISTINCT projet.idProjet, projet.titre, projet.description, projet.anneeUniversitaire, projet.semestre
                                                  FROM utilisateur
                                                  JOIN appartientA ON utilisateur.idUtilisateur = appartientA.idUtilisateur
                                                  JOIN associeAProjet ON appartientA.idGroupe = associeAProjet.idGroupe
                                                  JOIN projet ON associeAProjet.idProjet = projet.idProjet
                                                  WHERE utilisateur.login = :logi AND utilisateur.mdp = :mdp'
                                                );

        $request->bindParam(':logi', $_GET['login']);
        $request->bindParam(':mdp', $_GET['pass']);
        $request->execute();

        $projet= $request->fetchAll();
        return $projet;
    }
}

?>