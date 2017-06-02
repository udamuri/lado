<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\NotFoundHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use frontend\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use frontend\models\NodeForm;


/**
 * Site controller
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
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
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
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    

    /**
     * Logs in a user.
     *
     * @return mixed
     */

    
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }


    /**
     * Logs out the current user.
     *
     * @return mixed
     */

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }


    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Terima kasih sudah menghubungi kami. Kami akan menanggapi Anda sesegera mungkin.');
            } else {
                Yii::$app->session->setFlash('error', 'Terjadi kesalahan saat mengirim email.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }


    /**
     * Signs user up.
     *
     * @return mixed
     */

    
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                \Yii::$app->getSession()->setFlash('success', 'Berhasil Mendaftar Di Lado, Silahkan perikasa email untuk mengaktifkan akun anda');
                //$this->redirect(Yii::$app->homeUrl.'signup');
                return $this->refresh()->send();
            }
            else
            {
                 Yii::$app->session->setFlash('error', 'Error Message');
                 return $this->refresh()->send();
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }



    /**
     * Requests password reset.
     *
     * @return mixed
     */
    
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Periksa email Anda untuk petunjuk lebih lanjut.');
                return $this->refresh();
            } else {
                Yii::$app->session->setFlash('error', 'Maaf, kami tidak dapat mereset kata sandi untuk email yang diberikan.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */

    
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password was saved.');

            return $this->refresh();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }
    
     /**
     * Requests Node.
     *
     * @param string $slug
     * @return mixed
     */
    public function actionNode($slug)
    {
        $model = new NodeForm;
        $model->slug = $slug;
        if($model->checkSlug() && is_array($model->checkSlug())) {
            return $this->render('node', [
                'model' => $model->checkSlug(),
            ]);
        } else {
            throw new NotFoundHttpException('Halaman tidak ditemukan.');
        }
    
    }
}
