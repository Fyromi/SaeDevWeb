<?php
include_once 'Connexion.php';

class ModeleListProjet extends Connexion{
    public function __construct(){}

    public function exemple(){
        $request = connexion::$database->prepare('Select count(*) from projet');
        $request->execute();

        $projet= $request->fetchAll();
        return $projet;
    }
}

?>