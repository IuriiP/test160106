<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please login over social network account:</p>

    <?=
    yii\authclient\widgets\AuthChoice::widget([
        'baseAuthUrl' => ['site/auth']
    ]);
    ?>

    <div class="col-lg-offset-1" style="color:#999;">
        There is no other way to enter and check if the application works.
    </div>
</div>
