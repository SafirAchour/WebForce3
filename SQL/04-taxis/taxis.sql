USE taxis;

-- EXERCICE:

-- 1. qui conduit la voiture d'id_vehicule 503 ?
SELECT prenom FROM conducteur WHERE id_conducteur IN (SELECT id_conducteur FROM association_vehicule_conducteur WHERE id_vehicule IN (SELECT id_vehicule FROM vehicule WHERE id_vehicule = 503));
-- 2. qui(prenoms) conduit quel modele ?
SELECT c.prenom,v.modele
FROM conducteur c
INNER JOIN association_vehicule_conducteur a
ON c.id_conducteur = a.id_conducteur
INNER JOIN vehicule v
ON a.id_vehicule = v.id_vehicule;
-- 3. ajoutez vous dans la liste des conducteurs
-- afficher tous les conducteurs (y compris ceux qui n'ont pas de vehicule affecté ) ainsi que les modeles de vehicule
INSERT INTO conducteur (prenom) VALUES ('charles');

SELECT c.prenom,v.modele
FROM conducteur c
LEFT JOIN association_vehicule_conducteur a
ON c.id_conducteur = a.id_conducteur
LEFT JOIN vehicule v
ON a.id_vehicule = v.id_vehicule;


-- 4. ajoutez un nouvel enregistrement dans la table vehicule.
-- Puis afficher tous les modeles de vehicule(y compris ceux qui n'ont pas de chauffeur  affecté )et le prenom des conducteurs.
INSERT INTO vehicule (marque) VALUES ('mt-07');
SELECT v.modele, c.prenom
FROM conducteur c
RIGHT JOIN association_vehicule_conducteur a
ON c.id_conducteur = a.id_conducteur
RIGHT JOIN vehicule v
ON a.id_vehicule = v.id_vehicule;

-- 5. afficher les prenoms des conducteurs ( y compris ceux qui n'ont pas de vehicule ) et tous les vehicules ( meme ceux qui n'ont pas de chauffeur affecté).
SELECT v.modele, c.prenom
FROM conducteur c
RIGHT JOIN association_vehicule_conducteur a
ON c.id_conducteur = a.id_conducteur
RIGHT JOIN vehicule v
ON a.id_vehicule = v.id_vehicule
UNION
SELECT v.modele, c.prenom
FROM conducteur c
left JOIN association_vehicule_conducteur a
ON c.id_conducteur = a.id_conducteur
LEFT JOIN vehicule v
ON a.id_vehicule = v.id_vehicule;