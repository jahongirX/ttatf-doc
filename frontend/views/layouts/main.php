<?php

use yii\helpers\Html;
use frontend\assets\AppAsset;
use frontend\widgets\Footer;
use frontend\widgets\Header;
use frontend\widgets\Sidebar;

AppAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>

    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= Html::encode($this->title) ?></title>

    <?= Html::csrfMetaTags() ?>

    <?php $this->head() ?>

</head>

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">

    <?php $this->beginBody() ?>

    

    <!--begin::App Wrapper-->
    <div class="app-wrapper">

        <?= Header::widget(); ?>

        <?= Sidebar::widget(); ?>
        
        <main class="app-main">
            <?= $content;?>
        </main>

        <?= Footer::widget(); ?>

    </div>

    

    <?php $this->endBody() ?>

</body>

</html>

<?php $this->endPage() ?>
