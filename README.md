# test-alternance

Database creation : https://github.com/ngothikimchi/test-alternance/blob/main/bdd/scolaire.sql

Fake data generation : https://github.com/ngothikimchi/test-alternance/blob/main/bdd/fake-data.sql

Des établissements scolaires sont caractérisés par un nom, addresse, numéro de rue, ville. Il sont dirigés par un directeur et ont plusieurs enseignants.
 Un établissement à aussi plusieurs classes identifié par un code et un nom.
 Chaque classes à plusieurs élèves mais aussi plusieurs enseignants qui lui font cours.
 Chaque enseignant enseigne une matière scolaire dont on enregistrera un code et son nom.
 Les élèves, le directeur et les enseignants sont enregistrés via un nom, prenom, adresse, numéro de rue, ville et téléphone. Les enseignants auront aussi un champ diplôme et les élèves un champ date de naissance.

 Résultat attendu :

 Créer le schéma SQL

 Insérer des données fictives en base puis :

 Créer un établissement, afficher ses informations et le directeur.
 Lister ensuite les enseignants qui y travaillent.
 Afficher ensuite les classes et pour chacune d'entre elles, les élèves et les professeurs de la classe
 Afficher aussi le nombre d'élève par classe et le nombre total d'élève pour établissement


