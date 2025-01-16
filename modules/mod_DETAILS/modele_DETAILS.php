<?php
require_once "modules/mod_connexion/controleur_connexion.php";

class ModeleDETAILS extends Connexion{

    private $queries;

    public function __construct(){
        $this->queries = include 'modules/mod_DETAILS/requete.php';
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
        $idGrp = $this->addGroupe($idProjet);
        foreach ($listeEtudiant as $etudiant) {
            $sql = $this->queries['addEtudiantGrp'];
            $this->executeQuery($sql, [':idGroupe' => $idGrp, ':idEtudiant' => $etudiant]);
        }
    }

    public function addGroupe($idProjet){


        $sql = $this->queries['addGroupe'];
        
        $this->executeQuery($sql, [':nomGroupe' => $_POST['texte']]);

        $idGrp = self::$bdd->lastInsertId();

        $sql2 = $this->queries['associeProjet'];
        $this->executeQuery($sql2, [':idGrp' => $idGrp, ':idProjet' => $idProjet ]);
        return $idGrp;
    }

    public function getIntervenant($idProjet){
        $sql = $this->queries['getIntervenant'];
        $request = $this->executeQuery($sql, [':idProjet' => $idProjet]);
        return $request->fetchAll(PDO::FETCH_ASSOC);
    }

    public function ajoutIntervenantBD($idProjet){


        $listeIntervenant = [];

        foreach ($_POST as $key => $value) {
            if ($key !== 'texte') {
                $listeIntervenant[] = $key;
            }
        }
        foreach ($listeIntervenant as $intervenant) {
            $sql = $this->queries['addIntervenantProjet'];
            $this->executeQuery($sql, [':idProjet' => $_GET['idProjet'], ':idIntervenant' => $intervenant]);
        }
    }

    public function importFile($idProjet) {
        
        $repertoire =dirname(__DIR__, 2)."/Projet/Projet" . $idProjet . "/ressource";
        $nom = $_POST['texte'];
        $fichierTmp = $_FILES['fichier']['tmp_name'];
        $nomFichier = basename($_FILES['fichier']['name']);
        $cheminFinal = $repertoire . "/" . $nomFichier;
        $cheminForbdd = "Projet/Projet" . $idProjet . "/ressource"."/". $nomFichier;
        move_uploaded_file($fichierTmp, $cheminFinal);
        $this->insertLinkToBdd($nom,$cheminForbdd, $idProjet);
    }

    private function insertLinkToBdd($nom, $lien, $idProjet){
        $sql = $this->queries['insertLinkBdd'];
        $this->executeQuery($sql, [':nom' => $nom, ':lien' => $lien]);
        $sq2 = $this->queries['projetRessource'];
        $this->executeQuery($sq2, [':idProjet' => $idProjet, ':idRessource' => self::$bdd->lastInsertId()]);
    }

    public function estResponsableDe($idProjet){
            $sql = $this->queries['estResponsableDe'];
            $request = $this->executeQuery($sql, [':idProjet' => $idProjet, ':login' => $_SESSION['login']]);
            return $request->fetchColumn();
    }

}