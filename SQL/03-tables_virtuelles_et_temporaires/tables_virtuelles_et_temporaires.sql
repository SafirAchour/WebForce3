-- **************************
-- Tables virtuelles : vues
-- **************************

-- Les vues ou tables virtuelles sont des objets de la bdd , constitués d'un nom, et d'une requete de selection. Permet de allegé une base de donnée pour n'avoir que qql informations que nous avons besoins, par exemple on peut mettre tout les hommes dans une vue pour sy retrouver plus rapidement .

-- Une fois qu'une vue est definie , on peut l'utiliser comme nimporte quelle table. Cette vue contient un sous ensemble de données resultant de la requete de selection.

USE entreprise;

-- créer une vue
CREATE VIEW vue_homme AS SELECT prenom, nom, sexe, service FROM employes WHERE sexe = 'm'; -- crée une vue remplie par les données du SELECT , a savoir les infos des employés masculins.

-- on peut ensuite faire n'importe quelle requete sur cette vue :
SELECT prenom FROM vue_homme; -- on selectione les prenoms dans la vue .

-- On peut voir la vue parmi les tables de la bdd :
SHOW TABLES;

--Si il y a une changement dans la tables d'origine ou dans la vue  , cela aura un impact  sur l'autre , et elles seront automatiquement mis a jour car ces deux tables sont liés !

-- il y a un interet a faire des vues en termes de gain de performances, ou quand il y a des requetes complexes a exécuter. La vue sert dans ce cas a stocker le resultats d'une premiere requete sur laquelle sera executée une seconde requete.

-- pour supprimer une vue :
DROP VIEW vue_homme;

-- **************************
-- Tables temporaires
-- **************************

-- création d'une table temporaire (disparait si on se deconnecte a la bdd) :
CREATE TEMPORARY TABLE temp SELECT * FROM employes WHERE sexe = 'f'; -- crée une table temporaire appelée "temp" avec les données du SELECT précisé. Cette table s'efface quand on quitte la session , ou la connexion a la bdd. Elle n'est pas visible dans la liste des tables avec SHOW TABLES.

-- utiliser une table temporaire :
SELECT prenom FROM temp; -- affiche les prenoms de la table temporaire

-- contrairement aux vues , s'il y a un changement dans la table d'origine , la table temporaire n'est pas inmpactée car elle est une copie a un instant T de celle-ci ( les données sont dupliquées).