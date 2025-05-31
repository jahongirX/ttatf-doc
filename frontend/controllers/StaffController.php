<?php
namespace frontend\controllers;

use yii\filters\AccessControl;
use frontend\controllers\CommonController;

class StaffController extends CommonController
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'user' => 'staff', // MUHIM: faqat Yii::$app->staff ni ishlatadi
                'denyCallback' => function () {
                    throw new \yii\web\ForbiddenHttpException('Siz hodim sifatida tizimga kirmagansiz.');
                },
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'], // staff login bo‘lsa
                    ],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }
}