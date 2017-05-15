<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
use app\components\Constants;

/* @var $this yii\web\View */

$this->title = Yii::$app->name;
$this->params['breadcrumbs'][] = $this->title;
$this->registerJsFile(Yii::$app->homeUrl."js/home.js", ['depends' => [\yii\web\JqueryAsset::className()]]);
//$this->registerCssFile(Yii::$app->homeUrl.'css/lates_product.css', [
    //'depends' => [\yii\bootstrap\BootstrapAsset::className()],
    //'media' => 'print',
//]);

$jsx = <<< 'SCRIPT'
    HomeObj.initialScript();
SCRIPT;
$this->registerJs('HomeObj.baseUrl = "'. Yii::$app->homeUrl.'"');
$this->registerJs($jsx);

$b_name = Yii::$app->mycomponent->frontendOptions('_blog_name');
if(!$b_name)
{
    $b_name = $this->title;
}

$b_desc = Yii::$app->mycomponent->frontendOptions('_blog_description');
if(!$b_desc)
{
    $b_desc = '';
}

$b_feature = Yii::$app->mycomponent->frontendOptions('_feature');
if($b_feature)
{
  	$myfeature = Yii::$app->mycomponent->getHomeCategory($b_feature, 3, 'asc');
}

?>

<section class="header">

</section>

