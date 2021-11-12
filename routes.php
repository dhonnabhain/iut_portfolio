<?php

/**
 * Une route représente une url de l'application
 * Ici, chaque route est un incluse dans un tableau associatif comprenant les éléments suivant
 * layout => racine de page web à utiliser
 * controller => contrôleur à utiliser pour gérer le traitement des données
 * function <optionnel> => fonction du contrôleur à utiliser
 */
define('GET_ROUTES', [
    'index' => [
        'layout' => 'public',
        'controller' => 'IndexPageController',
    ],

    // Auth
    'login' => [
        'layout' => 'public',
        'controller' => 'LoginPageController',
    ],
    'logout' => [
        'controller' => 'LoginController',
        'function' => 'logout'
    ],
    'admin' => [
        'layout' => 'private',
        'controller' => 'AdminController',
        'function' => 'renderHome'
    ],

    // Domain
    'admin/themes/create' => [
        'layout' => 'private',
        'controller' => 'AdminController',
        'function' => 'renderThemeCreate'
    ],
    'admin/themes/edit' => [
        'layout' => 'private',
        'controller' => 'AdminController',
        'function' => 'renderThemeUpdate'
    ],
    'admin/themes/delete' => [
        'controller' => 'ThemeController',
        'function' => 'deleteTheme'
    ],

    // Domains
    'admin/domains/create' => [
        'layout' => 'private',
        'controller' => 'DomainController',
        'function' => 'renderFormDomains'
    ],
    'admin/domains/edit' => [
        'layout' => 'private',
        'controller' => 'AdminController',
        'function' => 'renderDomainUpdate'
    ],
    'admin/domains/delete' => [
        'controller' => 'DomainController',
        'function' => 'deleteDomain'
    ],

    // Skill
    'admin/skills/create' => [
        'layout' => 'private',
        'controller' => 'SkillController',
        'function' => 'renderFormSkills'
    ],
    'admin/skills/edit' => [
        'layout' => 'private',
        'controller' => 'AdminController',
        'function' => 'renderSkillUpdate'
    ],
    'admin/skills/delete' => [
        'controller' => 'SkillController',
        'function' => 'deleteSkill'
    ],
]);

define('POST_ROUTES', [
    'login' => [
        'controller' => 'LoginController',
        'function' => 'login'
    ],
    'admin/themes/create' => [
        'controller' => 'ThemeController',
        'function' => 'storeTheme'
    ],
    'admin/domains/create' => [
        'controller' => 'DomainController',
        'function' => 'storeDomain'
    ],
    'admin/skills/create' => [
        'controller' => 'SkillController',
        'function' => 'storeSkill'
    ]
]);
