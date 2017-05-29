<?php
namespace frontend\models;

use Yii;
use yii\base\Model;
use frontend\models\TablePost;
use frontend\models\TableCategory;
/**
 * Page form
 */
class NodeForm extends Model
{
   public $slug = '';

   public function checkSlug()
   {
        $urlAlias = TablePost::findOne(['post_url_alias'=>$this->slug]);

        if($urlAlias AND count($urlAlias) > 0) {
        	return $urlAlias;
    	}

    	return false;
   }
}