<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Daftar';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">
    <div class="panel panel-default">
        <div class="panel-body">
            <h1><?= Html::encode($this->title) ?></h1>
            <div class="row">
                <div class="col-lg-5">
                    <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                        <?= $form->field($model, 'firstname')->textInput(['autofocus' => true, 'class'=>'form-control input-lg']) ?>

                        <?= $form->field($model, 'lastname')->textInput(['class'=>'form-control input-lg']) ?>

                        <?= $form->field($model, 'username')->textInput(['class'=>'form-control input-lg']) ?>

                        <?= $form->field($model, 'email')->textInput(['class'=>'form-control input-lg']) ?>

                        <?= $form->field($model, 'password')->passwordInput(['class'=>'form-control input-lg']) ?>

                        <div class="form-group">
                            <?= Html::submitButton('Daftar', ['class' => 'btn btn-primary btn-lg', 'name' => 'signup-button']) ?>
                        </div>

                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
