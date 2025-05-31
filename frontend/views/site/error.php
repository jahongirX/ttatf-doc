<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = nl2br(Html::encode($message));
?>

<!-- Page Banner Section Start -->
<div class="page-banner bg-color-05">
    <div class="page-banner__wrapper">
        <div class="container">

            <!-- Page Banner Caption Start -->
            <div class="page-banner__caption text-center">
                <h2 class="page-banner__main-title card p-5"><?=nl2br(Html::encode($message))?></h2>
            </div>
            <!-- Page Banner Caption End -->

        </div>
    </div>
</div>
<!-- Page Banner Section End -->


<!-- Blog Start -->
<div class="blog-section section-padding-01">

    <div class="container error_image">

        <div class="text-center">
            <img src="/images/error.jpg" alt="error" style="width: 60%">
        </div>
    </div>

</div>
