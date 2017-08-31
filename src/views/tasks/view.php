<?php
use App\Helper\Html;
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
            <p>
                <?= Html::encode($task->getTask()) ?>
            </p>
        </div>
    </div>

</div>
