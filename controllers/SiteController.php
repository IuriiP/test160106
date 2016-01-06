<?php namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\helpers\Url;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Auth;
use app\models\User;
use app\models\Fbposts;

class SiteController extends Controller {

    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
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

    public function actions() {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
            'auth' => [
                'class' => 'yii\authclient\AuthAction',
                'successCallback' => [$this, 'onAuthSuccess'],
            ],
        ];
    }

    public function onAuthSuccess($client) {
        $attributes = $client->getUserAttributes();

        /* @var $auth Auth */
        $auth = Auth::find()->where([
                    'source' => $client->getId(),
                    'source_id' => $attributes['id'],
                ])->one();

        if (Yii::$app->user->isGuest) {
            if ($auth) {
                $user = $auth->user;
                Yii::$app->user->login($user);
            } else {
                $password = Yii::$app->security->generateRandomString(6);
                $user = new User([
                    'username' => $attributes['name'],
                    'email' => $attributes['email'],
                    'password' => $password,
                ]);
                if ($user->save()) {
                    $auth = new Auth([
                        'user_id' => $user->id,
                        'source' => $client->getId(),
                        'source_id' => (string) $attributes['id'],
                    ]);
                    if ($auth->save()) {
                        Yii::$app->user->login($user);
                    }
                }
            }
        } elseif (!$auth) {
            $auth = new Auth([
                'user_id' => Yii::$app->user->id,
                'source' => $client->getId(),
                'source_id' => $attributes['id'],
            ]);
            $auth->save();
        }
        $this->action->successUrl = Url::to(['/']);
        
        // GRAB POSTS
        Fbposts::grabSocial($client);
    }

    public function actionIndex() {
        return $this->render('index');
    }

    public function actionLogin() {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
                    'model' => $model,
        ]);
    }

    public function actionLogout() {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact() {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
                    'model' => $model,
        ]);
    }

    public function actionAbout() {
        return $this->render('about');
    }

}
