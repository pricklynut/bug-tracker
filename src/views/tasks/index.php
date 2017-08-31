<?php
use App\Helper\Html;

$isAdmin = \App\Application::getInstance()->loginService->isLogged();
?>

<div class="container content">
    <h1>Список задач</h1>

    <a href="/tasks/create" class="btn btn-primary" style="margin-bottom: 24px;">Создать задачу</a>

    <?php if (!empty($tasks)): ?>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>
                        Имя пользователя
                        <a href="<?= Html::currentUriWithQuery(['sort' => 'username_asc']) ?>">
                            <span class="glyphicon glyphicon-arrow-up"></span> А
                        </a>

                        <a href="<?= Html::currentUriWithQuery(['sort' => 'username_desc']) ?>">
                            <span class="glyphicon glyphicon-arrow-down"></span> а
                        </a>
                    </th>
                    <th>
                        Email
                        <a href="<?= Html::currentUriWithQuery(['sort' => 'email_asc']) ?>">
                            <span class="glyphicon glyphicon-arrow-up"></span> А
                        </a>

                        <a href="<?= Html::currentUriWithQuery(['sort' => 'email_desc']) ?>">
                            <span class="glyphicon glyphicon-arrow-down"></span> а
                        </a>
                    </th>
                    <th>
                        Статус
                        <a href="<?= Html::currentUriWithQuery(['sort' => 'status_asc']) ?>">
                            <span class="glyphicon glyphicon-arrow-up"></span> А
                        </a>

                        <a href="<?= Html::currentUriWithQuery(['sort' => 'status_desc']) ?>">
                            <span class="glyphicon glyphicon-arrow-down"></span> а
                        </a>
                    </th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($tasks as $index => $task): ?>
                    <tr>
                        <td><?= ($pager->getOffset() + $index + 1) ?></td>
                        <td><?= htmlspecialchars($task->getUsername()) ?></td>
                        <td><?= htmlspecialchars($task->getEmail()) ?></td>
                        <td><?= htmlspecialchars($task->getStatusLabel()) ?></td>
                        <td>
                            <a href="/tasks/view?id=<?= $task->getId() ?>">
                                <span class="glyphicon glyphicon-eye-open"></span>
                            </a>
                            <?php if ($isAdmin): ?>
                                <a href="/tasks/edit?id=<?= $task->getId() ?>">
                                    <span class="glyphicon glyphicon-pencil"></span>
                                </a>
                            <?php endif ?>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    <?php endif ?>

    <?php if ($pager->hasPagination()): ?>
        <?php include dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.'pager.php'; ?>
    <?php endif ?>

</div>
