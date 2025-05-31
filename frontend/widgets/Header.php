<?php

namespace frontend\widgets;

use common\components\StaticFunctions;
use common\models\Languages;
use common\models\Menu;
use common\models\NewsCategory;
use common\models\SearchForm;
use common\models\SiteUser;
use Yii;
use yii\base\Widget;

class Header extends Widget {

    public function run()
    {
        $user = (! Yii::$app->user->isGuest ) ? Yii::$app->user : Yii::$app->staff;

        return $this->render('header',[
            'user' => $user
        ]);
    }

}