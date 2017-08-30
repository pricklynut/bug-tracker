<?php
namespace App\Components;

class Connection extends AbstractComponent
{
    private $conn;

    public function __construct(array $props = [])
    {
        $props = $this->setDefaults($props);

        parent::__construct($props);

        $this->open();
    }

    public function open()
    {
        if ($this->container->platform === 'mysql') {
            $this->conn = new \PDO(
                "{$this->container->platform}:host={$this->container->host};"
                ."port={$this->container->port};dbname={$this->container->dbname}",
                $this->container->user,
                $this->container->pass
            );
        } else {
            throw new \Exception("Unknown platform, mayby not implemented yet");
        }
    }

    public function getConn()
    {
        return $this->conn;
    }

    private function setDefaults($props)
    {
        if (empty($props['platform'])) {
            $props['platform'] = 'mysql';
        }

        if (empty($props['user'])) {
            $props['host'] = '127.0.0.1';
        }

        if (empty($props['port'])) {
            $props['port'] = 3306;
        }

        return $props;
    }
}
