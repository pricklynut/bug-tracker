<div class="container content">
    <h1>Список задач</h1>

    <?php if (!empty($tasks)): ?>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Имя пользователя</th>
                    <th>Email</th>
                    <th>Статус</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($tasks as $task): ?>
                    <tr>
                        <td><?= $task->getId() ?></td>
                        <td><?= htmlspecialchars($task->getUsername()) ?></td>
                        <td><?= htmlspecialchars($task->getEmail()) ?></td>
                        <td><?= htmlspecialchars($task->getStatusLabel()) ?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    <?php endif ?>

    <?php if ($pager->hasPagination()): ?>
        <?php include dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.'pager.php'; ?>
    <?php endif ?>

</div>
