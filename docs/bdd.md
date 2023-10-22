# Bases de données

## OMATOS


* CONTENIR ( #id réservation 1, #id réservation 2, comprend )
* ITEMS ( id item, nom item, description, image, prix, stock, #id réservation )
* RESERVATIONS ( id réservation, date début, date fin, statut, total )
* RESERVATIONS_ITEMS ( id réservation, id item, quantité )
* USER ( id utilisateur, nom utilisateur, email, password, adresse, rôle, #id réservation )

## Relations entre les tables

Les tables sont généralement reliées entre elles à l'aide de ce qu'on appelle des clés étrangères (Foreign Key). Ces clés étrangères font le lien avec une clé primaire (Primary Key) d'une autre table.

### One to many

Cardinalités : 1 - 1 / 1 - N

* Les catégories peuvent se retrouver sur plusieurs produits (1 - N) / Les produits ne peuvent contenir qu'une seule catégorie (1 - 1)
* Les marques peuvent se retrouver sur plusieurs produits (1 - N) / Les produits ne peuvent contenir qu'une seule marque (1 - 1)
* Les auteurs peuvent écrire plusieurs livres (1 - N) / Les livres ne sont écrits que par un seul auteur (1 - 1)
* Les articles peuvent avoir plusieurs commentaires (1 - N) / Les commentaires ne concernent qu'un seul article (1 - 1)

Lorsque l'on a ce genre de relations, une clé étrangère va être créée dans la table qui est en cardinalité "1 - 1". On aura un champ *category_id* dans la table des produits, on aura un champ *brand_id* dans la table des produits, on aura champ *author_id* dans la table des livres, on aura un champ *post_id* dans la table des commentaires.

### Many to many

Cardinalités : 1 - N / 1 - N

* Les catégories peuvent se retrouver sur plusieurs produits (1 - N) / Les produits peuvent contenir plusieurs catégories (1 - N)
* Les commandes peuvent contenir plusieurs produits (1 - N) / Les produits peuvent se retrouver sur plusieurs commandes (1 - N)
* Les tags peuvent se retrouver sur plusieurs produits (1 - N) / Les produits peuvent contenir plusieurs tags (1 - N)

Lorque l'on a ce genre de relations, contrairement à la relation *one to many* on ne peut pas juste créer une clé étrangère car il y aurait plusieurs éléments (dont le nombre est indéfini) à lier. La solution passe par la création d'une table supplémentaire. Cette table contiendra les clés étrangères des 2 tables reliées.

``
