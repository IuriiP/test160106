<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Fbposts */

$this->title = Yii::t('app', 'Create Fbposts');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Fbposts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fbposts-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
