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


        'getProjet' =>              'SELECT DISTINCT *
                                    FROM projet
                                    WHERE idProjet = :id',


        'addGroupe' =>                  "INSERT INTO `groupeetudiant`(`nomGroupe`, `imageTitre`)
                                         VALUES (:nomGroupe,NULL);",

        "associeProjet" =>           "INSERT INTO `associeaprojet`(`idGroupe`, `idProjet`)
                                        VALUES (:idGrp,:idProjet)"
];

?>