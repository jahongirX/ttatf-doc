<?php

namespace app\controllers;

use Yii;

class UserController extends CommonController
{
    public $layout = 'login';

    public function actionLogin(){
        return $this->render('login');
    }
}
