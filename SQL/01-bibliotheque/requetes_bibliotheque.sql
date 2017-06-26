-- ********************************
-- CREATION DE LA BASE DE DONNEES
-- ********************************

-- CREATE DATABASE bibliotheque;

-- USE bibliotheque;

-- ********************************
-- CREATION DE LA BASE DE DONNEES
-- ********************************

-- 1. Afficher l'id_abonne de Laura

SELECT id_abonne FROM abonne WHERE prenom = 'Laura';

-- 2. L'abonne d'id_abonne 2 est venu emprunter un livre à quelles dates (date_sortie) ?

SELECT date_sortie FROM emprunt WHERE id_abonne = 2 ;

-- 3. Combien d'emprunts ont été effectués en tout ?

SELECT COUNT(id_emprunt) FROM emprunt;

-- 4. Combien de livres sont sortis le 2011-12-19 ?

SELECT COUNT(id_emprunt) FROM emprunt WHERE date_sortie = '2011-12-19';

-- 5. "Une Vie" est de quel auteur ? 

SELECT auteur FROM livre WHERE titre = 'Une vie';

-- 6. De combien de livres d'Alexandre Dumas dispose-t-on ? 

SELECT COUNT(id_livre) FROM livre WHERE auteur = 'Alexandre Dumas';

-- 7. Quel id_livre est le plus emprunté ?
SELECT id_livre, date_sortie FROM emprunt;
SELECT id_livre, COUNT(date_sortie) FROM emprunt GROUP BY id_livre;

SELECT id_livre FROM emprunt GROUP BY id_livre ORDER BY COUNT(id_livre) DESC LIMIT 0,1;

-- 8. Quel id_abonne emprunte le plus de livres ?

SELECT id_abonne FROM emprunt GROUP BY id_abonne ORDER BY COUNT(id_abonne) DESC LIMIT 0,1;

-- ********************************
-- REQUETES IMBRIQUEES
-- ********************************

-- Une requete imbriquée permet de réaliser des requêtes sur deux ou plusieurs tables.
-- Afin de réaliser une requête imbriquée, il faut obligatoirement un champ COMMUN entre les deux tables.

-- Un champ null se teste avec IS NULL :
SELECT id_livre FROM emprunt WHERE date_rendu IS NULL; -- affiche les id_livre non rendus

-- Afficher le titre de ces livres non rendus : 
SELECT titre FROM livre WHERE id_livre IN(SELECT id_livre FROM emprunt WHERE date_rendu IS NULL);
-- On affiche le titre de la table livre pour lequel l'id_livre est dans la liste donnée par la seconde requete entre parenthèse, soit 100 ou 105.

-- Equivaut à : 
SELECT titre FROM livre WHERE id_livre IN (100,105);

-- Notez que l'on éxecute d'abord la requête entre parenthèses, puis celle qui est à l'exterieur.

-- Le IN de la seconde requête peut etre remplacé par un "=" : IN c'est quand il y a plusieurs résultats, alors qu'on utilise "=" quand on est sur de n'avoir qu"un seul résultat. Exemple :
-- Afficher les id des livres que Chloe a emprunté : 
SELECT id_livre FROM emprunt WHERE id_abonne = (SELECT id_abonne FROM abonne WHERE prenom = 'chloe');

-- ********************************
-- EXERCICE REQUETES IMBRIQUEES
-- ********************************

-- afficher les prénoms des abonnés ayant emprunté un livre le '2011-12-19'.

SELECT prenom FROM abonne WHERE id_abonne IN (SELECT id_abonne FROM emprunt WHERE date_sortie ='2011-12-19');

-- afficher les prénoms des abonnés ayant emprunté un livre d'Alphonse Daudet.

SELECT prenom FROM abonne WHERE id_abonne IN (SELECT id_abonne FROM emprunt WHERE id_livre IN (SELECT id_livre FROM livre WHERE auteur ='Alphonse Daudet'));

-- Nous aimerions savoir le titre des livres que chloé a emprunté

SELECT titre FROM livre WHERE id_livre IN (SELECT id_livre FROM emprunt WHERE id_abonne IN (SELECT id_abonne FROM abonne WHERE prenom ='chloe'));

-- Nous aimerions savoir le titre des livres que chloé n'a pas emprunté

SELECT titre FROM livre WHERE id_livre NOT IN (SELECT id_livre FROM emprunt WHERE id_abonne IN (SELECT id_abonne FROM abonne WHERE prenom ='chloe'));

-- Combien de livres Benoit a emprunté à la bibliothèque ? 

SELECT COUNT(id_emprunt) FROM emprunt WHERE id_abonne IN (SELECT id_abonne FROM abonne WHERE prenom ='Benoit');

-- Qui (prenom) a emprunté le plus de livre à la bibliothèque ?

