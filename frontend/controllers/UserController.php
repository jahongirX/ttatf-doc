<?php

namespace frontend\controllers;

use frontend\models\LoginForm;
use Yii;

class UserController extends CommonController
{
    public $layout = 'login';

    public function actionLogin(){
        $model = new LoginForm();
        if(Yii::$app->request->isPost && $model->load(Yii::$app->request->post()) && $model->login()){
            // $model->getUserByApi();
            return $this->goHome();
        }

        return $this->render('login',[
            'model' => $model
        ]);
    }
}
