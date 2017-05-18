<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Setting Profil';
$this->params['breadcrumbs'][] = $this->title;
$act_p = '';
$act_pa = '';
$act_po = '';
$act_me = '';
if($type == 'profil')
{
	$act_p = 'class="active"';
}
else if($type == 'password')
{
	$act_pa = 'class="active"';
}
else if($type == 'photo')
{
	$act_po = 'class="active"';
}
else
{
	$act_p = 'class="active"';
}


if($type == 'message')
{
	$act_me = 'class="active"';
}

?>
<div class="container">
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="nav nav-pills" role="tablist">
					    <li role="presentation" <?=$act_p;?> ><a href="<?=Yii::$app->homeUrl?>profile">Profil</a></li>
					    <li role="presentation" <?=$act_pa;?> ><a href="<?=Yii::$app->homeUrl?>profile/password">Ganti Password</a></li>
					    <li role="presentation" <?=$act_po;?>><a href="<?=Yii::$app->homeUrl?>profile/photo">Foto</a></li>
					    <li role="presentation" <?=$act_me;?> ><a href="<?=Yii::$app->homeUrl?>profile/message">Pesan <span class="badge">3</span></a></li>
					</ul>
					<hr>
					<?php if($type == 'profil') { ?>

					<div class="row">
					    <div class="col-md-6">
					        <?= $this->render('_form_profile', ['model'=>$model, 'get'=>$get]);?>
					    </div>
					</div>
					<?php } ?>

                </div>
            </div>        
        </div>
    </div>
</div>