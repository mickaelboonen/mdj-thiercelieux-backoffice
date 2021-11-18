<?php

$gamesRoutes =[

    // ROUTES CONCERNANT LES JEUX----------------------------------------------------------------------
    //Ajout d'un jeu
    [
        'GET',
        '/games/add',
        [
            'method' => 'add',
            'controller' => '\App\Controllers\GameController'
        ],
        'game-add'
    ],
    //Ajout d'un jeu en POST
    [
        'POST',
        '/games/add',
        [
            'method' => 'create',
            'controller' => '\App\Controllers\GameController'
        ],
        'game-create'
    ],
    //Listing des jeux
    [
        'GET',
        '/games',
        [
            'method' => 'list',
            'controller' => '\App\Controllers\GameController'
        ],
        'game-list'
    ],
    //Modification d'un jeu
    [
        'GET',
        '/games/edit/[i:id]',
        [
            'method' => 'edit',
            'controller' => '\App\Controllers\GameController'
        ],
        'game-edit'
    ],
    //Modification d'un jeu en POST
    [
        'POST',
        '/games/edit/[i:id]',
        [
            'method' => 'update',
            'controller' => '\App\Controllers\GameController'
        ],
        'game-update'
    ],
    //Suppression d'un jeu
    [
        'GET',
        '/games/delete/[i:id]',
        [
            'method' => 'delete',
            'controller' => '\App\Controllers\GameController'
        ],
        'game-delete'
    ],

    // ROUTES CONCERNANT LES SPECIFICITÉS----------------------------------------------------------------------
    //Ajout d'une spécificité
    [
        'GET',
        '/specificities/add',
        [
            'method' => 'add',
            'controller' => '\App\Controllers\SpecificityController'
        ],
        'specificity-add'
    ],
    //Ajout d'une spécificité en POST
    [
        'POST',
        '/specificities/add',
        [
            'method' => 'create',
            'controller' => '\App\Controllers\SpecificityController'
        ],
        'specificity-create'
    ],
    //Listing des spécificités
    [
        'GET',
        '/specificities',
        [
            'method' => 'list',
            'controller' => '\App\Controllers\SpecificityController'
        ],
        'specificity-list'
    ],
    //Modification d'une spécificité
    [
        'GET',
        '/specificities/edit/[i:id]',
        [
            'method' => 'edit',
            'controller' => '\App\Controllers\SpecificityController'
        ],
        'specificity-edit'
    ],
    //Modification d'une spécificité en POST
    [
        'POST',
        '/specificities/edit/[i:id]',
        [
            'method' => 'update',
            'controller' => '\App\Controllers\SpecificityController'
        ],
        'specificity-update'
    ],
    //Suppression d'une spécificité
    [
        'GET',
        '/specificities/delete/[i:id]',
        [
            'method' => 'delete',
            'controller' => '\App\Controllers\SpecificityController'
        ],
        'specificity-delete'
    ],

    // ROUTES CONCERNANT LES REGLES---------------------------------------------------------------------------
    //Ajout d'une règle
    [
        'GET',
        '/rules/add',
        [
            'method' => 'add',
            'controller' => '\App\Controllers\RuleController'
        ],
        'rule-add'
    ],
    //Ajout d'une règle en POST
    [
        'POST',
        '/rules/add',
        [
            'method' => 'create',
            'controller' => '\App\Controllers\RuleController'
        ],
        'rule-create'
    ],
    //Listing des jeux
    [
        'GET',
        '/rules',
        [
            'method' => 'list',
            'controller' => '\App\Controllers\RuleController'
        ],
        'rule-list'
    ],
    //Modification d'une règle
    [
        'GET',
        '/rules/edit/[i:id]',
        [
            'method' => 'edit',
            'controller' => '\App\Controllers\RuleController'
        ],
        'rule-edit'
    ],
    //Modification d'une règle en POST
    [
        'POST',
        '/rules/edit/[i:id]',
        [
            'method' => 'update',
            'controller' => '\App\Controllers\RuleController'
        ],
        'rule-update'
    ],
    //Suppression d'une règle
    [
        'GET',
        '/rules/delete/[i:id]',
        [
            'method' => 'delete',
            'controller' => '\App\Controllers\RuleController'
        ],
        'rule-delete'
    ],
   
];