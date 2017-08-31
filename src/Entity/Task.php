<?php
namespace App\Entity;

class Task
{
    const STATUS_FINISHED = 'finished';

    const STATUS_NEW = 'new';

    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $username;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $task;

    /**
     * @var string
     */
    private $image;

    /**
     * @var string
     */
    private $status = self::STATUS_NEW;

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getTask()
    {
        return $this->task;
    }

    /**
     * @param string $task
     */
    public function setTask($task)
    {
        $this->task = $task;
    }

    /**
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param string $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    public function checked()
    {
        if ($this->status === self::STATUS_FINISHED) {
            return 'checked';
        }

        return '';
    }

    public function getStatusLabel()
    {
        $labels = $this->getStatusLabels();

        return isset($labels[$this->status]) ? $labels[$this->status] : null;
    }

    private function getStatusLabels()
    {
        return [
            self::STATUS_NEW => 'Новая',
            self::STATUS_FINISHED => 'Выполнена',
        ];
    }

}
