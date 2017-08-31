<?php
$isAdmin = \App\Application::getInstance()->loginService->isLogged();
?>

<!doctype html>
<html lang="ru">
<head>

    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title><?= $title ?></title>

    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/main.css">

</head>

<body>
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="/">Баг-трекер</a>
            </div>

            <ul class="nav navbar-nav navbar-right">
                <?php if (!$isAdmin): ?>
                    <li><a href="/login">Вход для админа</a></li>
                <?php endif ?>
            </ul>
        </div>
    </nav>

    <?= $content ?>

    <script src="/js/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/main.js"></script>
</body>

</html>
