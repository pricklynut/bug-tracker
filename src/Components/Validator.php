<?php
namespace App\Components;

class Validator extends AbstractComponent
{
    protected $errors = [];

    public function validate($model)
    {
        $rules = $model->getRules();

        foreach ($rules as $field => $fieldRules) {
            $fieldGetter = 'get'.ucfirst($field);
            foreach ($fieldRules as $key => $val) {
                if (is_integer($key)) {
                    $validator = $val;
                    $this->$validator($field, $model->$fieldGetter());
                } else {
                    $validator = $key;
                    $this->$validator($field, $model->$fieldGetter(), $val);
                }
            }
        }

        if (!empty($this->getErrors())) {
            return false;
        }

        return true;
    }

    public function notBlank($field, $val)
    {
        $assert = !empty(trim($val));

        if (!$assert) {
            $this->errors[$field][] = "Это поле не может быть пустым";
        }

        return $assert;
    }

    public function maxLength($field, $val, $params)
    {
        $max = $params['max'];
        $length = mb_strlen($val, 'UTF-8');

        $assert = $length <= $max;

        if (!$assert) {
            $this->errors[$field][] = "Максимальная длина {$max} символов, вы ввели {$length}";
        }

        return $assert;
    }

    public function isEmail($field, $val)
    {
        $regExp = '/^[^@.]+@[^@.]+\.[^@.]+/ui';

        $assert = preg_match($regExp, $val);

        if (!$assert) {
            $this->errors[$field][] = "Валидный email должен содержать символ @ и точку";
        }

        return $assert;
    }

    public function getErrors()
    {
        return $this->errors;
    }

    public function getError($field)
    {
        if (isset($this->errors[$field])) {
            return $this->errors[$field];
        }

        return [];
    }

}
