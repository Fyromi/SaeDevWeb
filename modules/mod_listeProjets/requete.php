<?php
return [
    'getList' => 'SELECT DISTINCT projet.idProjet, projet.titre, projet.description, projet.anneeUniversitaire, projet.semestre
                  FROM utilisateur
                  JOIN appartientA ON utilisateur.idUtilisateur = appartientA.idUtilisateur
                  JOIN associeAProjet ON appartientA.idGroupe = associeAProjet.idGroupe
                  JOIN projet ON associeAProjet.idProjet = projet.idProjet
                  WHERE utilisateur.idUtilisateur = :utilisateur',

    'getProjet' => 'SELECT DISTINCT *
                    FROM projet
                    WHERE idProjet = :id',

    'getIDUtilisateur' => 'SELECT idUtilisateur
                           FROM utilisateur
                           WHERE utilisateur.login = :logi',

    'getProfProjet' => "SELECT DISTINCT utilisateur.*
                        FROM utilisateur
                        LEFT JOIN estResponsableDe 
                            ON utilisateur.idUtilisateur = estResponsableDe.idUtilisateur 
                            AND estResponsableDe.idProjet = :idProjet
                        LEFT JOIN intervientDans 
                            ON utilisateur.idUtilisateur = intervientDans.idUtilisateur 
                            AND intervientDans.idProjet = :idProjet
                        WHERE (estResponsableDe.idUtilisateur IS NOT NULL AND utilisateur.role = 'responsable')
                        OR (estResponsableDe.idUtilisateur IS NULL AND intervientDans.idUtilisateur IS NOT NULL 
                            AND (utilisateur.role = 'intervenant' OR utilisateur.role = 'responsable'))",

    'getGrpEtudiant' => "SELECT *
                        FROM utilisateur
                        JOIN appartientA ON utilisateur.idUtilisateur = appartientA.idUtilisateur
                        WHERE appartientA.idGroupe = (
                            SELECT appartientA.idGroupe
                            FROM associeAProjet
                            JOIN appartientA ON associeAProjet.idGroupe = appartientA.idGroupe
                            WHERE appartientA.idUtilisateur = :idUtilisateur
                            AND associeAProjet.idProjet = :idProjet
                            LIMIT 1)
                        AND utilisateur.idUtilisateur != :idUtilisateur;",

    'getNomGrp' => "SELECT groupeetudiant.nomGroupe 
                    FROM utilisateur, appartienta, groupeetudiant, associeaprojet, projet
                    WHERE utilisateur.idUtilisateur = appartienta.idUtilisateur
                    AND appartienta.idGroupe = groupeetudiant.idGroupe  
                    AND groupeetudiant.idGroupe = associeaprojet.idGroupe
                    AND associeaprojet.idProjet = projet.idProjet
                    AND utilisateur.idUtilisateur = :idUtilisateur
                    AND projet.idProjet = :idProjet;",

    'getProfilPicture' => "SELECT profilpicture
                            FROM  utilisateur
                            WHERE idUtilisateur = :idUtilisateur;"
];

?>