<?php

namespace frontend\widgets;
use yii\base\Widget;

class SectionHero extends Widget {

    public function run()
    {
        return $this->render('section-hero');
    }

}