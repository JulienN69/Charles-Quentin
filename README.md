# Charles_Cantin

Évaluation front-end - Graduate développeur web fullstack - Julien Nesme

Projet fictif de site vitrine pour un certain Charles Cantin. Cette application expose les travaux et services du photographe, ainsi qu'un back office pour lui permettre de gérer et administrer son site.

<h3>PRÉREQUIS :</h3>

- Un serveur Web (Apache... etc)
- PHP 8.0 ou supérieur
- MySQL 8.0 ou supérieur
- Avoir une base de données MySQL prête et fonctionnelle.

<h3>EXÉCUTION EN LOCAL :</h3>

Faites un git clone de ce projet, ou téléchargez le zip.
Installez le gestionnaire de dépendance composer si ce n'est pas déjà fait (dans le projet, ou de manière global). Puis dans votre terminal entrez la commande : composer install

<h3>CRÉATION DE LA BASE ET DES TABLES :</h3>

- Connectez-vous à un gestionnaire de base de données de votre choix(HeidiSQL, PhpMyAdmin...).
- Modifiez les paramètres de l'accès à votre base de données dans le fichier config.php que vous trouverez à la racine du projet.
- Effectuez toutes les différentes requêtes que vous trouverez dans le fichier requetes.sql à la racine du projet :<br>
  Les requêtes inclues un jeu de données pour les différentes tables.

<h3>CREATION DE L'ADMIN :</h3>

La dernière requête du fichier requetes.sql correspond à la création de l'utilisateur Charles Cantin :<br>
INSERT INTO user (email, password)
VALUES ("charles_cantin@gmail.com", '$2y$10$0vuo.Ktmpc1A9b1Ejf4JRu74OFqqrgVW6JB/5H3vTbWx69xHk8I9G');

<h3>CONNEXION DE L'ADMIN :</h3>

Lancez l'application en utilisant un logiciel comme Xamp ou avec le serveur dédié de PHP à l'aide de la commande "php -S localhost:3306 -t /chemin/vers/application"<br>
Depuis la page d'accueil du site, ajoutez /login dans la barre d'adresse du navigateur. Cela vous permettra d'accéder au formulaire de connexion pour Charles Cantin.<br>
identifiant : charles_cantin@gmail.com<br>
mot de passe : photographe<br>
<br>
Vous pouvez ensuite accéder à l'interface de l'administration en ajoutant /admin dans la barre d'adresse du navigateur, depuis la page d'accueil.

<h3>SECURITE :</h3>

Les identifiants et mot de passe ici présent sont à des fins de démonstration. Dans un environnement de production il faudra les mettre à jour.<br>
