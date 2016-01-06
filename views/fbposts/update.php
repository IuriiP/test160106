<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Fbposts */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Fbposts',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Fbposts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="fbposts-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
