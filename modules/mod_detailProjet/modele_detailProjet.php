<?php
require_once "modules/mod_connexion/controleur_connexion.php";

class ModeleDetailProjet extends Connexion{

    private $queries;

    public function __construct(){
        $this->queries = include 'modules/mod_detailProjet/requete.php';
    }

    private function executeQuery($sql, $params) {
        
        $request = connexion::$bdd->prepare($sql);
        foreach ($params as $key => $value) {
            $request->bindValue($key, $value);
        }
        $request->execute();
        return $request;
    }

    public function getEtudiantSansGrp($idProjet){
        $sql = $this->queries['getEtudiantSansGrp'];
        $request = $this->executeQuery($sql, [':idProjet' => $idProjet]);
        return $request->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getProjet($id){
        $sql = $this->queries['getProjet'];
        $request = $this->executeQuery($sql, [':id' => $id]);
        return $request->fetch(PDO::FETCH_ASSOC);
    }

    public function ajoutGroupeBD($idProjet){


        $listeEtudiant = [];

        foreach ($_POST as $key => $value) {
            if ($key !== 'texte') {
                $listeEtudiant[] = $key;
            }
        }

        $this->addGroupe($idProjet);
    }

    public function addGroupe($idProjet){
        $sql = $this->queries['addGroupe'];
        
        $this->executeQuery($sql, [':nomGroupe' => $_POST['texte']]);

        $sql2 = $this->queries['associeProjet'];
        $this->executeQuery($sql2, [':idGrp' => self::$bdd->lastInsertId(), ':idProjet' => $idProjet ]);
        echo 'Coucou';

    }
}