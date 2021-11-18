<?php

$rolesRoutes =[

    // ROUTES CONCERNANT LES JEUX----------------------------------------------------------------------
    //Ajout d'un jeu
    [
        'GET',
        '/roles/add',
        [
            'method' => 'add',
            'controller' => '\App\Controllers\RoleController'
        ],
        'role-add'
    ],
    //Ajout d'un jeu en POST
    [
        'POST',
        '/roles/add',
        [
            'method' => 'create',
            'controller' => '\App\Controllers\RoleController'
        ],
        'role-create'
    ],
    //Listing des jeux
    [
        'GET',
        '/roles',
        [
            'method' => 'list',
            'controller' => '\App\Controllers\RoleController'
        ],
        'role-list'
    ],
    //Modification d'un jeu
    [
        'GET',
        '/roles/edit/[i:id]',
        [
            'method' => 'edit',
            'controller' => '\App\Controllers\RoleController'
        ],
        'role-edit'
    ],
    //Modification d'un jeu en POST
    [
        'POST',
        '/roles/edit/[i:id]',
        [
            'method' => 'update',
            'controller' => '\App\Controllers\RoleController'
        ],
        'role-update'
    ],
    //Suppression d'un jeu
    [
        'GET',
        '/roles/delete/[i:id]',
        [
            'method' => 'delete',
            'controller' => '\App\Controllers\RoleController'
        ],
        'role-delete'
    ],

    // ROUTES CONCERNANT LES SPECIFICITÉS----------------------------------------------------------------------
    //Ajout d'une spécificité
    [
        'GET',
        '/village-people/add',
        [
            'method' => 'add',
            'controller' => '\App\Controllers\VillageController'
        ],
        'village-add'
    ],
    //Ajout d'une spécificité en POST
    [
        'POST',
        '/village-people/add',
        [
            'method' => 'create',
            'controller' => '\App\Controllers\VillageController'
        ],
        'village-create'
    ],
    //Listing des spécificités
    [
        'GET',
        '/village-people',
        [
            'method' => 'list',
            'controller' => '\App\Controllers\VillageController'
        ],
        'village-list'
    ],
    //Modification d'une spécificité
    [
        'GET',
        '/village-people/edit/[i:id]',
        [
            'method' => 'edit',
            'controller' => '\App\Controllers\VillageController'
        ],
        'village-edit'
    ],
    //Modification d'une spécificité en POST
    [
        'POST',
        '/village-people/edit/[i:id]',
        [
            'method' => 'update',
            'controller' => '\App\Controllers\VillageController'
        ],
        'village-update'
    ],
    //Suppression d'une spécificité
    [
        'GET',
        '/village-people/delete/[i:id]',
        [
            'method' => 'delete',
            'controller' => '\App\Controllers\VillageController'
        ],
        'village-delete'
    ],

    // ROUTES CONCERNANT LES REGLES---------------------------------------------------------------------------
    //Ajout d'une règle
    [
        'GET',
        '/cards/add',
        [
            'method' => 'add',
            'controller' => '\App\Controllers\CardController'
        ],
        'card-add'
    ],
    //Ajout d'une règle en POST
    [
        'POST',
        '/cards/add',
        [
            'method' => 'create',
            'controller' => '\App\Controllers\CardController'
        ],
        'card-create'
    ],
    //Listing des jeux
    [
        'GET',
        '/cards',
        [
            'method' => 'list',
            'controller' => '\App\Controllers\CardController'
        ],
        'card-list'
    ],
    //Modification d'une règle
    [
        'GET',
        '/cards/edit/[i:id]',
        [
            'method' => 'edit',
            'controller' => '\App\Controllers\CardController'
        ],
        'card-edit'
    ],
    //Modification d'une règle en POST
    [
        'POST',
        '/cards/edit/[i:id]',
        [
            'method' => 'update',
            'controller' => '\App\Controllers\CardController'
        ],
        'card-update'
    ],
    //Suppression d'une règle
    [
        'GET',
        '/cards/delete/[i:id]',
        [
            'method' => 'delete',
            'controller' => '\App\Controllers\CardController'
        ],
        'card-delete'
    ],
   
];