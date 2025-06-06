<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log','userCounter'],
    'controllerNamespace' => 'frontend\controllers',
    'language' => 'En-en',
    'modules' => [
        'gridview' => [
            'class' => 'kartik\grid\Module',
            'downloadAction' => 'gridview/export/download',
        ]
    ],
    'components' => [
        'httpclient' => [
            'class' =>'understeam\httpclient\Client',
            'detectMimeType' => true, // automatically transform request to data according to response Content-Type header
            'requestOptions' => [
                // see guzzle request options documentation
            ],
            'requestHeaders' => [
                // specify global request headers (can be overrided with $options on making request)
            ],
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => false,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.yandex.com',
                'username' => 'oziqovqat2016',
                'password' => 'admin12345',
                'port' => '587',
                'encryption' => 'tls',
            ],
        ],
        'userCounter' => [
            'class' => 'frontend\components\UserCounter',
            'tableUsers' => 'pcounter_users',
            'tableSave' => 'pcounter_save',
            'autoInstallTables' => true,
            'onlineTime' => 10,
        ],
        'guest' => [
            'class' => 'common\components\GuestIdentity'
        ],
        'request' => [
            'csrfParam' => '_csrf-frontend',
		    'class' => 'frontend\components\Request',
		    'web'=> '/frontend/web'

        ],
        'user' => [
            'identityClass' => 'frontend\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-student', 'httpOnly' => true],
        ],
        'staff' => [
            'class' => 'yii\web\User',
            'identityClass' => 'common\models\Staff',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-staff', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'YII_SESSION',
            'cookieParams' => [
                'httponly' => true,
                'secure' => YII_ENV_PROD, // Enable in production if using HTTPS
            ],
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],

        'i18n' => [
            'translations' => [
                'main' => [
                    'class' => 'yii\i18n\DbMessageSource',
                    //'sourceLanguage' => 'main',
                    'enableCaching' => true,
                    'cachingDuration' => 60,
                    'cache' => 'cache',
                    //'forceTranslation'=>true,
                ],
            ],
        ],
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */

        
    ],

    'as beforeRequest' => [

        'class' => \frontend\components\MultiUserAccessControl::class,

        'rules' => [

            [

                'allow' => true,

                'actions' => ['login','signup'],

            ],

            [

                'allow' => false,

                'roles' => ['@'],

                'actions' => ['login','signup'],

            ],

            [

                'allow' => true,

                'roles' => ['@'],

            ],

        ],

        'denyCallback' => function () {

            if (Yii::$app->staff->isGuest && Yii::$app->user->isGuest) {
                return Yii::$app->response->redirect(['user/login']);
            }
            // User login bo‘lgan, lekin no'ruxsatlangan sahifaga kiryapti
            throw new \yii\web\ForbiddenHttpException('Sizda ushbu sahifaga ruxsat yo‘q.');

        },

    ],

    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'params' => $params
];
