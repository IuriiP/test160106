<?php
/* @var $this yii\web\View */

$this->title = 'My Yii2 Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Congratulations!</h1>

        <p class="lead">You have successfully forked the TEST application.</p>
    </div>

    <div class="body-content">
        <div class="row">
            <div class="col-lg-12">
                <?php if (Yii::$app->user->isGuest): ?>
                <h2>You will be a <?= \app\models\User::find()->count()+1 ?>'st user</h2>
                    <p>Try to login first :)</p>
                    <p><a class="btn btn-default" href="/login">Login</a></p>
                <?php else: ?>
                <h2>We already have <?= \app\models\User::find()->count() ?> users</h2>
                    <p>Check them all :)</p>
                    <p><a class="btn btn-default" href="/fbposts/index">CRUD grabbed</a></p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
