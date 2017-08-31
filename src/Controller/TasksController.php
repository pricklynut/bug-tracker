<?php
namespace App\Controller;

use App\Application;

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

        $task = Application::getInstance()->task_mapper->findById($id);
        if (empty($task)) {
            header('HTTP/1.1 404 Not Found');
            exit;
            // TODO: 404 page template
        }

        $this->render('tasks/view.php', [
            'task' => $task,
            'title' => 'Просмотр задачи номер '.$task->getId(),
        ]);
    }

}
