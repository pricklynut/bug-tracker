<?php
namespace App\Controller;

use App\Application;

class TasksController extends AbstractController
{
    public function indexAction()
    {
        $title = 'Список задач';

        $taskMapper = Application::getInstance()->task_mapper;

        $tasks = $taskMapper->findAllByLimit(1000);

        $this->render('tasks/index.php', [
            'title' => $title,
            'tasks' => $tasks,
        ]);
    }
}
