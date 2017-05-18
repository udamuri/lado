<?php

namespace app\modules\member\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use frontend\modules\member\models\ProfileForm;


/**
 * Default controller for the `member` module
 */
class SiteController extends Controller
{
	/**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index'],
                'rules' => [
                    [
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    //'index' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {

    	$request = Yii::$app->request;
		$get = $request->get();    	
    	$uid = Yii::$app->user->identity->id;
    	$type = 'profil';
    	$model = new ProfileForm();
    	$getm = $model->getmember($uid);
    	if( isset($get['type']) )
    	{
    		$type = $get['type'];
    	}

    	if($type == 'profil')
    	{
    		if ($model->load(Yii::$app->request->post())) {
	            if ($user = $model->update($uid)) {
	                \Yii::$app->getSession()->setFlash('success', 'Profil Berhasil di rubah');
	                return $this->refresh()->send();
	            }
	            else
	            {
	                 Yii::$app->session->setFlash('error', 'Error Message');
	                 return $this->refresh()->send();
	            }
	        }
    	}
    	//echo $type;
        return $this->render('index',
        	[
        		'type' => $type,
        		'model' => $model,
        		'get' => $getm,
        	]
        );
    }
}
