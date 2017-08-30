<?php
namespace App\Components;

use App\Application;
use App\DI\Container;

abstract class AbstractComponent
{
    protected $container;

    public function __construct($props = [], $dependencies = [])
    {
        $this->container = new Container();

        foreach ($props as $name => $value) {
            if (property_exists(static::class, $name)) {
                $this->{$name} = $value;
            } else {
                $this->container->{$name} = $value;
            }
        }

        $app = Application::getInstance();
        foreach ($dependencies as $dependency) {
            if (property_exists(static::class, $dependency)) {
                $this->{$dependency} = $app->{$dependency};
            } else {
                $this->getContainer()->{$dependency} = $app->{$dependency};
            }
        }
    }

    public function getContainer()
    {
        return $this->container;
    }

}
