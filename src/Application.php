<?php
namespace App;

use App\DI\Container;

/**
 * Class Application
 */
class Application
{
    private static $instance;

    /**
     * @var Container
     */
	private $container;

    /**
     * @var array
     */
	private $config;

    private $defaultController = '\\App\\Controller\\TasksController';

    /**
     * Application constructor.
     * @param array $config
     */
	public function __construct($config = [])
    {
        $this->config = $config;

        if (!empty($config['defaultController'])) {
            $this->defaultController = $config['defaultController'];
        }

        $this->bootstrap();
    }

    public function run()
    {
        $controllerName = $this->router->getController();
        $actionName = $this->router->getAction();

        if (empty($controllerName)) {
            $controllerName = $this->defaultController;
        } else {
            $controllerName = '\\App\\Controller\\'.$controllerName;
        }

        $controller = new $controllerName();

        if (empty($actionName)) {
            $actionName = $controller->getDefaultAction();
        }

        $controller->{$actionName}();
    }

    public static function getInstance($config = [])
    {
        if (empty(self::$instance)) {
            self::$instance = new self($config);
        }

        return self::$instance;
    }

    private function bootstrap()
    {
        $this->container = new Container();
        $this->loadComponents();
    }

    private function loadComponents()
    {
        $components = $this->mergeUserComponents();

        foreach ($components as $name => $config) {
            $this->container->{$name} = $this->container->asShared(function ($c) use ($config) {
                $className = $config['class'];
                $props = isset($config['props']) ? $config['props'] : [];
                $dependencies = isset($config['depends']) ? $config['depends'] : [];

                return new $className($props, $dependencies);
            });
        }
    }

    private function mergeUserComponents()
    {
        $userComponents = isset($this->config['components']) ? $this->config['components'] : [];
        $coreComponents = $this->getCoreComponentsList();

        $finalSet = $coreComponents;

        foreach ($userComponents as $name => $componentConfig) {
            if (!isset($finalSet[$name])) {
                $finalSet[$name] = $componentConfig;
                continue;
            }

            if (isset($componentConfig['class'])) {
                $finalSet[$name]['class'] = $componentConfig['class'];
            }

            if (isset($componentConfig['props'])) {
                $finalSet[$name]['props'] = $componentConfig['props'];
            }

            if (isset($componentConfig['depends'])) {
                $finalSet[$name]['depends'] = $componentConfig['depends'];
            }
        }

        return $finalSet;
    }

    private function getCoreComponentsList()
    {
        return [
            'router' => ['class' => \App\Components\Router::class],
        ];
    }

    /**
     * @param string $serviceName
     * @return mixed
     */
	public function __get($serviceName)
    {
        return $this->container->{$serviceName};
    }

}
