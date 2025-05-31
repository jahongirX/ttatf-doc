<?php

namespace frontend\controllers;

use frontend\models\LoginForm;
use frontend\models\STaffLoginForm;
use Yii;

class UserController extends CommonController
{
    public $layout = 'login';

    public function actionLogin(){
        $model = new LoginForm();
        $staffModel = new StaffLoginForm();
        
        if( !Yii::$app->user->isGuest ){
            return $this->redirect('/student');
        }

        if( !Yii::$app->staff->isGuest ){
            return $this->redirect('/staff');
        }

        
        if( Yii::$app->request->isPost && $model->load(Yii::$app->request->post()) && $model->login()){
            return $this->redirect('/student');
        }

        if(Yii::$app->request->isPost && $staffModel->load(Yii::$app->request->post()) && $staffModel->login()){
            return $this->redirect('/staff');
        }

        return $this->render('login',[
            'model' => $model,
            'staffModel' => $staffModel
        ]);
    }

    public function actionLogout(){
        if( !Yii::$app->user->isGuest ){
            Yii::$app->user->logout();
        }

        if( !Yii::$app->staff->isGuest ){
            Yii::$app->staff->logout();
        }

        $this->refresh();
    }
}
