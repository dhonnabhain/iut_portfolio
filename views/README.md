# Views

Ce dossier contient les différentes vues du site.
Dans un soucis de séparation et de clarté, j'ai choisi de créer plusieurs sous-dossiers:
- layout: Racine des pages web.
  - Le fichier `public.php` sera utilisé pour l'affichage des pages comme les thémes, domaines, index, etc... -> pas d'authentification
  - Le fichier `private.php` sera utilisé pour l'affichage des pages d'administration -> authentification requise
- pages: contenu des pages devant être inclus dans un layout -> ex: formulaire de connexion pour la page `/login`
- partials: portions de page à inclure -> ex: footer de la page

Plus d'informations dans le fichier README.md situé à la racine du projet.