<?php
use App\Helper\Html;
?>

<form action="" method="POST" name="taskForm" enctype="multipart/form-data">

    <div class="form-group">
        <label for="taskForm-username">Имя автора</label>
        <input type="text"
               class="form-control"
               id="taskForm-username"
               name="taskForm[username]"
               value="<?= Html::encode($task->getUsername()) ?>"
               placeholder="Введите имя"
               required>
        <div id="taskForm-username-error" class="text-danger">
            <?php if (!empty($validator->getError('username'))): ?>
                <ul>
                    <?php foreach ($validator->getError('username') as $error): ?>
                        <li><?= Html::encode($error) ?></li>
                    <?php endforeach ?>
                </ul>
            <?php endif ?>
        </div>
    </div>

    <div class="form-group">
        <label for="taskForm-email">Email</label>
        <input type="email"
               class="form-control"
               id="taskForm-email"
               name="taskForm[email]"
               value="<?= Html::encode($task->getEmail()) ?>"
               placeholder="username@example.com"
               required>
        <div id="taskForm-email-error" class="text-danger">
            <?php if (!empty($validator->getError('email'))): ?>
                <ul>
                    <?php foreach ($validator->getError('email') as $error): ?>
                        <li><?= Html::encode($error) ?></li>
                    <?php endforeach ?>
                </ul>
            <?php endif ?>
        </div>
    </div>

    <div class="form-group">
        <img src="/upload/original/<?= Html::encode($task->getImage()) ?>"
             onerror="src='/images/picture-not-available.png'"
             class="task-image-preview"
             alt="предпросмотр изображения">
        <input type="file"
               class="form-control"
               id="taskForm-image"
               name="taskForm[image]">
    </div>

    <div class="form-group">
        <label for="taskForm-task">Описание задачи</label>
        <textarea name="taskForm[task]"
                  class="form-control"
                  id="taskForm-task"
                  rows="3"
                  placeholder="Введите описание задачи..."
                  required><?= Html::encode($task->getTask()) ?></textarea>

        <div id="taskForm-task-error" class="text-danger">
            <?php if (!empty($validator->getError('task'))): ?>
                <ul>
                    <?php foreach ($validator->getError('task') as $error): ?>
                        <li><?= Html::encode($error) ?></li>
                    <?php endforeach ?>
                </ul>
            <?php endif ?>
        </div>
    </div>

    <div class="form-group">
        <div class="checkbox">
            <input type="hidden" name="taskForm[status]" value="new">
            <label>
                <input type="checkbox" name="taskForm[status]"
                       value="finished" <?= $task->checked() ?>> Выполнена
            </label>
        </div>
    </div>

    <a href="" class="btn btn-default pull-right" id="toggle-task-preview">Предпросмотр</a>

    <button type="submit" class="btn btn-primary">Сохранить</button>

</form>

<div class="task-preview" id="task-preview-container">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2 class="panel-title">
                Автор: <span id="task-username-preview"><?= Html::encode($task->getUsername()) ?></span>
                (<span id="task-email-preview"><?= Html::encode($task->getEmail()) ?></span>)
            </h2>
        </div>
        <div class="panel-body">
            <img src="<?= '/upload/images/'.$task->getImage() ?>"
                 onerror="src='/images/picture-not-available.png'"
                 class="pull-left task-image-preview"
                 alt="предпросмотр загружаемого изображения"
                 id="task-image-preview">
            <p>
                <span id="task-task-preview"><?= Html::encode($task->getTask()) ?></span>
            </p>
        </div>
    </div>
</div>
