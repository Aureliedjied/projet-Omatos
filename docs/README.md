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
  