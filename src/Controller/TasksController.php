<?php
namespace App\Controller;

use App\Application;

class TasksController extends AbstractController
{
    public function indexAction()
    {
        $title = 'Список задач';
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $sort = isset($_GET['sort']) ? $_GET['sort'] : null;

        $taskMapper = Application::getInstance()->task_mapper;
        $totalTasksCount = $taskMapper->getTotalItemsCount();

        $pager = Application::getInstance()->pager_tasks_list;
        $pager->setCurrentPage($page);
        $pager->setTotalCount($totalTasksCount);

        $tasks = $taskMapper->findAllByLimitWithSort($sort, $pager->getPerPage(), $pager->getOffset());

        $this->render('tasks/index.php', [
            'title' => $title,
            'tasks' => $tasks,
            'pager' => $pager,
        ]);
    }
}
