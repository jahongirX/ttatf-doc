<!-- td-hero-area-start -->
<img class="td-hero-2-bg-shape" src="/img/hero/hero-2/bg-shape.png" alt="">
<div class="td-hero-area td-hero-2-spacing fix">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="td-hero-2-wrap p-relative">
                    <div class="td-hero-2-thumb bg-position">

                        <video autoplay muted loop playsinline>
                            <source src="/videos/rolik.mp4" type="video/mp4">
                        </video>

                        <h2 class="td-hero-2-title wow td-animetion-left" data-wow-duration="1.5s" data-wow-delay="0.3s">
                            <?= \common\components\StaticFunctions::getSettings('conference_name'); ?>
                        </h2>
                    </div>
                    <div class="td-hero-social d-flex align-items-center">
                        <span><?=Yii::t('main','follow-us-on');?></span>
                        <span><a target="_blank" href="<?= \common\components\StaticFunctions::getSettings('youtube'); ?>"><i class="fa-brands fa-youtube"></i></a></span>
                        <span><a target="_blank" href="<?= \common\components\StaticFunctions::getSettings('telegram'); ?>"><i class="fa-brands fa-telegram"></i></a></span>
                        <span><a target="_blank" href="<?= \common\components\StaticFunctions::getSettings('instagram'); ?>"><i class="fa-brands fa-instagram"></i></a></span>
                        <span><a target="_blank" href="<?= \common\components\StaticFunctions::getSettings('facebook'); ?>"><i class="fa-brands fa-facebook"></i></a></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- td-hero-area-end -->