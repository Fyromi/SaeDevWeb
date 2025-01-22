<?php
return [ 'getProjetResponsable' =>  "select projet.*
                                    from projet
                                    join estresponsablede on projet.idprojet = estresponsablede.idprojet
                                    join utilisateur on estresponsablede.idutilisateur = utilisateur.idutilisateur
                                    where utilisateur.login = :login;", 

        'getInterventionProjet' =>  "select projet.*
                                    from projet
                                    join intervientdans on projet.idprojet = intervientdans.idprojet
                                    join utilisateur on intervientdans.idutilisateur = utilisateur.idutilisateur
                                    where utilisateur.login = :login;"           
];

?>