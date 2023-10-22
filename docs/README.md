# PROJET OMATOS
### "LOCATION MATERIEL VOYAGE"

Le but de ce site :

* proposer des locations en tarifs journaliers
* le client aura une ou plusieurs réservations à son nom
* la visibilité des produits sera "disponible/non disponible"
* le client pourra faire une estimation d'un forfait selon une période choisie (via calendrier) en ajoutant un produit (via un click sur "ajouter au panier")


## Installation de

* composer symfony/var-dumper
* altorouter
* librairie externe altodispatcher
* puis update via terminal

=> Ce qui induit une creation d'un fichier vendor (trop lourd pour être sur github), à inclure dans : .gitignore

## Creation d'un fichier public (racine du projet)

### point de départ : index.php

* require ../vendor/autoload
* instancier la classe altorouter et l'appeler $router
* Préciser son point de départ pour notre url
* créer nos routes
* configurer dispatcher pour y inclure nos controllers/méthodes

## Connexion à la bdd

* création de Database dans le fichier Utils ( connexion via PDO )
* création fichier config.ini pour authentifier l'acces à la bdd 
* Créer nos tables dans un fichier .sql que l'on pourra importer via adminer
* photos importées via istock /pixabay (droits ok ) et icones de flaticon

=> Inclure également nos informations de connexions (config.ini) au fichier .gitignore
=> Inclure le dossier VENDOR dans le .gitignore, trop lourd à push sur github !
  