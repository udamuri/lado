<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Myalert;

AppAsset::register($this);

$b_name = Yii::$app->mycomponent->frontendOptions('_blog_name');
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

    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => '<i class="fa fa-user"></i>&nbsp;Daftar', 'url' => ['/signup']];
        $menuItems[] = ['label' => '<i class="fa fa-key"></i>&nbsp;Masuk', 'url' => ['/login']];
    } 
    else 
    {
        $menuItems[] = ['label' => '<i class="fa fa-key"></i>&nbsp;Keluar ('.Yii::$app->user->identity->username.')', 'url' => ['/site/logout'], 'linkOptions'=>['data-method'=>'post']];
    }

   
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-left'],
        'items' => $menuItems,
        'encodeLabels' => false ,
    ]);
    NavBar::end();
    ?>

<?php
  $mtop = '';
  $alert = Myalert::widget();
  if($alert!== '' || isset($this->params['breadcrumbs']))
  {
    $mtop = 'margin-top20';
  }
?>
<section class="container <?=$mtop;?>">
    <?= Breadcrumbs::widget([
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>
    <?= Myalert::widget(); ?>
</section>

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
                  <h4 class="text-center">Lado Mearh</h4>
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
                  <h4 class="text-center">Follow</h4>
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
