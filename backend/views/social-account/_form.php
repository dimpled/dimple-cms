<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\SocialAccount */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="social-account-form">

    <?php $form = ActiveForm::begin([
		'enableAjaxValidation' => true,
    ]); ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'provider')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'client_id')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'data')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
