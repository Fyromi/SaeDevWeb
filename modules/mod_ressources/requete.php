<?php
return [ 'getRessources'   => "SELECT ressource.nomRessource
                            FROM projetRessource
                            JOIN ressource ON projetRessource.idRessource = ressource.idRessource
                            WHERE projetRessource.idProjet = :idProjet;"
];

?>