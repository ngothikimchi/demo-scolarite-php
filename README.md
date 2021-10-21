# test-alternance

Database creation : https://github.com/ngothikimchi/test-alternance/blob/main/bdd/scolaire.sql

Fake data generation : https://github.com/ngothikimchi/test-alternance/blob/main/bdd/fake-data.sql

Demo : https://test-alternance.azurewebsites.net/

# PHP - MVC

##  Introduction

Le modèle MVC contient 3 éléments:
- Model (modèle) : contient les données à afficher. Dans notre projet PHP, c'est la couche quoi touche directement à donnée et manipuler avec les données. C'est la classe "Modele" qui fait ce travail
- View (vue) : contient la présentation de l'interface de l'application. Dans notre projet PHP, ce sont les fichiers PHP qui sert à rendu le HTML à partir les données récupérer par controlleur & modèle
- Controller (contrôlleur): contient tout les logiques de l'application, surtout vient de les actions de l'utilisateur. Ex : récupérer données, éditer, afficher, supprimer, ....  Dans notre projet PHP, c'est la classe "Controleur" qui a des différent méthods pour récupérer les données à partir du modèle.

## Structure du projet
### BDD
[https://github.com/ngothikimchi/test-alternance/blob/main/bdd/scolaire.sql](https://github.com/ngothikimchi/test-alternance/blob/main/bdd/scolaire.sql)
#### 8 tables :
- matiere
- etablissement
- user
- directeur
- professeur
- classe
- etudiant
- occuper
#### 3 vues :
- ViewInfoEta : Informations des établissement (nom, info de directeur, adresse,...)
- ViewListProf : Table des informations des profs (nom, prenom, diplome, classe,...)
- ViewListEtudiant : Table des informations des étudiants (id, nom, prenom, date de naissance)
#### Fake data
Les données fictives sont générées avec l'aide de : [Random Lists — The random generator of everything](https://www.randomlists.com/)

### Projet PHP
#### Config
- /controleur/config_db.php : information d'identification de la BDD
- /controleur/config_env.php : setter une variable globale de l'appli $idEtab = 1. On va utiliser cet id comme l'id de l'établissement par défaut pour l'application, cars on support multi établissements dans notre base de données.
#### Index.php
Cette page est la page principale ou home page de l'application. Elle prendre les fichiers *controleur/controleur.class.php*, *controleur/config_db.php* & *controleur/config_env.php* comme références, puis instancier un nouveau objet "$unControleur" avec les infos dans */controleur/config_env.php*.

La page est le conteneur pour les vues (étudiant, professeur & classe), donc la partie en commun est les infos de l'établissement sont toujours afficher en haut de la page. 

Nous définisson les CSS/JS ou FontAwesome dans le head de la page.

Selon le param "page" dans le query string du URL, nous allons afficher au milieu de la page la vue correspondant.

#### Modèle : /modele/modele.class.php - Classe "Modele"
- Attribute privée *$pdo* : objet qui représent la connexion vers la BDD
- Attribute privée *$uneTable* : chaine de caractère du nom de la table ou de la vue
- Construteur *__construct ($serveur, $bdd, $user, $mdp)* : initialiser la connexion vers la base de données
- Méthode *selectAll ($chaine, $filtre = "")* : effectuer un select sur la table  $uneTable. Puis retourner un tableau du résutat de la requête SQL. 
	- *$chaine* est la chaine de caractère représent la liste de collonne qu'on veut utiliser dans SELECT. Par ex : "*",  "id_matiere, nom_matiere", ....
	- *$filtre* est la chaine de caractère représent la condition qu'on veut utiliser dans  WHERE. Par ex: "id_etab = 1", "code_classe = "bts" "
- Méthode *count($filtre = "")* : cette méthode fait presque le même travail que *selectAll*, sauf que elle retourne le nombre de résultat de la requête

#### Controlleur: /controleur/controleur.class.php - Classe "Controleur" 
- Attribute privée *$unModele* : objet de la classe Modele
- Construteur *__construct ($serveur, $bdd, $user, $mdp)* : initialiser la connexion vers la base de données
- Méthode *selectAll ($chaine, $filtre = "")* : effectuer un select sur la table  $uneTable. Puis retourner un tableau du résutat de la requête SQL. 
	- *$chaine* est la chaine de caractère représent la liste de collonne qu'on veut utiliser dans SELECT. Par ex : "*",  "id_matiere, nom_matiere", ....
	- *$filtre* est la chaine de caractère représent la condition qu'on veut utiliser dans  WHERE. Par ex: "id_etab = 1", "code_classe = "bts" "
- Méthode *count($filtre = "")* : cette méthode fait presque le même travail que *selectAll*, sauf que elle retourne le nombre de résultat de la requête

**Attention :** Actuellement, dans la classe *Controleur*, on a presque les mêmes méthodes que *Modele*. Mais le but ici est que on met tous les traitements avec donées dans *Modele*, et les logiques de l'appli dans *Controleur*. Par ex, dans l'avenir on a un besoin d'exporter la liste des étudiants sous format Excel, ou CSV, cette logique devrait être écrit dans *Controleur*.

#### Vues
##### gestion_classes.php  & /vue/vue_select_all_classes.php/
- *gestion_classes.php* : ici on set le nom de la table est setté à "classe" pour l'object $unControleur, puis stocker la liste des classes dans un tableau "$lesClasses". Ce tableau sert à construitre la table HTML dans */vue/vue_select_all_classes.php/*

##### gestion_etudiants.php & /vue/vue_select_all_etudiants.php/
- *gestion_classes.php*  ici on set le nom de la table est setté à "ViewListEtudiant" pour l'object $unControleur, puis stocker la liste des classes dans un tableau "$lesEtudiants". Ce tableau sert à construitre la table HTML dans */vue/vue_select_all_classes.php/*
- **Attention**: si le param "code_classe" est fourni dans l'URL, on va récupérer les infos de la classe puis stocker dans un tableau *$infoClasse*. Ensuite, le filtre quand on appelle la méthode *selectAll* & *count* va prendre en compte le "code_classe"
##### gestion_professeurs.php /vue/vue_select_all_professeurs.php/
Idem comme *gestion_etudiants.php & /vue/vue_select_all_etudiants.php/*
