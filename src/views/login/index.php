<?php
use App\Helper\Html;
?>

<div class="container content">
    <h1><?= Html::encode($title) ?></h1>

    <form action="" method="POST">

        <div class="form-group">
            <label for="login-password">Введите пароль администратора (123)</label>
            <input type="password" name="password" id="login-password" class="form-control">
        </div>

        <button>Войти</button>
    </form>
</div>
