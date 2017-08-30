<?php
namespace App\Controller;

abstract class AbstractController
{
    protected $defaultAction = 'indexAction';

    public function getDefaultAction()
    {
        return $this->defaultAction;
    }

}
