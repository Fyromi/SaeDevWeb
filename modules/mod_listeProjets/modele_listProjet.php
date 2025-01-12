<?php
require_once "modules/mod_connexion/controleur_connexion.php";

class ModeleListProjet extends Connexion{

    private $queries;

    public function __construct(){
        $this->queries = include 'modules/mod_listeProjets/requete.php';
    }

    private function executeQuery($sql, $params) {
        $request = connexion::$bdd->prepare($sql);
        foreach ($params as $key => $value) {
            $request->bindValue($key, $value);
        }
        $request->execute();
        return $request;
    }

    public function getList(){
        $sql = $this->queries['getList'];
        $utilisateur = $this->getIDUtilisateur();
        $request = $this->executeQuery($sql, [':utilisateur' => $utilisateur['idUtilisateur']]);
        return $request->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getProjet($id){
        $sql = $this->queries['getProjet'];
        $request = $this->executeQuery($sql, [':id' => $id]);
        return $request->fetch(PDO::FETCH_ASSOC);
    }

    public function getIDUtilisateur(){
        $sql = $this->queries['getIDUtilisateur'];
        $request = $this->executeQuery($sql, [':logi' => $_SESSION['login']]);
        return $request->fetch(PDO::FETCH_ASSOC);
    }

    public function getProfProjet($idProjet){
        $sql = $this->queries['getProfProjet'];
        $request = $this->executeQuery($sql, [':idProjet' => $idProjet]);
        return $request->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getMemebreGrp($idProjet){
        $sql = $this->queries['getGrpEtudiant'];
        $params = [
            ':idProjet' => (int) $idProjet,
            ':idUtilisateur' => (int) $this->getIDUtilisateur()['idUtilisateur']
        ];

        $request = $this->executeQuery($sql, $params);
        return $request->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getNomGrp($idProjet){
        $sql = $this->queries['getNomGrp'];
        $params = [
            ':idProjet' => (int) $idProjet,
            ':idUtilisateur' => (int) $this->getIDUtilisateur()['idUtilisateur']
        ];
        $request = $this->executeQuery($sql, $params);
        return $request->fetch(PDO::FETCH_ASSOC);
    }

    public function getProfilPicture($idUtilisateur){
        $sql = $this->queries['getProfilPicture'];
        $request = $this->executeQuery($sql, [':idUtilisateur' =>$idUtilisateur]);
        return $request->fetchColumn();
    }

    public function getPaireNomImage($utilisateurs) {
        $tableaudePaire = []; 
    
        foreach ($utilisateurs as $utilisateur) {
            $image = $this->getProfilPicture($utilisateur['idUtilisateur']);
            
            $tableaudePaire[] = [
                'login' => $utilisateur['login'],
                'image' => $image
            ];
        }
    
        return $tableaudePaire;
    }    

}