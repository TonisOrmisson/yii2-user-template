<?php

$params = require(__DIR__ . '/params.php');
$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => [
        'log',
        'Da\User\Bootstrap',
        'languagepicker',
        \app\bootstraps\AppBootstrap::class
        ],
    'aliases' => require(__DIR__ . '/aliases.php'),
    'components' => [
        'authClientCollection' => require(__DIR__ . '/auth.php'),
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'Q3RvvGeA0IPRTfyXmNeXd46HHcT1raba',
        ],
        'languagepicker' => [
            'class' => 'lajax\languagepicker\Component',
            // List of available languages (icons only)
            'languages' => ['et','ru', 'en', 'ca'],

        ],

        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => \yii\symfonymailer\Mailer::class,
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'logFile' => '@runtime/logs/error.log',
                    'levels' => ['error', 'warning'],
                ],
                [
                    'class' => 'yii\log\FileTarget',
                    'logFile' => '@runtime/logs/app.log',
                    'categories' => ['app'],
                    'levels' => ['info'],
                    'logVars' => [],
                ],
            ],
        ],
        'db' => require(__DIR__ . '/db.php'),
        'urlManager' => [
            'class' => 'yii\web\UrlManager',
            // Disable index.php
            'showScriptName' => false,
            // Disable r= routes
            'enablePrettyUrl' => true,
            'rules' => array(

                ['class' => 'yii\rest\UrlRule', 'controller' => 'api/user'],

                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ),
        ],
        'session' => Da\User\Service\SessionHistory\SessionHistoryDecorator::class,

    ],
    'modules' => [
        'user' =>            require(__DIR__ . '/user.php'),
    ],
    'params' => $params,
    'container' => [
        'singletons' => [
            Da\User\Service\SessionHistory\TerminateSessionsServiceInterface::class => Da\User\Service\SessionHistory\TerminateSessionsService::class
        ]
    ]
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        'allowedIPs' => ['*'],
    ];

}
return $config;
