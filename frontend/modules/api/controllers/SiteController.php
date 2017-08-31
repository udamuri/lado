<?php

namespace app\modules\api\controllers;

use yii;
use yii\web\Controller;
use yii\web\Request;
use yii\web\Response;
use yii\helpers\Json;
use yii\filters\VerbFilter;
use frontend\modules\member\models\Member;

/**
 * Site controller for the `api` module
 */
class SiteController extends Controller
{
    public $enableCsrfValidation = false;

    public function beforeAction($action)
    {
        if (in_array($action->id, ['incoming'])) {
            $this->enableCsrfValidation = false;
        }
        return parent::beforeAction($action);
    }

	/**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'index' => ['get'],
                    'login' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        \Yii::$app->response->format = Response::FORMAT_JSON;
        return ['status'=>true, 'message'=>'just test'];
    }

    public function actionLogin()
    {
        try {
            $headers = Yii::$app->request->headers;
            $arrData = ['error'=>true,'errorMessage'=>'The MIME media type for JSON text is application/json.'];
            if($headers['content-type'] === 'application/json') {
                $request = file_get_contents('php://input');
                $arrData = [
                    'error' => false,
                    'data' => $request
                ];
            }
            \Yii::$app->response->format = Response::FORMAT_JSON;
            return $arrData;
        } catch (Exception $e) {
            \Yii::$app->response->format = Response::FORMAT_JSON;
            return ['error'=>true, 'errorMessage'=>$e];
        }
    }
}
