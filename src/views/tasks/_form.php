<form action="" method="POST" name="taskForm">

    <div class="form-group">
        <label for="taskForm-username">Имя автора</label>
        <input type="text"
               class="form-control"
               id="taskForm-username"
               name="taskForm[username]"
               value="<?= $task->getUsername() ?>"
               placeholder="Введите имя"
               required>
    </div>

    <div class="form-group">
        <label for="taskForm-email">Email</label>
        <input type="email"
               class="form-control"
               id="taskForm-email"
               name="taskForm[email]"
               value="<?= $task->getEmail() ?>"
               placeholder="username@example.com"
               required>
    </div>

    <div class="form-group">
        <label for="taskForm-task">Описание задачи</label>
        <textarea name="taskForm[task]"
                  class="form-control"
                  id="taskForm-task"
                  rows="3"
                  placeholder="Введите описание задачи..."
                  required><?= $task->getTask() ?></textarea>
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

    <button type="submit" class="btn btn-primary">Сохранить</button>

</form>
