<?php

return [

    'defaultController' => '\App\Controller\TasksController',

    'components' => [
        'db' => [
            'class' => 'App\Components\Connection',
            'props' => [
                'host' => '127.0.0.1',
                'dbname' => 'beejee',
                'user' => 'pricklynut',
                'pass' => '',
                // 'port' => '5432',
                // 'platform' => 'pgsql'
            ],
        ],
        
    ],
];