SELECT prenom FROM abonne WHERE id_abonne = (SELECT id_abonne FROM emprunt GROUP BY id_abonne ORDER BY COUNT(id_emprunt) DESC LIMIT 0,1);


-- ********************************
-- LES JOINTURES INTERNES
-- ********************************

-- Une jointure est possible dans tous les cas, alors qu'une requete imbriquée est possible seulement dans le cas où les champs affichés (ceux qui sont dans le SELECT) proviennent de la même table. Avec une jointure, ils pourront être affichés dans le même SELECT et issus de tables différentes.

-- Nous aimerions connaitre les dates de sortie et de rendu pour l'abonné Guillaume :
SELECT a.prenom, e.date_sortie, e.date_rendu
FROM abonne a
INNER JOIN emprunt e
ON a.id_abonne = e.id_abonne
WHERE a.prenom = 'guillaume';

-- 1ere ligne : ce que je souhaite afficher
-- 2eme ligne : la première table d'où viennent les informations
-- 3eme ligne : on lie la 1ere table à la seconde table d'où viennent les informations
-- 4ème ligne : la jointure qui lie les deux champs en COMMUN dans les 2 tables
-- 5ème ligne : condition supplémentaire sur le prénom 

-- Notez que lorsqu'il y a 3 tables à joindre, on fait suivre 2 INNER JOIN... ON l'un à la suite de l'autre.

-- EXERCICE : afficher les titres, date de sortie et date de rendu des livres écrits par Alphonse Daudet.

SELECT l.titre, e.date_sortie, e.date_rendu, l.auteur
FROM livre l
INNER JOIN emprunt e 
ON l.id_livre = e.id_livre
WHERE l.auteur = 'Alphonse Daudet';

-- EXERCICE : Qui (prenom) a emprunté "Une Vie" sur 2011 ? 

SELECT a.prenom
FROM abonne a 
INNER JOIN emprunt e
ON a.id_abonne = e.id_abonne
INNER JOIN livre l
ON e.id_livre = l.id_livre+
WHERE date_sortie LIKE '2011%' AND titre = 'une vie';

-- EXERCICE : Afficher le nombre de livres empruntés par chaque abonnés (prenom) ?

SELECT a.prenom, COUNT(e.id_emprunt)
FROM abonne a
INNER JOIN emprunt e
ON a.id_abonne = e.id_abonne
GROUP BY e.id_abonne;


-- EXERCICE : Qui (prenom) a emprunté quoi (titre) et à quelles dates (date_sortie) ? 
SELECT a.prenom, l.titre, e.date_sortie
FROM abonne a
INNER JOIN emprunt e
ON a.id_abonne = e.id_abonne
INNER JOIN livre l 
ON e.id_livre = l.id_livre;

-- ***********************
-- Afficher les prénoms des abonnés avec les id_livre qu'ils ont empruntés :
SELECT a.prenom, e.id_livre
FROM abonne a
INNER JOIN emprunt e
ON a.id_abonne = e.id_abonne;

-- *************************
-- Jointures externes 
-- *************************
-- Une jointures externe est une requete sans correspondance exigée entre les valeurs affichées.

-- Exemple : 
INSERT INTO abonne (prenom) VALUES ('moi'); -- on s'insère dans la table abonne

-- Si on relance la dernière requête de jointure interne, vous n'apparaissez pas dans la liste des abonnés (normal, vous n'avez rien emprunté, on fait une jointure externe !)
-- Si l'on souhaite que la liste des abonnés soit exhaustive, y compris ceux qui n'ont rien emprunté, on fait une jointure externe : 

SELECT abonne.prenom, emprunt.id_livre
FROM abonne
LEFT JOIN  emprunt 
ON abonne.id_abonne = emprunt.id_abonne; 

-- La clause LEFT JOIN permet de rapatrier TOUTES les données dans la table considérée comme étant à GAUCHE de l'instruction "LEFT JOIN" (ici abonne), sans correspondance exigée dans l'autre table (ici emprunt).

-- Les valeurs n'ayant pas de correspondance apparaissent avec la mention NULL.

-- Voici le cas avec un livre supprimé de la bibliothèque :
-- 1. On supprime le livre "Une vie" d'id_livre 100 :
DELETE FROM livre WHERE id_livre = 100;


-- 2. On affiche la liste de tous les emprunts, y compris ceux pour lesquelles il manque un livre :

SELECT e.id_emprunt, l.titre
FROM emprunt e
LEFT JOIN livre l
ON e.id_livre = l.id_livre;

-- On peut aussi ecrire cette requête avec RIGHT JOIN , en inversant la position des tables : 
SELECT e.id_emprunt, l.titre
FROM livre l 
RIGHT JOIN emprunt e
ON e.id_livre = l.id_livre;
-- ici RIGHT JOIN  signifie que la table à DROITE de l'instruction, donc emprunt,sera complétement affichée. Le livre manquant (une vie) est remplacée par la mention NULL.



