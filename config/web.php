<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    //язык приложения
    'language' => 'ru',
    'layout' => 'main',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'mwWdwADbpymCNjhNjgUxxAowmasY5gA5',
            'baseUrl' => '',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
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
        'db' => $db,
        // настраиваем урл
        'urlManager' => [
            // вкл ЧПУ
            'enablePrettyUrl' => true,
            // показывать имя скрипта
            'showScriptName' => false,
            // взаимодействия с правилами
            'enableStrictParsing' => false,
            // добавление суффикса в конец ссылок
            'suffix' => '.html',
            // перенапраление
            'rules' => [

                // сначала идут более конкретное правило, затем более общие

                // убираем суффикс для главной страницы
                [
                    'pattern' => '',
                    'route' => 'site/index',
                    'suffix' => '',
                ],
                // не удобно
//                'about' => 'site/about',
//                'contact' => 'site/contact',
            // regular expression
                // action - именованный параметр
                //'<action:about|contact|login>' => 'site/<action>',
                // стоит проверять, сущ. ли такая страница
                '<a:\w+>' => 'site/<a>',
            ],
        ],

    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
