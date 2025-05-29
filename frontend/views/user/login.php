<?php

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

?>
<div class="login-box">
      <div class="card card-outline card-primary">
        <div class="card-header">
          <div class="logo">
            <img src="/logo.png" alt="">
            Toshkent tibbiyot akademiyasi Termiz filiali
          </div>
          <p class="login-box-msg">Xujjatlar bilan ishlash tizimi</p>
        </div>
        <div class="card-body login-card-body">
          <?php $form = ActiveForm::begin(); ?>

          <?= $form->field($model,'username')->textInput(['placeholder' => $model->getAttributeLabel('username')])->label(false) ?>
          <?= $form->field($model,'password')->passwordInput(['placeholder' => $model->getAttributeLabel('password')])->label(false) ?>

          <?= Html::submitButton('Yuborish', ['class' => 'btn btn-primary w-100']) ?>
              
          <?php ActiveForm::end(); ?>
        </div>
        <!-- /.login-card-body -->
      </div>
    </div>