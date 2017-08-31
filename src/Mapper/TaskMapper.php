<?php
namespace App\Mapper;

class TaskMapper extends AbstractMapper
{
    public function findById($id)
    {
        $sql = "SELECT id, username, email, task, status, image
                FROM tasks
                WHERE id = :id";

        $stmt = $this->db->getConn()->prepare($sql);
        $stmt->bindValue(':id', $id, \PDO::PARAM_INT);
        $stmt->execute();
        $stmt->setFetchMode(\PDO::FETCH_CLASS, 'App\Entity\Task');

        return $stmt->fetch();
    }

    public function update($task)
    {
        $sql = "UPDATE tasks
                SET username = :username, email = :email, task = :task,
                    status = :status, image = :image
                WHERE id = :id";

        $stmt = $this->db->getConn()->prepare($sql);
        $stmt->bindValue(':username', $task->getUsername(), \PDO::PARAM_STR);
        $stmt->bindValue(':email', $task->getEmail(), \PDO::PARAM_STR);
        $stmt->bindValue(':task', $task->getTask(), \PDO::PARAM_STR);
        $stmt->bindValue(':status', $task->getStatus(), \PDO::PARAM_STR);
        $stmt->bindValue(':image', $task->getImage(), \PDO::PARAM_STR);
        $stmt->bindValue(':id', $task->getId(), \PDO::PARAM_INT);

        $stmt->execute();
    }

    public function findAllByLimit($limit = 0, $offset = 0)
    {
        $sql = "SELECT id, username, email, task, status, image
                FROM tasks LIMIT :limit OFFSET :offset";

        $stmt = $this->db->getConn()->prepare($sql);
        $stmt->bindValue(':limit', $limit, \PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, \PDO::PARAM_INT);

        $stmt->execute();
        $stmt->setFetchMode(\PDO::FETCH_CLASS, 'App\Entity\Task');

        return $stmt->fetchAll();
    }

    public function findAllByLimitWithSort($sort, $limit = 0, $offset = 0)
    {
        if ($this->wrongSortCondition($sort)) {
            return $this->findAllByLimit($limit, $offset);
        }

        $orderByClause = $this->buildOrderByClause($sort);

        $sql = "SELECT id, username, email, task, status, image
                FROM tasks {$orderByClause} LIMIT :limit OFFSET :offset";

        $stmt = $this->db->getConn()->prepare($sql);
        $stmt->bindValue(':limit', $limit, \PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, \PDO::PARAM_INT);

        $stmt->execute();
        $stmt->setFetchMode(\PDO::FETCH_CLASS, 'App\Entity\Task');

        return $stmt->fetchAll();
    }

    public function getTotalItemsCount()
    {
        $sql = "SELECT COUNT(id) FROM tasks";

        $stmt = $this->db->getConn()->prepare($sql);
        $stmt->execute();

        return $stmt->fetchColumn();
    }

    public function insert($task)
    {
        $sql = "INSERT INTO tasks (username, email, task, status, image)
                VALUES (:username, :email, :task, :status, :image)";

        $conn = $this->db->getConn();
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':username', $task->getUsername(), \PDO::PARAM_STR);
        $stmt->bindValue(':email', $task->getEmail(), \PDO::PARAM_STR);
        $stmt->bindValue(':task', $task->getTask(), \PDO::PARAM_STR);
        $stmt->bindValue(':status', $task->getStatus(), \PDO::PARAM_STR);
        $stmt->bindValue(':image', $task->getImage(), \PDO::PARAM_STR);

        $stmt->execute();

        $id = $conn->lastInsertId();
        $task->setId($id);

        return $id;
    }

    private function getFieldsWhiteList()
    {
        return ['username', 'email', 'status', 'image', 'task'];
    }

    private function wrongSortCondition($sort)
    {
        if (!is_string($sort)) {
            return true;
        }

        $sortParts = explode('_', $sort);

        if (count($sortParts) < 2) {
            return true;
        }

        if (!in_array($sortParts[0], $this->getFieldsWhiteList())) {
            return true;
        }

        if (!in_array($sortParts[1], ['asc', 'desc'])) {
            return true;
        }
    }

    private function buildOrderByClause($sort)
    {
        $sortParts = explode('_', $sort);

        return 'ORDER BY ' . join(' ', $sortParts);
    }

}
