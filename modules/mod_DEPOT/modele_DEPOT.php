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

    public function getNomDepot(){
        $sql = $this->queries['getDepots'];
        return $this->executeQuery($sql, [':idDepot' => $_GET['idDepot']])->fetchColumn();
    }   

    public function ajoutDepot(){
        // Définir le chemin du répertoire
        $repertoire = dirname(__DIR__, 2)."/Projet/Projet" . $_GET['idProjet'] . "/depot/depot".$_GET['idDepot']."/groupe".$this->getIdGroupe()."/etudiant".$this->getIdUtilisateur();
        
        // Parcourir chaque segment du chemin et vérifier s'il existe
        $cheminPartiels = explode('/', $repertoire);
        $cheminTemporaire = '';
        
        foreach ($cheminPartiels as $part) {
            $cheminTemporaire .= $part . '/';
            // Si le répertoire n'existe pas, créer ce segment spécifique
            if (!is_dir($cheminTemporaire)) {
                mkdir($cheminTemporaire, 0777);
            }
        }
        
        // Autres traitements
        $nom = $this->getNomDepot();
        $fichierTmp = $_FILES['fichier']['tmp_name'];
        $nomFichierAvecEspace = basename($_FILES['fichier']['name']);
        $nomFichierSansEspace = preg_replace('/\s+/', '+', $nomFichierAvecEspace);
        $cheminFinal = $repertoire . "/" . $nomFichierSansEspace;
    
        move_uploaded_file($fichierTmp, $cheminFinal);
        $this->insertLinkToBdd($nom, $cheminFinal, $_GET['idProjet']);
        ?>
            <div class="alert alert-success d-flex align-items-center" role="alert">
                <div>
                    Dépôt effectué !
                </div>
            </div>
        <?php
    }
    

    private function insertLinkToBdd($nom, $lien){
        $sql = $this->queries['insertLinkBdd'];
        $this->executeQuery($sql, [':nom' => $nom, ':lien' => $lien]);
        $sq2 = $this->queries['projetRessource'];
        $this->executeQuery($sq2, [':idProjet' => $_GET['idProjet'], ':idRessource' => self::$bdd->lastInsertId()]);
    }

    public function getIdGroupe(){
        $sql = $this->queries['getIdGrp'];
        return $this->executeQuery($sql, [':idProjet' => $_GET['idProjet'], ':login'=>$_SESSION['login']])->fetchColumn();
    }

    public function getIdUtilisateur(){
        $sql = $this->queries['getIdUtilisateur'];
        return $this->executeQuery($sql, [':login' => $_SESSION['login']])->fetchColumn();
    }


}