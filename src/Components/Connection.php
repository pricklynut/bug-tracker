<?php
namespace App\Components;

class Connection extends AbstractComponent
{
    private $conn;

    protected $platform = 'mysql';

    protected $host = '127.0.0.1';

    protected $port = 3306;

    protected $charset = 'utf8';

    protected $user;

    protected $pass;

    protected $dbname;

    public function __construct(array $props = [])
    {
        parent::__construct($props);

        $this->open();
    }

    public function open()
    {
        if ($this->platform === 'mysql') {
            $this->conn = new \PDO(
                "{$this->platform}:host={$this->host};"
                ."port={$this->port};charset={$this->charset};dbname={$this->dbname}",
                $this->user,
                $this->pass
            );
        } else {
            throw new \Exception("Unknown platform, mayby not implemented yet");
        }
    }

    public function getConn()
    {
        return $this->conn;
    }

}
