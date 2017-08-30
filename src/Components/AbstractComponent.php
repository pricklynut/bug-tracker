<?php
namespace App\Components;

use App\DI\Container;

abstract class AbstractComponent
{
    protected $container;

    public function __construct($props = [])
    {
        $this->container  = new Container();

        foreach ($props as $name => $value) {
            $this->{$name} = $value;
        }
    }

    public function __set($name, $value)
    {
        $this->container->{$name} = $value;
    }
}
