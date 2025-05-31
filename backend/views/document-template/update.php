<?php



use yii\helpers\Html;

use common\components\StaticFunctions;
use yii\helpers\Url;

$this->title = Yii::t('main', 'Update Document Template');

$this->params['breadcrumbs'][] = ['label' => Yii::t('main', 'Document Templates'), 'url' => ['index']];

$this->params['breadcrumbs'][] = ['label' => StaticFunctions::getPartOfText( $model->id, 50 ), 'url' => ['view', 'id' => $model->id]];

$this->params['breadcrumbs'][] = $this->title;


?>


<div class="container-fluid container-fixed-lg m-t-20">

    <div class="panel panel-transparent">

        <div class="panel-heading no-padding">
            <div class="panel panel-default">
                <div class="panel-body page-header-block">
                    <h2><?= Html::encode($this->title) ?></h2>

                    <a target="_blank" href="<?=Url::to(['/document-template/pdf','id' => $model->id])?>" class="btn btn-success">PDF shaklda ko'rish</a>
                </div>
            </div>
        </div>

        <div class="panel-body no-padding row-default">

            <div class="row">

                <?= $this->render('_form', [
                    'model' => $model,
                ]) ?>

            </div>

        </div>
    </div>

</div>