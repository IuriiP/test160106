<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\FbpostsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="fbposts-search form-inline">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <!--?= $form->field($model, 'id') ?-->

    <?= $form->field($model, 'user_id')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\User::find()->all(),'id','username')) ?>

    <!--?= $form->field($model, 'created_at') ?-->

    <?= $form->field($model, 'created_time') ?>

    <!--?= $form->field($model, 'post_id') ?-->

    <?php // echo $form->field($model, 'message') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
