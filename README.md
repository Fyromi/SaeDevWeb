# ProjetDevWeb

## Configuration

### Prérequis

- **XAMPP** (Version 8.2.12 / PHP 8.2.12)
- **Apache Server** et **MySQL Server**

### Étapes d'installation

1. **Placement du projet** :
   - Clonez le dépôt [SaeDevWeb](https://github.com/Fyromi/SaeDevWeb) dans le répertoire suivant :
     ```
     C://xampp/htdocs
     ```

2. **Démarrage des serveurs depuis Xamp** :
   - Démarrez le serveur Apache (start).
   - Démarrez le serveur MySQL (start).

3. **Intégration de la base de données** :
   - Ouvrez [phpMyAdmin](http://localhost/phpmyadmin/index.php?route=/server/sql).
   - Importez le fichier `scriptSae.sql` en copiant son contenu dans l'onglet SQL.

4. **Configuration optionnelle** :
   - Si vous avez configuré un compte MySQL avec un mot de passe/login, modifiez la ligne 8 du fichier `connexion.php` :
     ```php
     'root' -> 'votreLogin'
     '' -> 'votreMotDePasse'
     ```
   - Sinon, laissez les valeurs par défaut.

5. **Lancement du projet** :
   - Accédez au site via votre navigateur :
     ```
     http://localhost/SaeDevWeb/index.php
     ```

---

## Description du projet

Ce projet a pour objectif de développer un site web permettant une gestion efficace des projets universitaires et un suivi optimisé pour les enseignants et les étudiants. Le site propose :

- Une centralisation des ressources mises en ligne par les enseignants.
- Un accès rapide aux rendus attendus et envoyés.
- Un accès simplifié aux évaluations associées.

### Fonctionnalités principales

#### Enseignants
- Création de projets pour une année universitaire et un semestre, avec assignation en tant que responsable.
- Nomination d'autres enseignants comme co-responsables ou intervenants pour un projet.
- Ajout et édition des champs de description de projet (ex : description générale, liens Trello, dépôt Git, etc.).
- Gestion des groupes d'étudiants :
  - Création et modification des groupes.
  - Définition des coefficients pour les évaluations.
  - Choix de la personnalisation des noms et images des groupes.
- Création et gestion des rendus, évaluations et soutenances :
  - Définition des rendus (groupes ou individuels).
  - Association des évaluations aux rendus ou soutenances.
- Création de ressources (liens vidéo, cours en PDF, codes sources, etc.).
- Mise en avant des ressources importantes.
- Délégation des évaluations à d'autres intervenants.
- Saisie des évaluations.

#### Étudiants
- Visualisation des projets auxquels ils sont inscrits.
- Consultation des ressources associées à leurs projets.
