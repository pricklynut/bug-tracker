<?php
namespace App\Components;

class LoginService extends AbstractComponent
{
    protected $password = '123';

    public function getPassword()
    {
        return $this->password;
    }

    public function isLogged()
    {
        return isset($_COOKIE['admin']);
    }

    public function login()
    {
        setcookie('admin', '1', time() + 60*60*24*7, '/');
        header('Location: /');
    }

}
