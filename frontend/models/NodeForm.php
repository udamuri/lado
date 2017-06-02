<?php
namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\Pagination;
use frontend\models\TablePost;
use frontend\models\TableCategory;
use app\components\Constants;

/**
 * Page form
 */
class NodeForm extends Model
{
   public $slug = '';

   public function checkSlug()
   {
   		$arrPage = [];
        $urlAlias = TablePost::findOne(['post_url_alias'=>$this->slug]);

        if($urlAlias AND count($urlAlias) > 0) {
        	$arrPage = [
        		'id' => $urlAlias['post_id'], 
        		'title' => $urlAlias['post_title'], 
        		'type' => 'page', 
        		'alias' => $urlAlias['post_url_alias'], 
        		'date' => $urlAlias['post_date'], 
        		'modified' => $urlAlias['post_modified'], 
        		'excerpt' => $urlAlias['post_excerpt'],
        		'data' => $urlAlias['post_content']
        	];

        	return $arrPage;

    	} else {
    		$urlAlias = TableCategory::findOne(['category_name'=>$this->slug]);

    		if($urlAlias AND count($urlAlias) > 0) {

    			$arrPage = [
	        		'id' => $urlAlias['category_id'], 
	        		'title' => $urlAlias['category_name'], 
	        		'type' => 'post', 
	        		'alias' => $urlAlias['category_name'], 
	        		'date' => $urlAlias['category_date'], 
	        		'modified' => $urlAlias['category_date'], 
	        		'excerpt' => '',
	        		'data' => $this->post($urlAlias['category_id'])
	        	];

    			return $arrPage;
    		}

    		return false;
    	}

    	return false;
   }

   private function post($_cid = 0, $_search = '')
   {
   		$search = $_search;
  
        $query = (new \yii\db\Query())
                    ->select([
                        'tp.post_id',
                        'tp.post_category_id',
                        'tp.post_title',
                        'tp.post_url_alias',
                        'tp.post_excerpt',
                        'tp.post_date',
                        'tp.post_modified',
                        'tp.post_status',
                        'tp.user_id',
                        'tc.category_name'
                    ])
                    ->from('tbl_post tp')
                    ->leftJoin('tbl_category tc', 'tc.category_id = tp.post_category_id')
                    ->where(['post_type'=>1])
                    ->andWhere(['post_category_id'=>$_cid]);
                    
        if($search !== '') {
            $query->andWhere('lower(post_title) LIKE "%'.$search.'%" ');
        }
        
        $countQuery = clone $query;
        $pageSize = 5;
        $pages = new Pagination([
                'totalCount' => $countQuery->count(), 
                'pageSize'=>$pageSize
            ]);
        $models = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->orderBy(['post_id'=>SORT_DESC])
            ->all();
            
        return [
            'models' => $models,
            'pages' => $pages,
            'offset' =>$pages->offset,
            'page' =>$pages->page,
            'search' =>$search,
        ];
   } 
}