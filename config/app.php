
<?php 

$dirname = dirname(__DIR__);

return [
    'routes' => [
        'path' => $dirname . '/config/routes.php',
    ],
    'events' => [
        'path' => $dirname . '/config/events.php',
    ],
    'views' => [
        'path' => $dirname  . '/views'
    ],
    'db' => [
        'dsn' => 'localhost:3335',
        'username' => 'root',
        'password' => 'root',
        'options' => [],
    ]
];