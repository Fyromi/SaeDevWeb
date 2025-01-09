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

    'getProfProjet' => "SELECT *
                        FROM utilisateur
                        JOIN estResponsableDe ON utilisateur.idUtilisateur = estResponsableDe.idUtilisateur
                        WHERE estResponsableDe.idProjet = :idProjet AND utilisateur.role = 'responsable'
                        UNION
                        SELECT *
                        FROM utilisateur
                        JOIN intervientDans ON utilisateur.idUtilisateur = intervientDans.idUtilisateur
                        WHERE intervientDans.idProjet = :idProjet AND utilisateur.role = 'intervenant'",

    'getGrpEtudiant' => "SELECT utilisateur.login
                        FROM utilisateur
                        JOIN appartientA ON utilisateur.idUtilisateur = appartientA.idUtilisateur
                        WHERE appartientA.idGroupe = (
                            SELECT appartientA.idGroupe
                            FROM associeAProjet
                            JOIN appartientA ON associeAProjet.idGroupe = appartientA.idGroupe
                            WHERE appartientA.idUtilisateur = :idUtilisateur
                            AND associeAProjet.idProjet = :idProjet
                            LIMIT 1
                        )
                        AND utilisateur.idUtilisateur != :idUtilisateur;
                        "
    
];
?>