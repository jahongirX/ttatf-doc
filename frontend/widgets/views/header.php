<?php

use yii\helpers\Url;
?>
<!--begin::Header-->
<nav class="app-header navbar navbar-expand bg-body">
    <!--begin::Container-->
    <div class="container-fluid">
        <!--begin::Start Navbar Links-->
        <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
            <i class="bi bi-list"></i>
            </a>
        </li>
        </ul>
        <!--end::Start Navbar Links-->
        <!--begin::End Navbar Links-->
        <ul class="navbar-nav ms-auto">
        <!--begin::Notifications Dropdown Menu-->
        <li class="nav-item dropdown">
            <a class="nav-link" data-bs-toggle="dropdown" href="#">
            <i class="bi bi-bell-fill"></i>
            <span class="navbar-badge badge text-bg-warning">3</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
            <span class="dropdown-item dropdown-header">3 Xabarnomalar</span>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
                <i class="bi bi-envelope me-2"></i> Sizning #368221100036_1 raqamli murojaatingiz tasdiqlandi
            </a>
            <div class="dropdown-divider"></div>

            <a href="#" class="dropdown-item">
                <i class="bi bi-envelope me-2"></i> Sizning #368221100036_1 raqamli murojaatingiz rad etildi
            </a>
            <div class="dropdown-divider"></div>
            
            </div>
        </li>
        <!--end::Notifications Dropdown Menu-->

        <?php

            $image = (!empty(Yii::$app->user->identity->userData['image'])) ? Yii::$app->user->identity->userData['image'] : '/images/default_avatar.png';
        
        ?>

        <!--begin::User Menu Dropdown-->
        <li class="nav-item dropdown user-menu">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
            <img
                src="<?=$image?>"
                class="user-image rounded-circle shadow"
                alt="User Image"
            />
            <span class="d-none d-md-inline"><?=$user->identity->username?></span>
            </a>
            <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
            <!--begin::User Image-->
            <li class="user-header text-bg-primary">
                <img
                src="<?=$image?>"
                class="rounded-circle shadow"
                alt="User Image"
                />
                <p>
                <?= $user->identity->username; ?>
                </p>
            </li>
            <!--end::User Image-->
            <!--begin::Menu Footer-->
            <li class="user-footer">
                <a href="<?= Url::to(['/profile']) ?>" class="btn btn-default btn-flat">Profil</a>
                <a href="<?= Url::to(['/user/logout']) ?>" class="btn btn-default btn-flat float-end">Chiqish</a>
            </li>
            <!--end::Menu Footer-->
            </ul>
        </li>
        <!--end::User Menu Dropdown-->
        </ul>
        <!--end::End Navbar Links-->
    </div>
    <!--end::Container-->
</nav>
<!--end::Header-->