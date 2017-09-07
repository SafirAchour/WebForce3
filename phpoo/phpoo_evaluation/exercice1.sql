/*Exercice 1 : « Jointons ! »
Supposons les tables SQL suivantes :


Table “users” 
● id
● firstname
● lastname
● email
● role


Table “articles”
● id
● title
● content
● picture
● date_publish
● id_user

Dans un fichier à part, écrire la requête SQL permettant d’afficher un article (id = 10) et son
auteur à l’aide d’une jointure.
Note : N’écrivez que la requête SQL, pas de PHP */


SELECT u.firstname, u.lastname, a.id
FROM users u
INNER JOIN articles a
ON u.id = a.id_user
WHERE a.id = 10 ;