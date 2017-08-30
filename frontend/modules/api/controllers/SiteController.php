<?php

namespace app\modules\api\controllers;

use yii\web\Controller;
use yii\web\Request;
use yii\web\Response;
use yii\helpers\Json;
use yii\filters\auth\CompositeAuth;
use frontend\modules\member\models\Member;

/**
 * Site controller for the `api` module
 */
class SiteController extends Controller
{

    // public function behaviors(){
    //     $behaviors = parent::behaviors();
    //     $behaviors['authenticator'] = [
    //         'class' => CompositeAuth::className(),
    //     ];
    //     return $behaviors;
    // }

	protected function verbs()
    {
       return [
           'index' => ['GET'],
       ];
    }

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $examples = Member::find()->all();
        return [
            'data'=>$examples,
        ];
    }
}
