<?php
$_SESSION['KCFINDER']['disabled'] = false;


use yii\helpers\Html;

use yii\widgets\ActiveForm;



$this->registerJsFile('/plugins/bootstrap-select2/select2.min.js',['depends' => [\yii\web\JqueryAsset::className()]]);



?>



<script type="text/javascript" src="/ckeditor/ckeditor.js"></script>

<script type="text/javascript" src="/ckfinder/ckfinder.js"></script>



<?php $form = ActiveForm::begin([


    'enableAjaxValidation' => false,

    'enableClientValidation' => true,

    'errorCssClass' => '',

    'options' => ['enctype' => 'multipart/form-data']

]); ?>



    <div class="col-md-8">

        <div class="panel panel-default">

            <div class="panel-body">

                <div class="alert alert-warning">
                    Shablonlarda o'zgaruvchilarni ishlatish {{nom}} shaklida foydalanish zarur. O'zgaruvchilar statik hamda API o'zgaruvchilar bo'lish mumkin. Quydiga siz mumkin bo'lgan o'zgaruvchilar ro'yxatini ko'rishingiz mumkin!
                </div>

                <?= $form->field($model, 'name')->textInput() ?>

                <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>
        
            </div>

        </div>

    </div>

    <div class="col-md-4">



        <div class="panel panel-default">

            <?php

            if($model->isNewRecord){

                $model->status = true;

            }

            ?>

            <div class="panel-body">
                <?= $form->field($model, 'allowed_roles')->dropDownList([
                    '1' => 'Barchaga',
                    '2' => 'Talabalar',
                    '3' => 'Hodimlar'
                ],['class'=>'full-width multi']) ?>

                <?= $form->field($model, 'status',

                ['options' =>

                    ['class' => 'form-group form-group-default input-group'],

                    'template' => '<label class="inline" for="news-status">' . Yii::t("main", "Status") . '</label><span class="input-group-addon bg-transparent">{input}</span>',

                    'labelOptions' => ['class' => 'inline']

                ])->checkbox([

                'data-init-plugin' => 'switchery',

                'data-color' => 'primary'

            ], false);

            ?>
            </div>

        </div>

    </div>



    <div class="col-md-12">



        <?=  Html::submitButton($model->isNewRecord ? Yii::t('main', 'Create') :  Yii::t('main', 'Update'), ['class' => 'btn btn-primary']) ?>



    </div>



<?php ActiveForm::end(); ?>

<script type="text/javascript">

    var editor = CKEDITOR.replace( 'documenttemplate-body', {

        filebrowserBrowseUrl : '/kcfinder/browse.php?opener=ckeditor&type=files',

        filebrowserImageBrowseUrl : '/kcfinder/browse.php?opener=ckeditor&type=images',

        filebrowserFlashBrowseUrl : '/kcfinder/browse.php?opener=ckeditor&type=flash',

        filebrowserUploadUrl : '/kcfinder/upload.php?opener=ckeditor&type=files',

        filebrowserImageUploadUrl : '/kcfinder/upload.php?opener=ckeditor&type=images',

        filebrowserFlashUploadUrl : '/kcfinder/upload.php?opener=ckeditor&type=flash'

    });

    CKFinder.setupCKEditor( editor, '../' );

</script>