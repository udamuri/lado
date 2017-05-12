<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Daftar';
$this->params['breadcrumbs'][] = $this->title;
$jsx = <<< 'SCRIPT'
    $("#refresh-captcha").on('click',function(e){
        //#testimonials-captcha-image is my captcha image id
        $("img[id$='signupform-verifycode-image']").trigger('click');
        e.preventDefault();
    });
SCRIPT;
$this->registerJs($jsx);
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

                        <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                            'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                        ]) ?>

                        <?php echo Html::button('Refresh captcha', ['id' => 'refresh-captcha', 'class'=>'btn btn-default']);?>
                        <br>
                        <div class="clearfix"></div>

                        <div class="form-group">
                            <?= Html::submitButton('Daftar', ['class' => 'btn btn-primary btn-lg', 'name' => 'signup-button']) ?>
                        </div>

                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
