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
                                                  WHERE utilisateur.idUtilisateur = :utilisateur');
        $utilisateur = $this->getIDUtilisateur();
        $request->bindParam(':utilisateur', $utilisateur);
        $request->execute();

        $projet= $request->fetchAll(PDO::FETCH_ASSOC);
        return $projet;
    }

    public function getProjet($id){
        $request = connexion::$database->prepare('SELECT DISTINCT *
                                                  FROM projet
                                                  WHERE idProjet = :id');
        $request->bindParam(':id',$id);
        $request->execute();

        $projet= $request->fetch(PDO::FETCH_ASSOC);
        return $projet;
    }

    public function getIDUtilisateur(){
        $request = connexion::$database->prepare('SELECT idUtilisateur
                                                FROM utilisateur
                                                WHERE utilisateur.login = :logi'
                                                );
        
        $request->bindParam(':logi', $_GET['login']);
        $request->execute();
        $utilisateur = $request->fetch(PDO::FETCH_ASSOC);
        return $utilisateur['idUtilisateur'];
    }

    public function getProfProjet($idProjet){
        $request = connexion::$database->prepare("SELECT *
                                                FROM utilisateur
                                                JOIN estResponsableDe ON utilisateur.idUtilisateur = estResponsableDe.idUtilisateur
                                                WHERE estResponsableDe.idProjet = :idProjet AND utilisateur.role = 'responsable'
                                                UNION
                                                SELECT *
                                                FROM utilisateur
                                                JOIN intervientDans ON utilisateur.idUtilisateur = intervientDans.idUtilisateur
                                                WHERE intervientDans.idProjet = :idProjet AND utilisateur.role = 'intervenant';
                                                ");
        
        $request->bindParam(':idProjet', $idProjet);
        $request->execute();
        $profs = $request->fetchAll(PDO::FETCH_ASSOC);
        return $profs;
    }
    
}

?>