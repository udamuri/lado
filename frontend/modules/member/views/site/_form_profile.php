<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

if(isset($get))
{
	$model->firstname = $get['firstname'];
	$model->lastname = $get['lastname'];
}
?>

<?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

    <?= $form->field($model, 'firstname')->textInput(['autofocus' => true, 'class'=>'form-control input-lg']) ?>

    <?= $form->field($model, 'lastname')->textInput(['class'=>'form-control input-lg']) ?>

    <div class="clearfix"></div>

    <div class="form-group">
        <?= Html::submitButton('Simpan Perubahan', ['class' => 'btn btn-primary btn-lg', 'name' => 'update-profile']) ?>
    </div>

<?php ActiveForm::end(); ?>

