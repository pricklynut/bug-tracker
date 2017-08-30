<?php
namespace App\Components;

/**
 * Class Router
 */
class Router extends AbstractComponent
{
    /**
     * Controller name
     * @var string
     */
    private $controller;

    /**
     * Action name
     * @var string
     */
    private $action;

    public function __construct($props = [])
    {
        parent::__construct($props);
        $this->init();
    }

    /**
     * @return string|null
     */
    public function getController()
    {
        return "\\App\\Controller\\".$this->controller;
    }

    /**
     * @return string|null
     */
    public function getAction()
    {
        return $this->action;
    }

    private function init()
    {
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $uriParts = array_filter(explode('/', $uri));

        $this->controller = isset($uriParts[1]) ? ucfirst($uriParts[1]).'Controller' : null;
        $this->action = isset($uriParts[2]) ? $uriParts[2].'Action' : null;
    }

}
