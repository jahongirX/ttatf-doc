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

class Sidebar extends Widget {

    public function run()
    {
        return $this->render('sidebar');
    }

}