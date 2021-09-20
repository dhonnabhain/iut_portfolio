# Portfolio IUT

**Ce projet est uniquement à but pédagogique et n'est pas prévu pour fonctionner en dehors de macOS et [Laravel Valet](https://laravel.com/docs/8.x/valet).**

## Modèle MVC (modèle - vue - contrôleur)
Le modèle MVC est une architecture (design pattern en anglais) visant à structurer une application en divisant la logique du code en trois partie.

Pour matérialiser cette architecture, chaque partie devrait être placée dans un dossier dédié afin de ne pas mélanger les fichiers et rendre le projet lisible.

Par exemple: 
- un dossier `models` pour les modèles
- un dossier `views` pour les vues
- un dossier `controllers` pour les contrôleurs

### Modèle
Le code contenu dans ces fichiers expose les accès à la base de données.
Ce sont donc ces fichiers qui contiennent les requêtes SQL ainsi que les différents usage de PDO.

Généralement, il est conseillé d'utiliser un modèle par table de base de données afin de regrouper les appels en base de données concernant une même table.

Par exemple, une table themes aura un modèle présent dans le dossier `/models` avec un nom équivoque comme `themeModel.php`.

### Vue
Les fichiers de vue sont chargés de l'affichage. Ces derniers utilisent les données issues d'un contrôleur et des modèles afin de les afficher.
Ces fichiers doivent avoir l'extension `.php` pour utiliser les variables mais peut contenir du HTML.

Ils peuvent être considérés comme la terminaison d'un contrôleur si ce dernier est utilisé pour afficher une page web.

Par exemple, la vue pour une page `/themes` pourrait se trouver dans un dossier `/views/pages/themes.php`.

### Contrôleur
Les contrôleurs ont pour rôle d'orchestrer l'usage des modèles et des vues tout en contrôlant les données à traiter et afficher.
**À noter qu'un contrôleur ne sert pas uniquement à afficher une page web**

Par exemple, dans le cas d'une authentification, le formulaire va utiliser un contrôleur (`/controllers/LoginController.php`) qui va s'occuper d'appeler un modèle `/models/UserModel.php` afin de récupérer les utilisateurs avec l'adresse email du formulaire puis, en cas de succès du processus d'authentification, va rediriger vers une autre page.

## Composer
[Composer](https://getcomposer.org) est un gestionnaire de dépendences permettant d'utiliser des packages (comprendre du code) d'autres personnes.

Ici, les packages [filp/Whoops](https://github.com/filp/whoops) et [symfony/var-dumper](https://github.com/symfony/var-dumper) sont utilisés à des fins de debug mais n'est pas requis dans vos projets.