-- ***********************
-- Fonctions prédéfinies
-- ***********************

-- une fonction prédéfinie est une fonction qui est prevu par le language SQL et qui est exécutée par le developpeur.

-- fonctions sur les dates:
SELECT *, DATE_FORMAT(date_rendu, '%d-%m-%Y') AS date_fr FROM emprunt; -- DATE_FORMAT met la date au format indiqué : %d pour day , %m pour month , %Y pour year sur 4 chiffres, %y pour year sur 2 chiffres.

SELECT NOW(); -- affiche la date et l'heure du jour et de l'instant présent -- utile par exemple pour enregistrer la date d'inscription d'un membre.

SELECT CURDATE(); -- affiche la date du jour

SELECT CURTIME(); -- affiche l'heure presente.

--************************
--  Fonctions sur les chaines de caracteres :

SELECT CONCAT('a', 'b', 'c'); -- concatene en 'abc'. Pratique pour reunir une adresse par exemple ( adresse + ville + cp

SELECT CONCAT_WS(' - ', 'premier prenom', 'second prenom'); -- Signifie CONCAT WITH SEPARATOR : concatene avec le separateur indiqué

SELECT SUBSTRING('bonjour', 1, 3); -- Affiche "bon" : coupe le string de la position 1 et sur 3 caracteres.

SELECT SUBSTRING('bonjour prenom', 8); -- affiche "prenom" : coupe et affiche le string a partir de la position 8.

SELECT TRIM('     bonjour     '); -- Supprime les espaces devant et derriere la chaine de caracteres.

-- Ressources internet pour trouver les fonctions prédéfinies : http://sql.sh