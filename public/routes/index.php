<?php

require __DIR__ . '/games.php';
require __DIR__ . '/roles.php';

$pages =[
    //Route pour la home
    [
        'GET',
        '/',
        [
            'method' => 'home',
            'controller' => '\App\Controllers\MainController'
        ],
        'main-home'
    ],
    //ROUTES CONCERNANT LES UTILISATEURS----------------------------------------------------------------------------
    //Suppression d'un utilisateur
    [
       'GET',
       '/users/delete/[i:id]',
       [
           'method' => 'delete',
           'controller' => '\App\Controllers\UserController'
       ],
       'user-delete'
   ],
   //Listing des utilisateurs
   [
        'GET',
        '/users',
        [
           'method' => 'list',
           'controller' => '\App\Controllers\UserController'
        ],
        'user-list'
    ],
    //Page d'ajout d'un utilisateur en GET
    [
        'GET',
        '/users/add',
        [
            'method' => 'add',
            'controller' => '\App\Controllers\UserController'
        ],
        'user-add',
    ],
    //Page de modification d'un utilisateur en GET
    [
        'GET',
        '/users/edit/[i:id]',
        [
            'method' => 'edit',
            'controller' => '\App\Controllers\UserController'
        ],
        'user-edit'
    ],
    //Page d'ajout d'un utilisateur en POST
    [
        'POST',
        '/users/add',
        [
            'method' => 'create',
            'controller' => '\App\Controllers\UserController'
        ],
        'user-create',
    ],
    //Page de modification d'un utilisateur en POST
    [
        'POST',
        '/users/edit/[i:id]',
        [
            'method' => 'update',
            'controller' => '\App\Controllers\UserController'
        ],
        'user-update'
    ],
    //ROUTES CONCERNANT LA CONNEXION----------------------------------------------------------------------------
    //Paga de connexion en GET
    [
        'GET',
        '/signin',
        [
            'method' => 'login',
            'controller' => '\App\Controllers\UserController'
        ],
        'user-login'
    ],
    //Paga de connexion en POST
    [
        'POST',
        '/signin',
        [
            'method' => 'authenticate',
            'controller' => '\App\Controllers\UserController'
        ],
        'user-authenticate'
    ],
    //Paga de déconnexion 
    [
        'GET',
        '/logout',
        [
            'method' => 'logout',
            'controller' => '\App\Controllers\UserController'
        ],
        'user-logout',
    ],
];

$routesArray = array_merge($pages, $gamesRoutes, $rolesRoutes);
