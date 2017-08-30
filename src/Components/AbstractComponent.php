<?php
namespace App\Components;

use App\DI\Container;

abstract class AbstractComponent
{
    protected $container;

    public function __construct($props = [])
    {
        $this->container = new Container();

        foreach ($props as $name => $value) {
            if (property_exists(static::class, $name)) {
                $this->{$name} = $value;
            } else {
                $this->container->{$name} = $value;
            }
        }
    }

    public function getContainer()
    {
        return $this->container;
    }

}
