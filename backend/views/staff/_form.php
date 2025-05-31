<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->params['breadcrumbs'][] = ['label' => Yii::t('main', 'Staff'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="">
    <div class="row">
        <div class="col-lg-8">
            <?php
            $namev = isset($userm) ? $userm->username : '';
            $emailv = isset($userm) ? $userm->email : '';
            ?>
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
                <div class="panel panel-default">

                    <div class="panel-body">

                        <?= $form->field($model, 'username')->textInput(['autofocus' => true, 'value' => $namev]) ?>

                        <?= $form->field($model, 'email')->input('email', ['value' => $emailv]) ?>

                        <?= $form->field($model, 'password')->passwordInput() ?>

                        <?= $form->field($model, 'hemis_staff_id')->textInput() ?>

                        <div class="form-group">
                            <?= Html::submitButton('Qo\'shish', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                        </div>

                    </div>

                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
