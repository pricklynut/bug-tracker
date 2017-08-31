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
        'task_mapper' => [
            'class' => 'App\Mapper\TaskMapper',
            'depends' => ['db'],
        ],
        'pager_tasks_list' => [
            'class' => 'App\Helper\Pager',
            'props' => [
                'perPage' => 3,
            ],
        ],
        'loginService' => [
            'class' => 'App\Components\LoginService',
            'props' => [
                'password' => '123',
            ],
        ],
    ],
];
