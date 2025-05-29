<?php
/**
 * Created by PhpStorm.
 * User: Professor
 * Date: 12.12.2016
 * Time: 21:24
 */

namespace common\components;
use yii\captcha\CaptchaAction;

class MyCaptchaAction extends CaptchaAction
{
    private $_mathExpression;

    protected function generateVerifyCode()
    {
        $a = mt_rand(1, 9);
        $b = mt_rand(1, 9);
        $op = mt_rand(0, 1) ? '+' : '-';

        $this->_mathExpression = "$a $op $b";

        return (string)eval("return $a $op $b;");
    }

    protected function getText($code)
    {
        return $this->_mathExpression;
    }
}