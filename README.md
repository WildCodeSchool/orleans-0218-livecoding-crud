# Feuille de Route LiveCoding

## Mise en place BDD
- créer database Blog
- créer table Article
- créer des articles en dur

## Récupération des résultats
- créer index.php et un squelette bootstrap
- création du connect.php et PDO connexion
- requete pour récupérer les articles (PDO->query(), fetchAll())
- mise en page des articles (htmlentities)

## Afficher un seul article (R)
- créer le lien show.php?id=
- créer la page show.php
- requete préparée fetch()
- mise en forme

## Ajout d'un article (C)
- créer page add.php
- formulaire d'ajout bootstrap
- gérer $cleanPost (trim, htmlentities)
- gérer messages d'erreur
- requete insertion (requête préparée)
- redirection index.php // header('Location: index.php'); exit();

## Suppression d'un résultat (D)
- gestion du delete en **POST**

## Mise à jour (U)
- créer update.php
- créer un form d'update
- préremplir le form avec les données 
- gestion des erreurs


## Refacto : 
- form dans fichier séparé inclus
- messages de notification
- fonction pour la gestion des erreurs
- fonction pour nettoyer le POST
- ...