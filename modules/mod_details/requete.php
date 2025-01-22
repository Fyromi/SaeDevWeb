<?php
return [ 'getetudiantsansgrp' => "select distinct u.*
                                    from utilisateur u
                                    where u.role = 'etudiant'
                                    and u.idutilisateur not in (
                                        select aa.idutilisateur
                                        from appartienta aa
                                        join groupeetudiant ge on aa.idgroupe = ge.idgroupe
                                        join associeaprojet ap on ge.idgroupe = ap.idgroupe
                                        where ap.idprojet = :idprojet
                                    );", 


        'getprojet'     =>          'select distinct *
                                    from projet
                                    where idprojet = :id',


        'addgroupe' =>                  "insert into `groupeetudiant`(`nomgroupe`, `imagetitre`)
                                         values (:nomgroupe,null);",

        "associeprojet" =>           "insert into `associeaprojet`(`idgroupe`, `idprojet`)
                                        values (:idgrp,:idprojet)",

        'addetudiantgrp'    =>      "insert into appartienta (idutilisateur, idgroupe)
                                    values (:idetudiant, :idgroupe);", 

        'getintervenantlibre'   => "select u.*
                                    from utilisateur u
                                    where u.role in ('responsable', 'intervenant')
                                    and u.idutilisateur not in (
                                        select idutilisateur
                                        from intervientdans
                                        where idprojet = :idprojet
                                    )
                                    and u.idutilisateur not in (
                                        select idutilisateur
                                        from estresponsablede
                                        where idprojet = :idprojet
                                    );",

        'addintervenantprojet' => "insert into intervientdans (idutilisateur, idprojet)
                                    values (:idintervenant, :idprojet);",
        
        'insertlinkbdd'            => "insert into `ressource`(`nomressource`, `lienressource`) values (:nom, :lien);",

        'projetressource'       => "insert into `projetressource`(`idprojet`, `idressource`) values (:idprojet, :idressource);",

        'estresponsablede'      => "select count(*) > 0 as estresponsable
                                    from estresponsablede 
                                    where idprojet = :idprojet
                                    and idutilisateur = (select idutilisateur from utilisateur where login = :login);",

        'creerrendu'            => "insert into `rendu`(`nomrendu`, `date_limite`) values (:nomrendu,:date);",

        'associerrenduprojet'   => "insert into `renduprojet`(`idprojet`, `idrendu`) values (:idprojet,:idrendu);",

        'deleteintervenant'     => "delete from intervientdans
                                    where idutilisateur = :idutilisateur and idprojet = :idprojet;",

        'getintervenantpris'    =>   "select  utilisateur.*
                                        from utilisateur
                                        join intervientdans on utilisateur.idutilisateur = intervientdans.idutilisateur
                                        where intervientdans.idprojet = :idprojet;", 
          
          'getgroupeprojet'   =>      "select groupeetudiant.*
                                        from projet
                                        inner join associeaprojet on projet.idprojet = associeaprojet.idprojet
                                        inner join groupeetudiant on associeaprojet.idgroupe = groupeetudiant.idgroupe
                                        where associeaprojet.idprojet = :idprojet;",

            'getmembregroupe'   =>      "select utilisateur.*
                                        from utilisateur
                                        join appartienta  on utilisateur.idutilisateur = appartienta.idutilisateur
                                        where appartienta.idgroupe =:idgroupe;",

            'deletegroupe'     => "delete groupeetudiant, associeaprojet, appartienta
                                    from groupeetudiant
                                    left join associeaprojet on groupeetudiant.idgroupe = associeaprojet.idgroupe
                                    left join appartienta on groupeetudiant.idgroupe = appartienta.idgroupe
                                    where groupeetudiant.idgroupe = :idgroupe and associeaprojet.idprojet = :idprojet;",

            'deleteusergroupe'  => "delete from appartienta
                                    where idutilisateur = :idutilisateur
                                    and idgroupe = :idgroupe;", 

            'getidutilisateur'  =>  "select idutilisateur
                                    from utilisateur
                                    where utilisateur.login = :logi",


            'supprimerprojet' => [ 'ressourcemiseenavant' => "delete from ressourcemiseenavant 
                                                                where idressource in (  select idressource 
                                                                                        from projetressource 
                                                                                        where idprojet = :idprojet 
                                                                                    )",

                                    'deleteressourceprojet' => " delete r
                                                                from ressource r
                                                                inner join projetressource pr on pr.idressource = r.idressource
                                                                where pr.idprojet = :idprojet;" ,

                                     'deleteressourceenavant' => "delete r
                                                                from ressourcemiseenavant r
                                                                inner join projetressource pr on pr.idressource = r.idressource
                                                                where pr.idprojet = :idprojet;",

                                    'deleteprojetressource' => "delete from projetressource 
                                                                where idprojet = :idprojet;",

                                    'deleteressourcemiseenavant' => "delete from ressourcemiseenavant 
                                                                    where idprojet = :idprojet;",
                                    
                                    'deletechamp'           => "delete from champ
                                                                where idchamp in ( select idchamp
                                                                                    from possedechamps
                                                                                    where idprojet = :idprojet
                                                                                )",

                                    'deletepossedechamps' => "delete from possedechamps 
                                                            where idprojet = :idprojet;",

                                    'deleteevalindividuelle' => "delete from evalindividuelle 
                                                                    where ideval in ( select ideval 
                                                                                        from evaluation  
                                                                                        where evaluation.ideval in ( select ideval
                                                                                                                    from evalgroupe
                                                                                                                    where evalgroupe.idgroupe in (  select idgroupe
                                                                                                                                                    from groupeetudiant
                                                                                                                                                    where groupeetudiant.idgroupe in ( select idgroupe
                                                                                                                                                                                    from associeaprojet
                                                                                                                                                                                    where idprojet = :idprojet
                                                                                                                                                                                    )
                                                                                                                                                )
                                                                                                                    )
                                                                                    )",

                                    'evalgroupe' => "delete from evalgroupe 
                                                    where ideval in ( select ideval 
                                                                    from evaluation  
                                                                    where evaluation.ideval in (select ideval
                                                                                                from evalgroupe
                                                                                                where evalgroupe.idgroupe in (  select idgroupe
                                                                                                                                from groupeetudiant
                                                                                                                                where groupeetudiant.idgroupe in ( select idgroupe
                                                                                                                                                                from associeaprojet
                                                                                                                                                                where idprojet = :idprojet
                                                                                                                                                                )
                                                                                                                            )
                                                                                                )
                                                                    )",

                                    'deleteevaluation' => "delete from evaluation 
                                                        where evaluation.ideval in ( select ideval
                                                                                    from evalgroupe
                                                                                    where evalgroupe.idgroupe in (  select idgroupe
                                                                                                                    from groupeetudiant
                                                                                                                    where groupeetudiant.idgroupe in ( select idgroupe
                                                                                                                                                        from associeaprojet
                                                                                                                                                        where idprojet = :idprojet
                                                                                                                                                    )
                                                                                                                )
                                                                                    )",
                                                                

                                    'deletesoutenance'      => "delete from soutenance
                                                                where idsoutenance in (select idsoutenance
                                                                                        from soutenancerendu
                                                                                        where soutenancerendu.idrendu in (  select idrendu
                                                                                                                            from rendu
                                                                                                                            where rendu.idrendu in ( select idrendu
                                                                                                                                                    from renduprojet
                                                                                                                                                    where idprojet = :idprojet
                                                                                                                                                    )
                                                                                                                        )
                                                                                        )",

                                    'deletesoutenancerendu' => "delete from soutenancerendu 
                                                                where idrendu in ( select idrendu 
                                                                                    from rendu 
                                                                                    where rendu.idrendu in ( select idrendu
                                                                                                            from renduprojet
                                                                                                            where idprojet = :idprojet
                                                                                                        )
                                                                                )",

                                    'deleterendu' => "delete from rendu 
                                                        where rendu.idrendu in ( select idrendu
                                                                                    from renduprojet
                                                                                    where idprojet = :idprojet
                                                                                )",

                                    'deleteappartienta' => "delete from appartienta 
                                                            where idgroupe in ( 
                                                                            select idgroupe 
                                                                            from groupeetudiant 
                                                                            where idgroupe in ( 
                                                                                                select idgroupe 
                                                                                                from associeaprojet 
                                                                                                where idprojet = :idprojet 
                                                                                            ) 
                                                                            )",

                                    'deletegroupeetudiant' => "delete from groupeetudiant 
                                                                where idgroupe in ( select idgroupe 
                                                                                    from associeaprojet 
                                                                                    where idprojet = :idprojet 
                                                                                )",

                                    'deleteassocieaprojet'  => "delete from associeaprojet
                                                                where idprojet=:idprojet",

                                    'deleteintervientdans' => "delete from intervientdans 
                                                                where idprojet = :idprojet",

                                    'deleteestresponsablede' => "delete from estresponsablede 
                                                                where idprojet = :idprojet;",

                                    'deleteprojet' => "delete from projet 
                                                        where idprojet = :idprojet"
                                ]                                    
                                                                                                
        ];

?>