<?php
require_once "modules/mod_connexion/controleur_connexion.php";

class ModeleRessources extends Connexion{

    private $queries;

    public function __construct(){
        $this->queries = include 'modules/mod_ressources/requete.php';
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
        return executeQuery($sql, $idProjet)->fetchAll(PDO::FETCH_ASSOC);
    }
}