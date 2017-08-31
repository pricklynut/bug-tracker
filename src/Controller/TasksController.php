<?php
namespace App\Controller;

use App\Application;
use App\Entity\Task;

class TasksController extends AbstractController
{
    public function indexAction()
    {
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $sort = isset($_GET['sort']) ? $_GET['sort'] : null;

        $taskMapper = Application::getInstance()->task_mapper;
        $totalTasksCount = $taskMapper->getTotalItemsCount();

        $pager = Application::getInstance()->pager_tasks_list;
        $pager->setCurrentPage($page);
        $pager->setTotalCount($totalTasksCount);

        $tasks = $taskMapper->findAllByLimitWithSort($sort, $pager->getPerPage(), $pager->getOffset());

        $this->render('tasks/index.php', [
            'title' => 'Список задач',
            'tasks' => $tasks,
            'pager' => $pager,
        ]);
    }

    public function viewAction()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        $task = $this->find($id);

        $this->render('tasks/view.php', [
            'task' => $task,
            'title' => 'Просмотр задачи номер '.$task->getId(),
        ]);
    }

    public function createAction()
    {
        $task = new Task();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->loadFromPost($task, 'taskForm');
            $this->saveImage($task);

            // TODO: model validation
            $taskMapper = Application::getInstance()->task_mapper;
            $taskMapper->insert($task);
            // TODO: redirect to view page
        }

        $this->render('tasks/create.php', [
            'task' => $task,
            'title' => 'Создать задачу',
        ]);
    }

    public function editAction()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        $task = $this->find($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->loadFromPost($task, 'taskForm');
            $this->saveImage($task);

            // TODO: model validation
            $taskMapper = Application::getInstance()->task_mapper;
            $taskMapper->update($task);
            // TODO: redirect to view page
        }

        $this->render('tasks/update.php', [
            'task' => $task,
            'title' => 'Редактировать задачу #'.$task->getId(),
        ]);
    }

    protected function find($id)
    {
        $task = Application::getInstance()->task_mapper->findById($id);
        if (empty($task)) {
            header('HTTP/1.1 404 Not Found');
            exit;
            // TODO: 404 page template
        }

        return $task;
    }

    protected function saveImage($task)
    {
        $tmpName = isset($_FILES['taskForm']['tmp_name']['image'])
            ? $_FILES['taskForm']['tmp_name']['image'] : null;
        $originalName = isset($_FILES['taskForm']['name']['image'])
            ? $_FILES['taskForm']['name']['image'] : null;

        if ($tmpName and $originalName) {
            move_uploaded_file($tmpName, ROOT_DIR.'/upload/original/'.$originalName);
            $task->setImage($originalName);
        }
    }

}
