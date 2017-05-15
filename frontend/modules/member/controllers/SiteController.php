<?php

namespace app\modules\member\controllers;

use yii\web\Controller;

/**
 * Default controller for the `member` module
 */
class SiteController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}
