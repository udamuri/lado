<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>

<?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

    <?= $form->field($model, 'password')->passwordInput(['autofocus' => true, 'class'=>'form-control input-lg']) ?>

    <?= $form->field($model, 'new_password')->passwordInput(['class'=>'form-control input-lg']) ?>
    
    <?= $form->field($model, 'password_repeat')->passwordInput(['class'=>'form-control input-lg']) ?>

    <div class="clearfix"></div>

    <div class="form-group">
        <?= Html::submitButton('Simpan Perubahan', ['class' => 'btn btn-primary btn-lg', 'name' => 'update-profile']) ?>
    </div>

<?php ActiveForm::end(); ?>

