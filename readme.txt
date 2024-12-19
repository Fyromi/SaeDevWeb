Ce projet vise à développer un site web pour aider à la gestion des SAE et à un meilleur
suivi, à la fois pour les enseignants et les étudiants, des rendus et des évaluations. Le site
web devra donc proposer, pour chaque projet de SAE :
 

de centraliser les ressources mises en ligne par les enseignants un accès rapide aux différents rendus attendus et envoyés un accès aux évaluations


Existant :
L'équipe enseignante se sert majoritairement de moodle et de discord pour regrouper les
ressources et rendus, ainsi que pour communiquer avec les étudiants en dehors des heures de présence.


Besoins :
Un enseignant doit pouvoir créer un projet pour une année universitaire et un semestre. Il en devient alors le responsable.
Le responsable d'un projet doit pouvoir nommer d'autres enseignants co-responsables et
intervenants dans ce projet.
Les responsables d'un projet peuvent remplir des champs et définir des champs à remplir
par les groupes. Ces champs apparaitront dans la description du projet. Il peut s'agir de la
description générale du projet, ou de liens comme trello ou le dépôt git. Ces champs
peuvent être soit remplis par les responsables, soit par les étudiants.


Les responsables d'un projet peuvent créer des groupes d'étudiants sur ce projet, en
modifier le titre ainsi que déterminer les coefficients attribués à chaque évaluation.
Les responsables d'un projet peuvent définir si le nom d'un groupe et l'image titre d'un
groupe peuvent être modifiées par le groupe.*


Les intervenants et les responsables d'un projet peuvent définir des rendus, et des
évaluations associées à ces rendus. Les évaluations peuvent être liées au groupe ou
individuelles. Ils peuvent également définir des soutenances et des évaluations associées à ces soutenances.
Les intervenants peuvent créer des ressources : liens vidéo, cours en pdf, codes source...
Les responsables d'un projet peuvent choisir de mettre en avant une ressource. Les intervenants ou responsables peuvent déléguer une évaluation à un autre intervenant.
Les intervenants ou responsables d'un projet peuvent saisir les évaluations dont ils ont la
charge.


Les étudiants peuvent voir les groupes de projet sur lesquels ils sont inscrits.
Les étudiants peuvent voir les ressources associées aux projets sur lesquels ils sont inscrits.


Contraintes :
Le projet doit être réalisé en PHP + MySQL, sans utilisation de frameworks de
développement qui gèrent le MVC / la sécurité (ex : Symfony)
Le projet doit être responsive (utilisation de frameworks recommandée, ex : Bootstrap, Zurb, Bulma)


Des fonctionnalités codées en javascript côté client, voire en Ajax peuvent être développées afin de faciliter l'ergonomie.