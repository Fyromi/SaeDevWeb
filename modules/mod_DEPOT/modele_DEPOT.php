<?php
require_once "modules/mod_connexion/controleur_connexion.php";

class ModeleDEPOT extends Connexion{

    private $queries;

    public function __construct(){
        $this->queries = include 'modules/mod_DEPOT/requete.php';
    }

    private function executeQuery($sql, $params) {
        $request = connexion::$bdd->prepare($sql);
        foreach ($params as $key => $value) {
            $request->bindValue($key, $value);
        }
        $request->execute();
        return $request;
    }
}