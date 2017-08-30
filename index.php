<?php

define('ROOT_DIR', dirname(__FILE__));

spl_autoload_register(function ($class) {
    $srcDir = ROOT_DIR . DIRECTORY_SEPARATOR . 'src';

    $namespaceParts = explode('\\', $class);
    if (count($namespaceParts) > 1) {
        unset($namespaceParts[0]);
    }

    include_once $srcDir . DIRECTORY_SEPARATOR . join('/', $namespaceParts) . '.php';
});

$config = require ROOT_DIR . DIRECTORY_SEPARATOR . 'config/main.php';

$app = App\Application::getInstance($config);
$app->run();