-- *******************************
-- Généralité 
-- *******************************

-- Pour faire les requetes SQL, nous utilisons la console sosu XAMPP :
--                cd c:\xampp\mysql\bin
--                mysql.exe -u root --password

-- on met 2 tirets en SQL pour faire des commentaires

-- Le SQL n'est pas sensible à la casse, mais par convention on met les mots clés SQL en MAJUSCULES

-- *******************************
-- Requetes générales
-- *******************************
CREATE DATABASE entreprise;     -- créer une base de données "entreprise"

USE entreprise;  -- pour se connecter à la base de données "entreprise"$

SHOW DATABASES      -- affiche les bdd disponibles dans le SGBD 

-- Ne pas saisir dans la console :

DROP DATABASE entreprise;       -- supprime définitivement une bdd

DROP TABLE employes;            -- supprime une table "employes"

TRUNCATE employes;              -- vide la table "employes" definitivement

-- On va créer la table "employes" et la remplir dans la console voir dans SQL-sources\01_entreprise

SHOW TABLES;        -- liste des tables de la bdd sur laquelle on est connecté (ici entreprise)

DESC employes;      -- affiche la structure de la table employes (DESC pour describe)


-- *******************************
-- Requetes de sélection
-- *******************************

SELECT nom, prenom FROM employes;   -- affiche le nom et le prénom de tous les employes contenu dans la table

SELECT service FROM employes;       -- affiche le service des employes

-- DISTINCT
SELECT DISTINCT service FROM employes;  -- DISTINCT permet d'éliminer les doublons dans la requete de selection : ainsi on affiche la liste précise des services

-- ALL ou *

SELECT * FROM employes;         -- affiche TOUS les champs des employes (nom, prenom, etc.)

-- clause WHERE
SELECT nom, prenom FROM employes WHERE service = 'informatique';     -- affiche le nom et le prénom des employes du service informatique. Notez que informatique est une valeur passée entre quotes

-- BETWEEN
SELECT nom, prenom, date_embauche FROM employes WHERE date_embauche BETWEEN '2006-01-01' AND '2010-12-31';  -- affiche le nom, prenom et date_embauche des salariés embauchés entre 2006 et 2010

-- LIKE 
SELECT prenom FROM employes WHERE prenom LIKE 's%';         -- Le '%' est un caractère Jocker qui remplace tous les autres caractères. On affiche donc les prenoms des employes qui commencent par s

SELECT prenom FROM employes WHERE prenom LIKE '%-%';        -- sélectionne les prénoms comportant un tiret

-- opérateurs de comparaisons
SELECT nom, prenom FROM employes WHERE service != 'informatique';       -- affiche le nom et prenom des employés qui ne sont pas du service informatique

--      =
--      <
--      >
--      <=
--      >=
--      != ou <> pour different de 

SELECT nom, prenom, salaire FROM employes WHERE salaire > 3000;      -- affiche le nom, prenom et le salaire des employes de salaire supérieur à 3000 euros


-- ORDER BY 
SELECT nom, prenom, salaire FROM employes ORDER BY salaire;         -- affiche le nom, prenom et le salaire des employes par ordre de salaire croissant. Par défaut l'ordre est croissant.

