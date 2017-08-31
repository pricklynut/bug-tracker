<?php
namespace App\Controller;

use App\Application;

class LoginController extends AbstractController
{
    public function indexAction()
    {
        $error = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userPassword = isset($_POST['password']) ? $_POST['password'] : null;

            $loginService = Application::getInstance()->loginService;
            if ($userPassword !== $loginService->getPassword()) {
                $error = 'Неверный пароль';
            } else {
                $loginService->login();
            }
        }

        $this->render('login/index.php', [
            'error' => $error,
            'title' => 'Вход под администратором',
        ]);
    }
}
