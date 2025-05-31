<?php
namespace frontend\components;

use Yii;
use yii\filters\AccessControl;

class MultiUserAccessControl extends AccessControl
{
    public $userComponents = ['staff', 'user'];

    public function beforeAction($action)
    {
        foreach ($this->userComponents as $component) {
            $user = Yii::$app->get($component);
            if (!$user->isGuest) {
                $this->user = $user; // MUHIM: AccessControl ning `user` properti
                break;
            }
        }

        return parent::beforeAction($action);
    }
}