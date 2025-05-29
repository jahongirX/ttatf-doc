<?php

use common\components\StaticFunctions;
?>

<!-- td-countdown-area-start -->
<div class="td-countdown-area pt-50">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-3 col-lg-5 wow fadeInUp" data-wow-duration=".9s" data-wow-delay=".2s">
                <div class="td-countdown-2-title mb-40">
                    <h2 class="title"><?=Yii::t('main','hurry-up')?></h2>
                    <span class="subtitle"><?=Yii::t('main','register-now')?></span>
                </div>
            </div>
            <div class="col-xl-5 col-lg-7 wow fadeInUp" data-wow-duration=".9s" data-wow-delay=".4s">
                <div class="td-hero-countdown td-countdown-2-wrap mb-20">
                    <ul class="deal-counter ml0-md" id="timer">
                        <li class="list-inline-item days mb-20"></li>
                        <li class="list-inline-item hours  mb-20"></li>
                        <li class="list-inline-item minutes  mb-20"></li>
                        <li class="list-inline-item seconds  mb-20"></li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-4 col-lg-5 wow fadeInUp" data-wow-duration=".9s" data-wow-delay=".6s">
                <div class="td-countdown-2-location-wrap text-end mb-40">
                    <div class="td-countdown-2-location text-start p-relative">
                        <span class="td-countdown-2-location-icon">
                            <svg width="50" height="60" viewBox="0 0 50 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M47.5 25C47.5 42.5 25 57.5 25 57.5C25 57.5 2.5 42.5 2.5 25C2.5 19.0326 4.87053 13.3097 9.0901 9.0901C13.3097 4.87053 19.0326 2.5 25 2.5C30.9674 2.5 36.6903 4.87053 40.9099 9.0901C45.1295 13.3097 47.5 19.0326 47.5 25Z" stroke="#3A1EE7" stroke-width="5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M25 32.5C29.1421 32.5 32.5 29.1421 32.5 25C32.5 20.8579 29.1421 17.5 25 17.5C20.8579 17.5 17.5 20.8579 17.5 25C17.5 29.1421 20.8579 32.5 25 32.5Z" stroke="#3A1EE7" stroke-width="5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </span>
                        <h5 class="title"><?=StaticFunctions::getSettings('location-text')?></h5>
                        <span class="subtitle"><?=StaticFunctions::getSettings('conference-date')?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- td-countdown-area-end -->