SELECT nom, prenom, salaire FROM employes ORDER BY salaire ASC, prenom DESC; --  ASC pour ordre croissant et DESC pour ordre décroissant (selon l'alphabet).

-- LIMIT 
SELECT nom,prenom, salaire FROM employes ORDER BY salaire DESC LIMIT 0,1;   -- affiche le nom, prenom, salaire de l'employe ayant le salaire le plus élevé : on trie les salaires par ordre décroissant  avec ORDER BY puis on prend le premier enregistrement avec LIMIT 0,1 (c'est à dire à partir de l'enregistrement 0 et sur 1 ligne)

-- l'alias avec AS 
SELECT nom, prenom, salaire * 12 AS salaire_annuel FROM employes;           --  AS permet de donner une étiquette au calcul  salaire * 12, appelé alias

-- SUN 
SELECT SUM(salaire * 12) FROM employes; -- affiche la SOMME des salaires multipliés par 12 mois

-- MIN et MAX
SELECT MIN(salaire) FROM employes; -- affiche le plus petit salaire
SELECT MAX(salaire) FROM employes; -- affiche le plus haut salaire

SELECT prenom, nom, MIN(salaire) FROM employes;     -- ceci ne fonctionne pas, on obtient le plus petit salaire mais les premiers prenom et nom de la table ! ¨Pour afficher les infos du salaire le plus petit on faitun ORDER BY suivi d'un LIMIT (cf ci dessus)

-- AVG (pour average = moyenne)

SELECT AVG(salaire) FROM employes; -- affiche la moyenne des salaires

-- ROUND
SELECT ROUND(AVG(salaire),0) FROM employes; -- arrondit la moyenne des salaires à 0 chiffres après la virgule

-- COUNT
SELECT COUNT(id_employes) FROM employes WHERE sexe = 'f'; -- affiche le nombre d'employes feminin

-- IN
SELECT nom, prenom, service FROM employes WHERE service IN ('comptabilite', 'informatique');    -- affiche les employes dont le service est dans la liste 'comptabilisé', 'informatique'

SELECT nom, prenom, service FROM employes WHERE service NOT IN ('comptabilite', 'informatique');    -- affiche les employes qui ne sont pas dans le service  'comptabilisé', et 'informatique'

-- AND, OR
SELECT * FROM employes WHERE service = 'commercial' AND salaire <= 2000;        -- affiche toutes les infos (*) des employes du service commercial ET dont le salaire est inferieur ou égal à 2000


SELECT * FROM employes WHERE service = 'production' AND salaire <= 1900 OR salaire = 2300; --  est équivalente à l'instruction suivante
SELECT * FROM employes WHERE (service = 'production' AND salaire <= 1900) OR salaire = 2300; -- affiche les employes de la production dont le salaire est de 1900, ou les employes dont le salaire est de 2300


-- GROUP BY
SELECT service, COUNT(id_employes) FROM employes GROUP BY service; -- affiche le nombre d'employés par service : GROUP BY est utilisé avec COUNT, SUM, AVG pour regrouper leur résultat selon le champ indiqué

-- GROUP BY ... HAVING
SELECT service, COUNT(id_employes) AS nombre FROM employes GROUP BY service HAVING nombre > 1;  -- HAVING remplace le WHERE après un GROUP BY. Affiche les services ayant plus d'un employé.
SELECT service, COUNT(id_employes) AS nombre FROM employes GROUP BY service HAVING nombre > 1;  -- HAVING remplace le WHERE après un GROUP BY. Affiche les services ayant plus d'un employé.



-- *******************************
-- Les Requetes d'insertion
-- *******************************


SELECT * FROM employes;   -- on affiche la table avant insertionde données

INSERT INTO employes (id_employes, prenom, nom, sexe, service, date_embauche, salaire) VALUES (8059, 'Alexis', 'Richy', 'm', 'informatique', '2011-12-28', 1800);  -- on insère un employe avec des données dans les champs indiqués dans les premieres parenthese, les valeurs insérées étant spécifiées dans le meme ordre dans les secondes parenthèses

-- Une insertion avec auto-incrément : on ne spécifie pas le champ id-employes qui s'incrémente tout seul :
INSERT INTO employes (prenom, nom, sexe, service, date_embauche, salaire) VALUES ('Alexis', 'Richy', 'm', 'informatique', '2011-12-28', 1800);

INSERT INTO employes  VALUES ('Alexis', 'Richy', 'm', 'informatique', '2011-12-28', 1800);


-- *******************************
-- Les Requetes de modifications
-- *******************************

SELECT * FROM employes;

-- UPDATE
UPDATE employes SET salaire = 1870 WHERE nom = "cottet"; -- modifie le salaire à 1870 de l'employé de nom "cottet"

-- Dans la réalité, on passe par l'id_employe pour etre certain de ne modifier que l'enregistrement concerné (cas des homonymes) :
UPDATE employes SET salaire = 1871 WHERE id_employe = 699; 

UPDATE employes SET salaire = 1871, service ='autre' WHERE id_employe = 699; -- on peut modifier plusieurs champs dans la meme requete

-- A NE PAS FAIRE : un UPDATE sans clause WHERE :
UPDATE employes SET salaire = 0; -- ici on update toute la table employes !

-- REPLACE
REPLACE INTO employes (id_employes, prenom, nom, sexe, service, date_embauche, salaire) VALUES(2000,'test','test','m', 'marketing','2010-07-05',2600); -- Le REPLACE se comporte comme un INSERT car l'id_employes 2000 n'existe pas

REPLACE INTO employes (id_employes, prenom, nom, sexe, service, date_embauche, salaire) VALUES(2000,'test','test','m', 'marketing','2010-07-05',2601); -- Le REPLACE se comporte comme un UPDATE car l'id_employes 2000 existe



-- *******************************
-- Les Requetes de supression
-- *******************************

-- DELETE
DELETE FROM employes WHERE nom = 'lagarde'; -- supprime l'employé de nom lagarde

-- Remarque : il faudrait passer par l'id_employes pour etre certain de n'en supprimer qu'un seul !

DELETE FROM employes WHERE service = 'informatique' AND id_employes != 802;

DELETE FROM employes WHERE id_employes = 388 OR id_employes = 990;  -- pour supprimer simultannément les id_employes 388 et 990 on met un OR : en effet un employe ne peut pas avoir 2 id différents (car l'id est unique) comme voudrait le dire un AND.

-- CE qui revient a écrire ceci :
DELETE FROM employes WHERE id_employes IN (388, 990); -- on supprime les id_employes qui sont dans cette liste.

-- A NE PAS FAIRE : UN DELETE sans clause WHERE :  
DELETE FROM employes; --revient a faire un TRUNCATE (vider la table) qui est irréversible

-- *****************************
-- exercice
-- *****************************
-- 1. afficher le service de l'employé 547
SELECT service FROM employes WHERE id_employes = 547;

-- 2. afficher la date d'embauche d'amandine
SELECT date_embauche FROM employes WHERE prenom = 'amandine';

-- 3. afficher le nombre d'employes du service commercial
SELECT COUNT(id_employes) FROM employes WHERE service = 'commercial';

-- 4. afficher la somme des salaires annuels des commerciaux
SELECT SUM(salaire * 12) FROM employes WHERE service ='commercial';

-- 5. afficher le salaire moyen par service
SELECT AVG(salaire) FROM employes WHERE service = 'commercial';

-- 6. afficher le nombre de recrutement sur l'année 2010
SELECT COUNT(id_employes) FROM employes WHERE date_embauche >= '2010-01-01' AND date_embauche <= '2010-12-31';

SELECT COUNT(id_employes) FROM employes WHERE date_embauche BETWEEN '2010-01-01' AND '2010-12-31';

-- 7. augmenter le salaire de tous les employer de +100
UPDATE employes SET salaire = (salaire+100);

-- 8. afficher le nombre de services different 
SELECT COUNT(DISTINCT service) FROM employes; 

-- 9. afficher le nombre d'employer par services
SELECT service, COUNT(id_employes) FROM employes GROUP BY service;

-- 10. afficher toute les infos  de l'employer du service commercial le mieux payer
SELECT * FROM employes WHERE service = 'commercial' ORDER BY salaire DESC LIMIT 0,1;

-- 11.afficher l'employer ayant ete embauché en dernier.
SELECT * FROM employes ORDER BY date_embauche DESC LIMIT 0,1;

