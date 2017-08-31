<?php
use App\Helper\Html;

$isAdmin = App\Application::getInstance()->loginService->isLogged();
?>

<div class="container content">
    <h1>Задача #<?= $task->getId() ?></h1>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h2 class="panel-title">
                Автор: <?= Html::encode($task->getUsername()) ?>
                (<?= Html::encode($task->getEmail()) ?>)
            </h2>
        </div>
        <div class="panel-body">
            <img src="/upload/original/<?= Html::encode($task->getImage()) ?>"
                 style="width: 320px; padding-right: 24px;"
                 onerror="src='/images/picture-not-available.png'"
                 class="pull-left"
                 alt="изображение к задаче">
            <p>
                <?= Html::encode($task->getTask()) ?>
            </p>

            <?php if ($isAdmin): ?>
                <a href="/tasks/edit?id=<?= $task->getId() ?>" class="btn btn-primary">
                   Редактировать
                </a>
            <?php endif ?>
        </div>
    </div>

</div>
