<?php

use common\models\Menu;
use common\models\Resource;
use common\models\ResourceCategory;
use yii\helpers\Url;

function renderMenu($id){

    $out = '';
    $menu = Menu::find()->where('status=1')->andWhere(['id' => $id, 'type' => 0])->one();
    $_query = Menu::find()->where('status=1')->andWhere(['parent' => $id, 'type' => 0]);
    $menuResources = Resource::find()->where(['status' => 1])->andWhere(['menu_id' => $id])->all();
    $menuResourceCategories = ResourceCategory::find()->where(['status' => 1])->andWhere(['menu_id' => $id])->all();
    
    if( $_query->exists() || !empty($menuResourceCategories))
    {
        $out .= '<li class="menu-item-has-children"><a href="' . $menu->link . '"> <span>';
        $out .= $menu->title . '</span></a>';
        $out .= '<ul class="sub-menu">';
        $items = $_query->orderBy(['order_by' => SORT_ASC])->all();
        foreach ($items as $item){
            $out .= renderMenu($item->id);
        }

        if(!empty($menuResourceCategories)){
            foreach ($menuResourceCategories as $categoryItem){
                
                $resourceCategoryLink = (empty($categoryItem->external_link)) ? Url::to(['/resource/category','id' => $categoryItem->id]) : $categoryItem->external_link; 
                
                $out .= '<li><a href="' . $resourceCategoryLink . '">';
                $out .= $categoryItem->getLang('name').'</a></li>';
                
            }
        }

        if(!empty($menuResources)){
            foreach ($menuResources as $resourceItem){
                
                $resourceLink = $resourceItem->another_link;
                if(empty($resourceItem->another_link)){
                    $resourceLink = Url::to(['/resource/view','id' => $resourceItem->id]);
                }
                

                $out .= '<li><a href="' . $resourceLink . '">';
                $out .= $resourceItem->getLang('title').'</a></li>';
            }
        }

        $out .= '</ul></li>';

    } else {

        $out .= '<li><a href="' .$menu->link. '">';
        $out .= $menu->title.'</a></li>';
        
    }


    return $out;
}
    // Yii::$app->session->destroy();
    $lang = Yii::$app->session->get('lang');
    if (empty($lang)){
        $lang = Yii::$app->language;
    }