<section class="container margin-top20">
    <div class="feature">
      <div class="panel panel-default">
          <div class="panel-body">
              <div class="row">
                <div class="col-md-3 col-sm-2 col-xs-12 hidden-xs">
                    <h1><img src="<?=Yii::$app->homeUrl?>css/img/buffalo.jpeg" class="img-responsive img-thumbnail"></h1>
                </div>

                <div class="col-md-9 col-sm-10 col-xs-12">

                      <h3><?=$b_name;?></h3>
                      <hr/>
                      <?=Html::decode($b_desc);?>
                </div>
              </div>
            </div>
      </div>

      
      <div class="panel panel-default">
          <div class="panel-body">
            <div class="row">
            	<?php
            		if(isset($myfeature) && is_array($myfeature))
            		{
            			foreach ($myfeature as $value) {
            				echo '

            					<div class="col-md-4 col-sm-12 col-xs-12">
				                  	<h3>'.$value['post_title'].'</h3>
				                  	<hr/>
				                  	<p>
				                      	'.Html::decode($value['post_excerpt']).' 
				                	</p>
				                	<a href="'.Yii::$app->homeUrl.$value['post_url_alias'].'" class="btn btn-success" >Baca...</a>
				                </div>
            				';
            			}
            		}
            		else
            		{
            			echo '
            				<div class="col-md-4 col-sm-12 col-xs-12">
				                  <h3><i class="fa fa-truck" aria-hidden="true"></i> Lorem Ipsum Dolor Sit Amet</h3>
				                  <hr/>
				                  <p>
				                      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut feugiat neque et interdum euismod. Donec tempus tempus justo, at finibus nunc tincidunt vitae. Nulla lobortis metus at tortor semper auctor. Suspendisse potenti. Nullam in orci nibh. Ut eleifend volutpat mauris a feugiat. Integer urna augue, dictum vitae ultricies ut, molestie fermentum neque. Integer congue condimentum ex, non aliquet ex hendrerit ac. Donec lorem sapien, varius vel tellus quis, facilisis commodo arcu. Suspendisse lacinia viverra sodales. 
				                  </p>
				            </div>

				            <div class="col-md-4 col-sm-12 col-xs-12">
				                  <h3><i class="fa fa-shopping-basket" aria-hidden="true"></i> Lorem Ipsum Dolor Sit Amet</h3>
				                  <hr/>
				                  <p>
				                      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut feugiat neque et interdum euismod. Donec tempus tempus justo, at finibus nunc tincidunt vitae. Nulla lobortis metus at tortor semper auctor. Suspendisse potenti. Nullam in orci nibh. Ut eleifend volutpat mauris a feugiat. Integer urna augue, dictum vitae ultricies ut, molestie fermentum neque. Integer congue condimentum ex, non aliquet ex hendrerit ac. Donec lorem sapien, varius vel tellus quis, facilisis commodo arcu. Suspendisse lacinia viverra sodales. 
				                  </p>
				            </div>

				            <div class="col-md-4 col-sm-12 col-xs-12">
				                  <h3><i class="fa fa-home" aria-hidden="true"></i> Lorem Ipsum Dolor Sit Amet</h3>
				                  <hr/>
				                  <p>
				                      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut feugiat neque et interdum euismod. Donec tempus tempus justo, at finibus nunc tincidunt vitae. Nulla lobortis metus at tortor semper auctor. Suspendisse potenti. Nullam in orci nibh. Ut eleifend volutpat mauris a feugiat. Integer urna augue, dictum vitae ultricies ut, molestie fermentum neque. Integer congue condimentum ex, non aliquet ex hendrerit ac. Donec lorem sapien, varius vel tellus quis, facilisis commodo arcu. Suspendisse lacinia viverra sodales. 
				                  </p>
				            </div>
            			';
            		}
            	?>
            </div>
          </div>
      </div>

      
      <div class="panel panel-default">
          <div class="panel-body">
             <!-- start -->
            <div class="row">
                <div class="col-md-12 text-center"><h3>Produk Kami</h3><hr/></div>
            </div>

            <div id="mycarouselx" class="row margin-top20">
                <div class="col-md-12">
                <div class="carousel slide" data-ride="carousel" data-type="multi" data-interval="3000" id="myCarousel">
                  <div class="carousel-inner">
                    <div class="item active">
                      <div class="col-md-3 col-sm-6 col-xs-12">
                          <div class="panel panel-self">
                            <div class="panel-heading">Panel heading without title</div>
                            <div class="panel-body">
                                <div class="image-header">
                                    <img src="<?=Yii::$app->homeUrl?>css/img/buffalo.jpeg" class="img-responsive center-block">
                                </div>

                                <div class="caro-text">
                                    is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
                                </div>
                            </div>
                            <div class="panel-footer">Panel footer</div>
                          </div> 
                      </div>
                    </div>
                    <div class="item">
                      <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="panel panel-self">
                            <div class="panel-heading">Panel heading without title</div>
                            <div class="panel-body">
                                <div class="image-header">
                                    <img src="<?=Yii::$app->homeUrl?>css/img/buffalo.jpeg" class="img-responsive center-block">
                                </div>

                                <div class="caro-text">
                                    is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
                                </div>
                            </div>
                            <div class="panel-footer">Panel footer</div>
                          </div> 
                      </div>
                    </div>
                    <div class="item">
                      <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="panel panel-self">
                            <div class="panel-heading">Panel heading without title</div>
                            <div class="panel-body">
                                <div class="image-header">
                                    <img src="<?=Yii::$app->homeUrl?>css/img/buffalo.jpeg" class="img-responsive center-block">
                                </div>

                                <div class="caro-text">
                                    is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
                                </div>
                            </div>
                            <div class="panel-footer">Panel footer</div>
                          </div> 
                      </div>
                    </div>
                    <div class="item">
                      <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="panel panel-self">
                            <div class="panel-heading">Panel heading without title</div>
                            <div class="panel-body">
                                <div class="image-header">
                                    <img src="<?=Yii::$app->homeUrl?>css/img/buffalo.jpeg" class="img-responsive center-block">
                                </div>

                                <div class="caro-text">
                                    is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
                                </div>
                            </div>
                            <div class="panel-footer">Panel footer</div>
                          </div> 
                      </div>
                    </div>
                    <div class="item">
                      <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="panel panel-self">
                            <div class="panel-heading">Panel heading without title</div>
                            <div class="panel-body">
                                <div class="image-header">
                                    <img src="<?=Yii::$app->homeUrl?>css/img/buffalo.jpeg" class="img-responsive center-block">
                                </div>

                                <div class="caro-text">
                                    is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
                                </div>
                            </div>
                            <div class="panel-footer">Panel footer</div>
                          </div> 
                      </div>
                    </div>
                    <div class="item">
                      <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="panel panel-self">
                            <div class="panel-heading">Panel heading without title</div>
                            <div class="panel-body">
                                <div class="image-header">
                                    <img src="<?=Yii::$app->homeUrl?>css/img/buffalo.jpeg" class="img-responsive center-block">
                                </div>

                                <div class="caro-text">
                                    is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
                                </div>
                            </div>
                            <div class="panel-footer">Panel footer</div>
                          </div> 
                      </div>
                    </div>
                    <div class="item">
                      <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="panel panel-self">
                            <div class="panel-heading">Panel heading without title</div>
                            <div class="panel-body">
                                <div class="image-header">
                                    <img src="<?=Yii::$app->homeUrl?>css/img/buffalo.jpeg" class="img-responsive center-block">
                                </div>

                                <div class="caro-text">
                                    is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
                                </div>
                            </div>
                            <div class="panel-footer">Panel footer</div>
                          </div> 
                      </div>
                    </div>
                    <div class="item">
                      <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="panel panel-self">
                            <div class="panel-heading">Panel heading without title</div>
                            <div class="panel-body">
                                <div class="image-header">
                                    <img src="<?=Yii::$app->homeUrl?>css/img/buffalo.jpeg" class="img-responsive center-block">
                                </div>

                                <div class="caro-text">
                                    is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
                                </div>
                            </div>
                            <div class="panel-footer">Panel footer</div>
                          </div> 
                      </div>
                    </div>
                  </div>
                  <a class="left carousel-control" href="#myCarousel" data-slide="prev"><i class="glyphicon glyphicon-chevron-left"></i></a>
                  <a class="right carousel-control" href="#myCarousel" data-slide="next"><i class="glyphicon glyphicon-chevron-right"></i></a>
                </div>
                </div>
                <!-- end -->
            </div>
          </div>
      </div>

    </div>
</section>
