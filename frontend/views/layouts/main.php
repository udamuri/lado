<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
// use common\widgets\Myalert;
use frontend\widgets\Alert;

AppAsset::register($this);

$b_name = Yii::$app->mycomponent->frontendOptions('_blog_name').' '.$this->title;
if(!$b_name)
{
    $b_name = $this->title;
}

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?=Html::encode($b_name);?></title>
    <link rel="icon" href="<?=Yii::$app->homeUrl;?>/css/img/logo_50.png?<?=time();?>">
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

    <?php
    NavBar::begin([
        'brandLabel' => '<img src="'.Yii::$app->homeUrl.'css/img/lado.png">',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-default navbar-fixed-top',
        ],
    ]);
            $menuItems = [
                ['label' => '<i class="fa fa-home"></i>&nbsp;Dashboard', 'url' => ['/dashboard']],
            ];

            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-left'],
                'items' => $menuItems,
                'encodeLabels' => false ,
            ]);

            $menuItems_r = [];
            if (Yii::$app->user->isGuest) {
                $menuItems_r[] = ['label' => '<i class="fa fa-user"></i>&nbsp;Daftar', 'url' => ['/signup']];
                $menuItems_r[] = ['label' => '<i class="fa fa-key"></i>&nbsp;Masuk', 'url' => ['/login']];
            } 
            else 
            {
                //$menuItems_r[] = ['label' => '<i class="fa fa-key"></i>&nbsp;Keluar ('.Yii::$app->user->identity->username.')', 'url' => ['/site/logout'], 'linkOptions'=>['data-method'=>'post']];

                $menuItems_r[] = '<li class="dropdown padding_null">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" ><img class="profile_picture_header its_me_class_bro" src="'.Yii::$app->mycomponent->userAvatar(Yii::$app->user->identity->id).'"/></a>
                          <ul class="dropdown-menu" role="menu">
                            <li class="dropdown-header">'.Yii::$app->user->identity->firstname.' '.Yii::$app->user->identity->lastname.'</li>
                            <li class="divider"></li>
                            <li><a href="'.Yii::$app->homeUrl.'profile"><i class="fa fa-user icon-mn"></i>&nbsp;Setting Profile</a></li>
                            <li class="divider"></li>
                            <li><a href="'.Yii::$app->homeUrl.'site/logout" data-method="post"><i class="fa fa-key icon-mn"></i>&nbsp;Logout</a></li>
                          </ul>
                        </li>';
            }

            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => $menuItems_r,
                'encodeLabels' => false ,
            ]);
    NavBar::end();
    ?>

<?php
$isFrontpage = false;
$controllerl = Yii::$app->controller;
$homecheker = Yii::$app->controller->module->id.'/'.$controllerl->id.'/'.$controllerl->action->id;
if($homecheker=='app-frontend/site/index')
{
    $isFrontpage = true;
}
?>

<?php if(!$isFrontpage) { ?>
<section class="container margin-top20">
    <?= Breadcrumbs::widget([
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>
    <?= Alert::widget() ?>
</section>
<?php } ?>

<?= $content ?>      

<footer id="footer">
    <div class="footer-head">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
                <p>Lado Mearah, Melayani Pemesanan lado secara online langsung dari petani</p>
            </div>
          </div>
        </div>
        
    </div>

    <div class="footer-content">
        <div class="container">
          <div class="row">
              <div class="col-md-4 col-sm-12 col-xs-12">
                  <h4 class="text-center">Lado Merah</h4>
                  <p>
                    77 Beach Drive, St. Croix, , Virgin Islands, 5689 
                  </p>
                  <p>
                    Phone: 456-555-212 Fax: 456-555-212 E-Mail: name@email.com.tc <?=Yii::$app->mycomponent->getCopy(2016);?>  Lado Merah 
                  </p>
              </div> 

              <div class="col-md-4 col-sm-12 col-xs-12">
                  <h4 class="text-center">Perusahaan</h4>
                  <ul>
                    <li><a href="#">Tentang Kami</a></li>
                    <li><a href="#">Kerjasama ?</a></li>
                    <li><a href="#">Petani Mitra</a></li>
                    <li><a href="#">Rumah Makan Mitra</a></li>
                  </ul> 
              </div>  

              <div class="col-md-4 col-sm-12 col-xs-12">
                  <h4 class="text-center">Ikuti</h4>
                   <p class="text-center">
                      <a href="#"><i class="fa fa-facebook-official me-fb" aria-hidden="true"></i></a>
                      <a href="#"><i class="fa fa-twitter-square me-twit" aria-hidden="true"></i></a>
                      <a href="#"><i class="fa fa-github me-git" aria-hidden="true"></i></a>
                      <a href="#"><i class="fa fa-instagram me-insta" aria-hidden="true"></i></a>
                      <a href="#"><i class="fa fa-linkedin-square me-linked" aria-hidden="true"></i></a>
                      <a href="#"><i class="fa fa-youtube me-tube" aria-hidden="true"></i></a>
                  </p>
              </div>    
          </div>
        </div>
    </div>

    <div class="footer-text text-center">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
                <p>&copy; <?=Yii::$app->mycomponent->getCopy(2016);?> lado <a href="#">Privasi</a></p>
            </div>
          </div>
        </div>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