?>

    <!-- Preloader Start -->
    <div class="preloader">
        <div class="loader"></div>
    </div>
    <!-- Preloader End -->
    
    <!-- Scroll-top -->
    <button class="scroll__top scroll-to-target" data-target="html">
        <i class="fa-sharp fa-regular fa-arrow-up"></i>
    </button>
    <!-- Scroll-top-end-->


    <!-- header-area -->
    <header class="td-header-height">

        <div id="header-sticky" class="td-header__area header-mobile-spacing td-transparent">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-8 col-6">
                        <div class="tdmenu__wrap d-flex align-items-center justify-content-between">

                            <div class="logo">
                                <a class="logo-1" href="<?=Url::home()?>">
                                    <img src="/images/logo.png" alt="Logo">
                                    <span><?= \common\components\StaticFunctions::getSettings('title'); ?></span>
                                </a>
                            </div>

                            <nav class="tdmenu__nav tdmenu-2 mr-90 d-none d-xl-flex">
                                <div class="tdmenu__navbar-wrap tdmenu__main-menu">
                                    <ul class="navigation">
                                        <?php

                                            foreach ($models as $model) {

                                                echo renderMenu( $model->id );

                                            }

                                        ?>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>

                    <div class="col-xl-4 col-6">

                        <div class="d-flex align-items-center justify-content-end">
                            
                            <div class="dropdown languages">
                                <button class="dropdown-toggle td-btn-square" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <?=\common\models\Languages::findOne(['abb'=>$lang])->abb?>
                                </button>

                                <ul class="dropdown-menu">
                                    <?php foreach ($langs as $language): ?>
                                        <li><a class="dropdown-item" href="<?=\yii\helpers\Url::to(['site/lang','lang'=>$language->abb ])?>"> <?=$language->abb?></a></li>
                                    <?php endforeach; ?>
                                </ul>

                            </div>
    
                            <div class="td-menu-right-action td-menu-right-action-2 d-flex align-items-center justify-content-end">
                                <div class="td-header-menu-bar lh-1 p-relative ml-25">
                                    <a class="td-btn-square d-none d-xl-block" href="#"><?=Yii::t('main','paper-submission')?></a>
                                    <button class="tdmenu-offcanvas-open-btn mobile-nav-toggler d-block d-xl-none">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- Mobile Menu  -->
        <div class="tdmobile__menu">
            <nav class="tdmobile__menu-box">
                <div class="close-btn"><i class="fa-solid fa-xmark"></i></div>
                <div class="nav-logo">
                    <a href="index.html">
                        <img src="/images/logo.png" alt="Logo">
                        <span><?= \common\components\StaticFunctions::getSettings('title'); ?></span>
                    </a>
                </div>
                <div class="tdmobile__menu-outer">
                    <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
                </div>
                <div class="mt-30 ml-25 mr-25">
                    <a class="td-btn td-left-right w-100 text-center" href="contact.html">
                        <span class="mr10 td-text d-inline-block mr-5">Buy Ticket</span>
                        <span class="td-arrow-angle">
                            <svg class="td-arrow-svg-top-right" width="13" height="14" viewBox="0 0 13 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M0.943836 13.5C0.685616 13.5 0.45411 13.4021 0.276027 13.224C0.0979452 13.0459 0 12.8055 0 12.5562C0 12.3068 0.0979452 12.0664 0.276027 11.8884L9.76781 2.38767H2.02123C1.49589 2.38767 1.0774 1.96027 1.0774 1.44384C1.0774 0.927397 1.50479 0.5 2.03014 0.5H12.0562C12.1274 0.5 12.1986 0.508904 12.2788 0.526712L12.4034 0.562329L12.537 0.633562C12.5637 0.65137 12.5993 0.678082 12.626 0.69589C12.6973 0.749315 12.7507 0.80274 12.7952 0.856164C12.8219 0.891781 12.8575 0.927397 12.8842 0.989726L12.9555 1.1411L12.9822 1.22123C13 1.29247 13.0089 1.3726 13.0089 1.44384V11.4699C13.0089 11.9952 12.5815 12.4137 12.0651 12.4137C11.5486 12.4137 11.1212 11.9863 11.1212 11.4699V3.72329L1.62055 13.224C1.44247 13.4021 1.20205 13.5 0.943836 13.5Z" fill="white" />
                                <path d="M0.943836 13.5C0.685616 13.5 0.45411 13.4021 0.276027 13.224C0.0979452 13.0459 0 12.8055 0 12.5562C0 12.3068 0.0979452 12.0664 0.276027 11.8884L9.76781 2.38767H2.02123C1.49589 2.38767 1.0774 1.96027 1.0774 1.44384C1.0774 0.927397 1.50479 0.5 2.03014 0.5H12.0562C12.1274 0.5 12.1986 0.508904 12.2788 0.526712L12.4034 0.562329L12.537 0.633562C12.5637 0.65137 12.5993 0.678082 12.626 0.69589C12.6973 0.749315 12.7507 0.80274 12.7952 0.856164C12.8219 0.891781 12.8575 0.927397 12.8842 0.989726L12.9555 1.1411L12.9822 1.22123C13 1.29247 13.0089 1.3726 13.0089 1.44384V11.4699C13.0089 11.9952 12.5815 12.4137 12.0651 12.4137C11.5486 12.4137 11.1212 11.9863 11.1212 11.4699V3.72329L1.62055 13.224C1.44247 13.4021 1.20205 13.5 0.943836 13.5Z" fill="white" />
                            </svg> 
                        </span>
                    </a>
                </div>
                <div class="social-links">
                    <ul class="list-wrap">
                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                        <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                        <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="tdmobile__menu-backdrop"></div>
        <!-- End Mobile Menu -->

        <!-- offCanvas-menu -->
        <div class="offCanvas__info">
            <div class="offCanvas__close-icon menu-close">
                <button><i class="fa-sharp fa-regular fa-xmark"></i></button>
            </div>
            <div class="offCanvas__logo mb-30">
                <a href="index.html"><img src="assets/img/logo/logo-black.png" alt="Logo"></a>
            </div>
            <div class="offCanvas__side-info mb-30">
                <div class="contact-list mb-30">
                    <h4>Office Address</h4>
                    <a href="https://www.google.com/maps" target="_blank">123/A, Miranda City Likaoli <br> Prikano, Dope</a>
                </div>
                <div class="contact-list mb-30">
                    <h4>Phone Number</h4>
                    <a href="tel:(090)87658654385">+0989 7876 9865 9</a>
                    <a href="tel:(090)87658654385">+(090) 8765 86543 85</a>
                </div>
                <div class="contact-list mb-30">
                    <h4>Email Address</h4>
                    <a href="mailto:info@example.com">info@example.com</a>
                    <a href="mailto:info@example.com">example.mail@hum.com</a>
                </div>
            </div>
            <div class="offCanvas__social-icon mt-30">
                <a href="javascript:void(0)"><i class="fab fa-facebook-f"></i></a>
                <a href="javascript:void(0)"><i class="fab fa-twitter"></i></a>
                <a href="javascript:void(0)"><i class="fab fa-google-plus-g"></i></a>
                <a href="javascript:void(0)"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
        <div class="offCanvas__overly"></div>
        <!-- offCanvas-menu-end -->

    </header>
    <!-- header-area-end -->
