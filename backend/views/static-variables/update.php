<?php



use yii\helpers\Html;

use common\components\StaticFunctions;



$this->title = Yii::t('main', 'Update Static Variables');

$this->params['breadcrumbs'][] = ['label' => Yii::t('main', 'Static Variables'), 'url' => ['index']];

$this->params['breadcrumbs'][] = ['label' => StaticFunctions::getPartOfText( $model->name, 50 ), 'url' => ['view', 'id' => $model->id]];

$this->params['breadcrumbs'][] = $this->title;

?>



<div class="container-fluid container-fixed-lg m-t-20">

    <div class="panel panel-transparent">

        <div class="panel-heading no-padding">
            <div class="panel panel-default">
                <div class="panel-body page-header-block">
                    <h2><?= Html::encode($this->title) ?></h2>
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