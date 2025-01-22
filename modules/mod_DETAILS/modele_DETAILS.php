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

        //Liste des étudiants a ajouter dans le groupe
        $listeEtudiant;

        //On ajoute les étudiants a la liste 
        foreach ($_POST as $key => $value) {
            if ($key != 'texte') { //Je vérifie que ce qu'il y a dans _POST n'est pas le nom du groupe 
                
                $listeEtudiant= $value;//J'ajoute chaque id Etudiants a la liste des étudiants dans le groupe
            }
        }

        $idGrp = $this->addGroupe($_GET['idProjet']);
        foreach ($listeEtudiant as $etudiant) {
            $sql = $this->queries['addEtudiantGrp'];
            $this->executeQuery($sql, [':idGroupe' => $idGrp, ':idEtudiant' => $etudiant]);
        }
        header("location: index.php?module=Details&idProjet=". $_GET['idProjet']);

    }

    public function addGroupe(){
        //Creer un groupe dans la bd
        $sql = $this->queries['addGroupe'];
        $this->executeQuery($sql, [':nomGroupe' => $_POST['texte']]);

        $idGrp = self::$bdd->lastInsertId();

        //J'associe le groupe fraichement crée au projet 
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
        header("location: index.php?module=Details&idProjet=". $_GET['idProjet']);
        
        print_r($listeIntervenant);
    }

    public function importFile() {
        
        $repertoire = dirname(__DIR__, 2)."/Projet/Projet" . $_GET['idProjet'] . "/ressource";
        $nom = $_POST['texte'];
        $fichierTmp = $_FILES['fichier']['tmp_name'];
        $nomFichierAvecEspace = basename($_FILES['fichier']['name']);
        $nomFichierSansEspace = preg_replace('/\s+/', '+', $nomFichierAvecEspace);
        $cheminFinal = $repertoire . "/" . $nomFichierSansEspace;
        $cheminForbdd = "Projet/Projet" . $_GET['idProjet'] . "/ressource"."/". $nomFichierSansEspace;
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
        $sql = $this->queries['deleteIntervenant'];
        $this->executeQuery($sql, [':idUtilisateur' => $_POST['idUtilisateur'], ':idProjet' => $_GET['idProjet']]);
        header("location: index.php?module=Details&idProjet=". $_GET['idProjet']);
    }

    public function getIntervenantPris(){
        $sql = $this->queries['getIntervenantPris'];
        $request = $this->executeQuery($sql, [':idProjet' => $_GET['idProjet']]);
        return $request->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getGroupeProjet(){
        $sql = $this->queries['getGroupeProjet'];
        $request = $this->executeQuery($sql, [':idProjet' => $_GET['idProjet']]);
        return $request->fetchAll(PDO::FETCH_ASSOC);
    }

    public function groupeAndEtudiant() {
        $groupeAndEtudiant = [];
    
        $groupeProjet = $this->getGroupeProjet();
        foreach ($groupeProjet as $groupe) {
            // Initialiser $listeEtudiant comme un tableau
            $listeEtudiant = [];
    
            $sql = $this->queries['getMembreGroupe'];
            $request = $this->executeQuery($sql, [':idGroupe' => $groupe['idGroupe']]);
            $etudiantsGroupe = $request->fetchAll(PDO::FETCH_ASSOC);
    
            foreach ($etudiantsGroupe as $etudiant) {
                // Ajouter chaque login dans le tableau
                $etudiant['login'] = $etudiant['login'];
                $etudiant['idUtilisateur'] = $etudiant['idUtilisateur'];
                $listeEtudiant[] = $etudiant;
            }
    
            // Associer le tableau d'étudiants au groupe
            $groupeAndEtudiant[$groupe['idGroupe']] = $listeEtudiant;
        }
        return $groupeAndEtudiant;
    }

    public function deleteGroupe(){
        $sql = $this->queries['deleteGroupe'];
        $this->executeQuery($sql, [':idGroupe' => $_POST['idGroupe'], ':idProjet' => $_GET['idProjet']]);
        header("location: index.php?module=Details&idProjet=". $_GET['idProjet']);
    }

    public function deleteUserGroupe(){
        $sql = $this->queries['deleteUserGroupe'];

        $idUtilisateur = $this->getIDUtilisateur($_POST['login']);

        $this->executeQuery($sql, [':idUtilisateur' => $idUtilisateur, ':idGroupe' => $_POST['idGroupe']]);
        header("location: index.php?module=Details&idProjet=". $_GET['idProjet']);
    }

    private function getIDUtilisateur($login){
        $sql = $this->queries['getIdUtilisateur'];
        $request = $this->executeQuery($sql, [':logi' => $login]);
        return $request->fetchColumn();
    }

    public function deleteProjet() {
        $idProjet = $_GET['idProjet'];
        try {
            connexion::$bdd->beginTransaction();
            foreach ($this->queries['supprimerProjet'] as $key => $value) {
                $sql = $value;
                $this->executeQuery($sql, [':idProjet' => $idProjet]);
            }
            connexion::$bdd->commit();

            $idProjet = $_GET['idProjet'];
            $cheminRepertoire = "Projet/Projet$idProjet";
            $this->supprimerRepertoire($cheminRepertoire);

            header("location: index.php?module=Enseignants&action=menu");
        } catch (Exception $e) {
            connexion::$bdd->rollBack();
            echo "Erreur : " . $e->getMessage();
        }
    }

    public function supprimerRepertoire($repertoire) {

        // recupère les éléments du repertoir dans un tableau
        $fichiers = array_diff(scandir($repertoire), ['.', '..']);
    
        foreach ($fichiers as $fichier) {
            $chemin = $repertoire . DIRECTORY_SEPARATOR . $fichier;
    
            // La je vérifie si c'est un dossier, si oui je recommance
            if (is_dir($chemin)) {
                $this->supprimerRepertoire($chemin);
            } else {
                // Si non supprime le fichier
                unlink($chemin);
            }
        }
    
        // Supprime le répertoire lui-même
        return rmdir($repertoire);
    }

    public function getRessource(){
            $sql = $this->queries['getRessource'];
            $request = $this->executeQuery($sql, [':idProjet' => $_GET['idProjet']]);
            return $request->fetchAll();
        
    }
}