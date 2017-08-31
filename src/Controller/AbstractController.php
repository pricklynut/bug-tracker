<?php
namespace App\Controller;

abstract class AbstractController
{
    protected $defaultAction = 'indexAction';

    public function getDefaultAction()
    {
        return $this->defaultAction;
    }

    protected function render($templateName, $params = [])
    {
        \extract($params);

        \ob_start();

        include dirname(dirname(__FILE__)). DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . $templateName;

        $content = \ob_get_clean();

        include dirname(dirname(__FILE__)). DIRECTORY_SEPARATOR . 'views/layouts/main.php';
    }

    protected function loadFromPost($model, $formName)
    {
        $post = isset($_POST[$formName]) ? $_POST[$formName] : [];

        foreach ($post as $field => $value) {
            if (property_exists(get_class($model), $field)) {
                $setter = 'set'.ucfirst($field);
                $model->$setter($value);
            }
        }

        return $model;
    }

}
