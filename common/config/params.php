<?php
return [
    // 'frontend' => 'https://f.ffta.uz/',
    'frontend' => 'https://f.ttatf',
    // 'backend' => 'https://admin.tesu.uz',
    'backend' => 'http://b.ttatf',

    'images_dir' => '/frontend/web/uploads/images/',
    'images_url' => '/uploads/images/',

    'uploads_dir' => '/frontend/web/uploads/',
    'uploads_url' => '/uploads/',

    'large_image' => [
        'width' => 1900,
        'height' => 1080
    ],
    'medium_image'  => [
        'width' => 300,
        'height' => 0
    ],
    'small_image'  => [
        'width' => 100,
        'height' => 100
    ],

    'slider_limit'   => 5,
    'services_limit' => 8,
    'services_category_limit' => 3,

    'main_language' => 'en',
    'main_lang' => [
        'abb' => 'en',
        'name' => 'English'
    ],
    'main_language_id' => 2,
    'lang_id' => 2,

    'pagination' => 10,

    'menu_types' => [
        0 => 'Главное',
        1 => 'Меню в футере',
        2 => 'Меню в нижном футере',
    ],

    'faq_cat' => [
        0 => 'Неактивный',
        1 => 'FAQ',
        2 => 'Центральный аппарат'
    ],

    'ad_cat' => [
        1 => 'Боковое',
    ],

    'banner_cat' => [
        0 => 'Главное',
        1 => 'нижний колонтитул',
        2 => 'Нижний колонтитул-1',

    ],

    'person_type' => [
        0 => 'Physical',
        1 => 'Legal'
    ],

    'month' => [
        'uz' => [ 1 => 'Yanvar', 2 => 'Fevral', 3 => 'Mart', 4 => 'Aprel', 5 => 'May', 6 => 'Iyun', 7 => 'Iyul', 8 => 'Avgust', 9 => 'Sentyabr', 10 => 'Oktyabr', 11 => 'Noyabr', 12 => 'Dekabr'],
        'ru' => [ 1 => 'Январь', 2 => 'Февраль', 3 => 'Март', 4 => 'Апрель', 5 => 'Май', 6 => 'Июнь', 7 => 'Июль', 8 => 'Август', 9 => 'Сентябрь', 10 => 'Октябрь', 11 => 'Ноябрь', 12 => 'Декабрь'],
        'en' => [ 1 => 'January', 2 => 'February', 3 => 'March', 4 => 'April', 5 => 'May', 6 => 'June', 7 => 'July', 8 => 'August', 9 => 'September', 10 => 'October', 11 => 'November', 12 => 'December'],
    ],
    'image_type' => [
        1 => 'news',
        2 => 'recourse',
        3 => 'page'
    ],
    'model_types' => [
        'news' => 'Yangilik',
        'news-category' => 'Yangilik Kategoriyasi',
        'resource' => 'Resurs',
        'resource-category' => 'Resurs Kategoriyasi',
        'page' => 'Sahifa',
        'structure' => 'Tarkibiy tuzilmalar'
    ],
    'structure_model_types' => [
        'resource' => 'Resurs',
        'resource-category' => 'Resurs Kategoriyasi',
        'leader' => 'Raxbariyat',
        'leader-category' => "Raxbariyat bo'linmasi",
    ],
    'citizen_types' => [
        1 => Yii::t('main','citizen-uzbek'),
        2 => Yii::t('main','citizen-foreign')
    ]
];
