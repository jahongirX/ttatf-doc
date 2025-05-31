<?php

use yii\helpers\Url;
?>
<!--begin::Sidebar-->
<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <!--begin::Sidebar Brand-->
    <div class="sidebar-brand">
        <!--begin::Brand Link-->
        <a href="<?=Url::home()?>" class="brand-link">
        <!--begin::Brand Text-->
        <span class="brand-text fw-light">TTAF DOCS</span>
        <!--end::Brand Text-->
        </a>
        <!--end::Brand Link-->
    </div>
    <!--end::Sidebar Brand-->
    <!--begin::Sidebar Wrapper-->
    <div class="sidebar-wrapper">
        <nav class="mt-2">
        <!--begin::Sidebar Menu-->
        <ul
            class="nav sidebar-menu flex-column"
            data-lte-toggle="treeview"
            role="menu"
            data-accordion="false"
        >
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon bi bi-tree-fill"></i>
                    <p>
                    UI Elements
                    <i class="nav-arrow bi bi-chevron-right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                    <a href="./UI/general.html" class="nav-link">
                        <i class="nav-icon bi bi-circle"></i>
                        <p>General</p>
                    </a>
                    </li>
                    <li class="nav-item">
                    <a href="./UI/icons.html" class="nav-link">
                        <i class="nav-icon bi bi-circle"></i>
                        <p>Icons</p>
                    </a>
                    </li>
                    <li class="nav-item">
                    <a href="./UI/timeline.html" class="nav-link">
                        <i class="nav-icon bi bi-circle"></i>
                        <p>Timeline</p>
                    </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
            <a href="./docs/layout.html" class="nav-link">
                <i class="nav-icon bi bi-grip-horizontal"></i>
                <p>Layout</p>
            </a>
            </li>

        </ul>
        <!--end::Sidebar Menu-->
        </nav>
    </div>
    <!--end::Sidebar Wrapper-->
</aside>
<!--end::Sidebar-->