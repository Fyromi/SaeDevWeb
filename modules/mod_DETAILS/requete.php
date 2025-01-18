<?php
return [ 'getEtudiantSansGrp' => "SELECT DISTINCT u.*
                                    FROM utilisateur u
                                    WHERE u.role = 'etudiant'
                                    AND u.idUtilisateur NOT IN (
                                        SELECT aa.idUtilisateur
                                        FROM appartientA aa
                                        JOIN groupeEtudiant ge ON aa.idGroupe = ge.idGroupe
                                        JOIN associeAProjet ap ON ge.idGroupe = ap.idGroupe
                                        WHERE ap.idProjet = :idProjet
                                    );", 


        'getProjet'     =>          'SELECT DISTINCT *
                                    FROM projet
                                    WHERE idProjet = :id',


        'addGroupe' =>                  "INSERT INTO `groupeetudiant`(`nomGroupe`, `imageTitre`)
                                         VALUES (:nomGroupe,NULL);",

        "associeProjet" =>           "INSERT INTO `associeaprojet`(`idGroupe`, `idProjet`)
                                        VALUES (:idGrp,:idProjet)",

        'addEtudiantGrp'    =>      "INSERT INTO appartientA (idUtilisateur, idGroupe)
                                    VALUES (:idEtudiant, :idGroupe);", 

        'getIntervenantLibre'   => "SELECT u.*
                                    FROM utilisateur u
                                    WHERE u.role IN ('responsable', 'intervenant')
                                    AND u.idUtilisateur NOT IN (
                                        SELECT idUtilisateur
                                        FROM intervientDans
                                        WHERE idProjet = :idProjet
                                    )
                                    AND u.idUtilisateur NOT IN (
                                        SELECT idUtilisateur
                                        FROM estResponsableDe
                                        WHERE idProjet = :idProjet
                                    );",

        'addIntervenantProjet' => "INSERT INTO intervientDans (idUtilisateur, idProjet)
                                    VALUES (:idIntervenant, :idProjet);",
        
        'insertLinkBdd'            => "INSERT INTO `ressource`(`nomRessource`, `lienRessource`) VALUES (:nom, :lien);",

        'projetRessource'       => "INSERT INTO `projetressource`(`idProjet`, `idRessource`) VALUES (:idProjet, :idRessource);",

        'estResponsableDe'      => "SELECT COUNT(*) > 0 AS estResponsable
                                    FROM estResponsableDe 
                                    WHERE idProjet = :idProjet
                                    AND idUtilisateur = (SELECT idUtilisateur FROM utilisateur WHERE login = :login);",

        'CreerRendu'            => "INSERT INTO `rendu`(`nomRendu`, `date_limite`) VALUES (:nomRendu,:date);",

        'AssocierRenduProjet'   => "INSERT INTO `renduprojet`(`idProjet`, `idRendu`) VALUES (:idProjet,:idRendu);",

        'deleteIntervenant'     => "DELETE FROM intervientDans
                                    WHERE idUtilisateur = :idUtilisateur AND idProjet = :idProjet;",

        'getIntervenantPris'    =>   "SELECT  utilisateur.*
                                        FROM utilisateur
                                        JOIN intervientDans ON utilisateur.idUtilisateur = intervientDans.idUtilisateur
                                        WHERE intervientDans.idProjet = :idProjet;", 
          
          'getGroupeProjet'   =>      "SELECT groupeetudiant.*
                                        FROM projet
                                        INNER JOIN associeaprojet on projet.idProjet = associeAprojet.idProjet
                                        INNER JOIN groupeetudiant on associeAprojet.idGroupe = groupeetudiant.idGroupe
                                        WHERE associeAprojet.idProjet = :idProjet;",

            'getMembreGroupe'   =>      "SELECT utilisateur.*
                                        FROM utilisateur
                                        JOIN appartientA  ON utilisateur.idUtilisateur = appartientA.idUtilisateur
                                        WHERE appartientA.idGroupe =:idGroupe;",

            'deleteGroupe'     => "DELETE groupeEtudiant, associeAProjet, appartientA
                                    FROM groupeEtudiant
                                    LEFT JOIN associeAProjet ON groupeEtudiant.idGroupe = associeAProjet.idGroupe
                                    LEFT JOIN appartientA ON groupeEtudiant.idGroupe = appartientA.idGroupe
                                    WHERE groupeEtudiant.idGroupe = :idGroupe AND associeAProjet.idProjet = :idProjet;",

            'deleteUserGroupe'  => "DELETE FROM appartientA
                                    WHERE idUtilisateur = :idUtilisateur
                                    AND idGroupe = :idGroupe;", 

            'getIdUtilisateur'  =>  "SELECT idUtilisateur
                                    FROM utilisateur
                                    WHERE utilisateur.login = :logi"
                                        
];

?>