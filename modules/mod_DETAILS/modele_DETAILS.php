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

    public function getEtudiantSansGrp(){
        $sql = $this->queries['getEtudiantSansGrp'];
        $request = $this->executeQuery($sql, [':idProjet' => $_GET['idProjet']]);
        return $request->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getProjet(){
        $sql = $this->queries['getProjet'];
        $request = $this->executeQuery($sql, [':id' => $_GET['idProjet']]);
        return $request->fetch(PDO::FETCH_ASSOC);
    }

    public function ajoutGroupeBD(){


        $listeEtudiant = [];

        foreach ($_POST as $key => $value) {
            if ($key !== 'texte') {
                $listeEtudiant[] = $key;
            }
        }
        $idGrp = $this->addGroupe($_GET['idProjet']);
        foreach ($listeEtudiant as $etudiant) {
            $sql = $this->queries['addEtudiantGrp'];
            $this->executeQuery($sql, [':idGroupe' => $idGrp, ':idEtudiant' => $etudiant]);
        }
        header("location: index.php?module=DETAILS&idProjet=". $_GET['idProjet']);

    }

    public function addGroupe(){


        $sql = $this->queries['addGroupe'];
        
        $this->executeQuery($sql, [':nomGroupe' => $_POST['texte']]);

        $idGrp = self::$bdd->lastInsertId();

        $sql2 = $this->queries['associeProjet'];
        $this->executeQuery($sql2, [':idGrp' => $idGrp, ':idProjet' => $_GET['idProjet'] ]);
        return $idGrp;
    }

    public function getIntervenantLibre(){
        $sql = $this->queries['getIntervenantLibre'];
        $request = $this->executeQuery($sql, [':idProjet' => $_GET['idProjet']]);
        return $request->fetchAll(PDO::FETCH_ASSOC);
    }

    public function ajoutIntervenantBD(){


        $listeIntervenant = [];

        foreach ($_POST as $key => $value) {
            if ($key !== 'texte') {
                foreach ($value as $idIntervenant) {
                    $listeIntervenant[] = $idIntervenant;
                }
            }
        }
        foreach ($listeIntervenant as $intervenant) {
            $sql = $this->queries['addIntervenantProjet'];
            $this->executeQuery($sql, [':idProjet' => $_GET['idProjet'], ':idIntervenant' => $intervenant]);
        }
        header("location: index.php?module=DETAILS&idProjet=". $_GET['idProjet']);
        
        print_r($listeIntervenant);
    }

    public function importFile() {
        
        $repertoire =dirname(__DIR__, 2)."/Projet/Projet" . $_GET['idProjet'] . "/ressource";
        $nom = $_POST['texte'];
        $fichierTmp = $_FILES['fichier']['tmp_name'];
        $nomFichier = basename($_FILES['fichier']['name']);
        $cheminFinal = $repertoire . "/" . $nomFichier;
        $cheminForbdd = "Projet/Projet" . $_GET['idProjet'] . "/ressource"."/". $nomFichier;
        move_uploaded_file($fichierTmp, $cheminFinal);
        $this->insertLinkToBdd($nom,$cheminForbdd, $_GET['idProjet']);
    }

    private function insertLinkToBdd($nom, $lien){
        $sql = $this->queries['insertLinkBdd'];
        $this->executeQuery($sql, [':nom' => $nom, ':lien' => $lien]);
        $sq2 = $this->queries['projetRessource'];
        $this->executeQuery($sq2, [':idProjet' => $_GET['idProjet'], ':idRessource' => self::$bdd->lastInsertId()]);
    }

    public function estResponsableDe(){
            $sql = $this->queries['estResponsableDe'];
            $request = $this->executeQuery($sql, [':idProjet' => $_GET['idProjet'], ':login' => $_SESSION['login']]);
            return $request->fetchColumn();
    }

    public function creerDepot(){
        $sql = $this->queries['CreerRendu'];
        $this->executeQuery($sql, [':nomRendu' => $_POST['nomDepot'], ':date' => $_POST['dateDepot']]);
        $sql2 = $this->queries['AssocierRenduProjet'];
        $this->executeQuery($sql2, ['idProjet' => $_GET['idProjet'], 'idRendu' =>self::$bdd->lastInsertId()]);
    }

    public function deleteIntervenant(){
        var_dump($_POST);
        $sql = $this->queries['deleteIntervenant'];
        $this->executeQuery($sql, [':idUtilisateur' => $_POST['idUtilisateur'], ':idProjet' => $_GET['idProjet']]);
        header("location: index.php?module=DETAILS&idProjet=". $_GET['idProjet']);
    }

    public function getIntervenantPris(){
        $sql = $this->queries['getIntervenantPris'];
        $request = $this->executeQuery($sql, [':idProjet' => $_GET['idProjet']]);
        return $request->fetchAll(PDO::FETCH_ASSOC);
    }

    private function getGroupeProjet(){
        $sql = $this->queries['getGroupeProjet'];
        $request = $this->executeQuery($sql, [':idProjet' => $_GET['idProjet']]);
        return $request->fetchAll(PDO::FETCH_ASSOC);
    }

    public function groupeAndEtudiant(){

        $groupeAndEtudiant = [];

        $groupeProjet = $this->getGroupeProjet();
        foreach($groupeProjet as $groupe) {
            $listeEtudiant = [];
            $sql = $this->queries['getMembreGroupe'];
            $request = $this->executeQuery($sql, [':idGroupe' => $groupe['idGroupe']]);
            $etudiantsGroupe = $request->fetchAll(PDO::FETCH_ASSOC);
            
            foreach ($etudiantsGroupe as $etudiant) {
                $listeEtudiant[] = $etudiant['login'];
            }
            $groupeEtEtudiant[$groupe['idGroupe']] = $listeEtudiant;
        }

        var_dump($groupeAndEtudiant);
        return $groupeAndEtudiant;
    }

    public function deleteGroupe(){
        var_dump($_POST);
        $sql = $this->queries['deleteGroupe'];
        $this->executeQuery($sql, [':idGroupe' => $_POST['idGroupe'], ':idProjet' => $_GET['idProjet']]);
        header("location: index.php?module=DETAILS&idProjet=". $_GET['idProjet']);
    }

    public function deleteUserGroupe(){
        var_dump($_POST);
        //$sql = $this->queries['deleteIntervenant'];
        //$this->executeQuery($sql, [':idUtilisateur' => $_POST['idUtilisateur'], ':idProjet' => $_GET['idProjet']]);
        header("location: index.php?module=DETAILS&idProjet=". $_GET['idProjet']);

    }

}