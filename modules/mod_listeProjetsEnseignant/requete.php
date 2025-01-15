<?php
return [ 'getProjetResponsable' =>  "SELECT projet.*
                                    FROM projet
                                    JOIN estResponsableDe ON projet.idProjet = estResponsableDe.idProjet
                                    JOIN utilisateur ON estResponsableDe.idUtilisateur = utilisateur.idUtilisateur
                                    WHERE utilisateur.login = :login;", 

        'getInterventionProjet' =>  "SELECT projet.titre
                                    FROM projet
                                    JOIN intervientDans ON projet.idProjet = intervientDans.idProjet
                                    JOIN utilisateur ON intervientDans.idUtilisateur = utilisateur.idUtilisateur
                                    WHERE utilisateur.login = :login;"
                                
];

?>