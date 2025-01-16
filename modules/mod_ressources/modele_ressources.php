<?php
require_once "modules/mod_connexion/controleur_connexion.php";

class ModeleRESSOURCES extends Connexion{

    private $queries;

    public function __construct(){
        $this->queries = include 'modules/mod_RESSOURCES/requete.php';
    }

    private function executeQuery($sql, $params) {
        $request = connexion::$bdd->prepare($sql);
        foreach ($params as $key => $value) {
            $request->bindValue($key, $value);
        }
        $request->execute();
        return $request;
    }

    private function getRessources($idProjet){
        $sql = $this->queries['getRessources'];
        return $this->executeQuery($sql, [':idProjet' => $idProjet])->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getDepot($idProjet){
        $sql = $this->queries['getDepots'];
        return $this->executeQuery($sql, [':idProjet' => $idProjet])->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getRessourcesByType($idProjet, $type) {
        $ressources = $this->getRessources($idProjet);
    
        $result = [];
    
        foreach ($ressources as $ressource) {
            if ($ressource['type'] == $type) {
                $result[] = $ressource;
            }
        }
    
        return $result;
    }
    
}