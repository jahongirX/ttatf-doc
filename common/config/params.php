<?php
return [
    'frontend' => 'https://tues.uz/',
    // 'frontend' => 'https://f.tisu/',
    'backend' => 'https://admin.tesu.uz',
    // 'backend' => 'https://b.tisu',

    'googleSheets' => [
        'spreadsheetId' => '16mp6T29gNxKSoOGdeavl3xId6Zji_dd1k-ru0F4YGCI',
        'credentials' => '
            {
            "type": "service_account",
            "project_id": "my-project-39327-1716683764770",
            "private_key_id": "81156f2e2d73285db329a9ed5fd4a4bc4291b9ab",
            "private_key": "-----BEGIN PRIVATE KEY-----\nMIIEvwIBADANBgkqhkiG9w0BAQEFAASCBKkwggSlAgEAAoIBAQD6fkCkxQWZE49g\njlNE7QsB/uSTKWwUOIIIIoZ10TeI8WlF9IgRKz/G2/2wQhgEApNSm6Wh3oIFcLk4\nKnL19h9sxn1UC4hZLIITXnW+fGr/hLqiYvwtdDwhSh8XGxLuEbP4lFCxqCiS3TnA\nHYn92ua6AA7aAf9o8YyCXNL8EZakJkPge5GM+U7Y/71pqTw7IMf22h8OVPfTubW6\nh6nELxKFikRvxmv0vaEz1b+WN/vyLBnaC/OdEjPl2aipLcTPJF3+104GsxhKF++R\nYv/rxzrGjKN4xviG+OHfProzhEN8kRDWwG5FBDQo59XHe+HJQEhMSkCNW/yM72iT\nCpJGEH5tAgMBAAECggEABf6gt00xT+/KgnH8n9SYo+YWGJ1+U0QAfKPoNmvuLuqi\nUO+LIr2bDy36fPijgmHygdml1dLqNVRYG0t+jEJzVqFah+rC9b7rxG86/5NLrHPg\nU1H75DV49j+nW5ld4Y1uknETjC+Jil8dTfj4xtNN/+mlOHRMHjLgUlhY5kESKxzk\nwPApgCy7ViDKTM4w8JV6jauBWfow4vKhPNgUbFTOYtLso+K0NrAEpPjk8cI4X8mq\n0qye/u8cKHW8OK/6qCQqDSU53xj5JpAZm4l5xphtiUAjeOZzoNbsTaXcxpr7SkZh\n116Dl1NdOt9QYvuuxxGHMBQJWbt0rIFjNAQq2FdAQQKBgQD/0lIlNmtI3lLkWwMe\n0oriYAy9+GcYdhaULrZD2eOK/EP6xRB//giPbx3nDcZMJPEnvtMPmXcIfKJMGhkk\nwLiCGE0sEDW8pws+KiEDkqn7WHckR25jPpsrUVLJblxanPV/4LwRIiobe6XpqNxn\nSd9/A30RtPuLa/BfKH98nG3eoQKBgQD6qvrup4fflv8m8ffVFQ4P8ufoqjP0WD+G\nSY9yq5tBqfD/5J4OfD3lufv81/ryOUvk20iT7Nigd9L8JqgPkIgaCeVdD5aSa468\nuaCa5nz1KSpfE5Q4Ee5oH1Gft1SYjVwNhiQXHufTTczSF1bNB7rO6pov1cmlhXXN\nnnqfHV+ITQKBgQD68DY/5neqjNrGwTf4XhJ6KDmXhzip1/wh8wg62lrHlNih/fhH\ndMq02Ax+/xYKzxn3IMosPR90Jb2V5OvRD3JtuqTImkX7/eebXPvxY0Z2FLsZzS/N\nDjZrcWRBzo2tHNX8UFhqfhbLyqhe4ZMBhodDMgrW+a7dfk3VKgaUF2X2wQKBgQCp\nzKySgXWu5fANB5ekBdEyyI6DstfiyuytIKNFQC25e06/aLQQh+S9+xBRJFTfRCS+\n8DPn0GalvMV0/RKXCIbJbK6sLWUH5kgYW34Jr9wxjiMfqHmcybi/W4fFM0Dg3dDf\ncGB+MPdE0czO+/RWisfmZlDv2lfwAcnc8V+K7TDLeQKBgQDVBGXglfV+VAWUhTQY\nCcXHLQmd8aA7hBOT7wkjU6O3WzC/nwxlCPruzl6fI/+6xjNKk8MW9mIMrIhKYa5f\neGBr4Ev9FAj2Cv50+yBY0cnLtUMmy9r8WzLgj1odEHGq5zVq2FO+gOeCEgsi1TrF\nNQObUWhoS0hcFBfNvnpAaBi/Ew==\n-----END PRIVATE KEY-----\n",
            "client_email": "tisu-spreadsheet-write@my-project-39327-1716683764770.iam.gserviceaccount.com",
            "client_id": "110216688526256507235",
            "auth_uri": "https://accounts.google.com/o/oauth2/auth",
            "token_uri": "https://oauth2.googleapis.com/token",
            "auth_provider_x509_cert_url": "https://www.googleapis.com/oauth2/v1/certs",
            "client_x509_cert_url": "https://www.googleapis.com/robot/v1/metadata/x509/tisu-spreadsheet-write%40my-project-39327-1716683764770.iam.gserviceaccount.com",
            "universe_domain": "googleapis.com"
            }
        ',
    ],

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
