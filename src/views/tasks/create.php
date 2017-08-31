<?php
use App\Helper\Html;
?>

<div class="container content">
    <h1><?= Html::encode($title) ?></h1>
    <?php include '_form.php' ?>
</div>
