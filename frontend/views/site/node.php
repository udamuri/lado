<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
use app\components\Constants;
use yii\data\Pagination;

/* @var $this yii\web\View */

// $this->title = Yii::$app->name;
// $this->params['breadcrumbs'][] = $this->title;
// $this->registerJsFile(Yii::$app->homeUrl."js/node.js", ['depends' => [\yii\web\JqueryAsset::className()]]);

$this->title = $model['title'];
$this->params['breadcrumbs'][] = $this->title;
?>

<section class="container">
    <div class="feature">
      <div class="panel panel-default">
          <div class="panel-body page-min-height">
            <div class="row">
                <?php
                    echo '<div class="col-md-12 col-sm-12 col-xs-12">';
                    if($model['type'] === 'page') {
                        echo Html::decode($model['data']);
                    }
                    echo '</div>';
                ?>

                <?php
                    if($model['type'] === 'post') {
                        $b_desc = Yii::$app->mycomponent->frontendOptions('_blog_description');
                        if(!$b_desc)
                        {
                            $b_desc = '';
                        }

                        $data = $model['data'];
                        $offset = $data['offset'];
                        $page = $data['page'];
                        $pages = $data['pages'];
                        $models = $data['models'];
                        $start = (int)$offset * (int)$page;
                        echo '<div class="col-md-8">';
                        foreach ($models as $value) {
                            echo  '<h3>
                                      <a href="'.Yii::$app->homeUrl.$value['post_url_alias'].'">'.$value['post_title'].'</a>
                                  </h3>
                                  <p>
                                    <span class="glyphicon glyphicon-time"></span> Posted on August 28, 2013 at 10:00 PM
                                  </p>
                                  <hr>
                                  <img class="img-responsive" src="'.Yii::$app->homeUrl.'css/img/header1.jpeg" alt="">
                                  <hr>
                                  <p>'.Html::decode($value['post_excerpt']).'</p>
                                  <a class="btn btn-success" href="'.Yii::$app->homeUrl.$value['post_url_alias'].'">Baca... <span class="glyphicon glyphicon-chevron-right"></span></a>
                                  <hr>';
                        }

                        echo '<div class="text-center">';
                        //display pagination
                        echo LinkPager::widget([
                            'pagination' => $pages,
                        ]);
                        echo '</div>';
                        echo '</div>';
                    }
                ?>

                 <?php if($model['type'] === 'post') { ?>
                    <!-- Blog Sidebar Widgets Column -->
                    <div class="col-md-4">

                        <!-- Blog Search Well -->
                        <div class="well">
                            <h4>Cari <?=$this->title;?></h4>
                            <div class="input-group">
                                <input type="text" class="form-control">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">
                                        <span class="glyphicon glyphicon-search"></span>
                                </button>
                                </span>
                            </div>
                            <!-- /.input-group -->
                        </div>

                        <!-- Side Widget Well -->
                        <div class="well">
                            <h4>Lado Merah</h4>
                            <p><?=Html::decode($b_desc);?></p>
                        </div>

                    </div>
                 <?php } ?>
              
            </div>
          </div>
      </div>
    </div>
</section>
