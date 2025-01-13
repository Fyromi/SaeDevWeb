<?php
return [ 'getRessources'   => "SELECT *
                            FROM ressource
                            INNER JOIN projetressource ON projetressource.idRessource = ressource.idRessource
                            WHERE projetressource.idProjet = :idProjet; ",

        'getDepots' => "SELECT * 
                            FROM rendu 
                            INNER JOIN renduProjet ON rendu.idRendu = renduProjet.idRendu 
                            WHERE renduProjet.idProjet = :idProjet"
];

?>