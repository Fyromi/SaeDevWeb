<?php
return [      
        'getDepots'         =>      "SELECT rendu.nomRendu
                                    FROM rendu 
                                    WHERE rendu.idRendu = :idDepot" ,
                        
        'insertLinkBdd'     =>      "INSERT INTO `ressource`(`nomRessource`, `lienRessource`, `type`) VALUES (:nom, :lien, 'depots')",
                                                                                                
        'projetRessource'   =>      "INSERT INTO `projetressource`(`idProjet`, `idRessource`) VALUES (:idProjet, :idRessource);",

            'getIdGrp'      =>      "SELECT groupeetudiant.idGroupe 
                                    FROM utilisateur, appartienta, groupeetudiant, associeaprojet, projet
                                    WHERE utilisateur.idUtilisateur = appartienta.idUtilisateur
                                    AND appartienta.idGroupe = groupeetudiant.idGroupe  
                                    AND groupeetudiant.idGroupe = associeaprojet.idGroupe
                                    AND associeaprojet.idProjet = projet.idProjet
                                    AND utilisateur.login = :login
                                    AND projet.idProjet = :idProjet",

        'getIdUtilisateur'  =>  "SELECT idUtilisateur
                                FROM utilisateur
                                WHERE utilisateur.login = :login"
];

?>