<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
//    'catchAll' => ['site/offline'],
//    'defaultRoute' => '/site/landing',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'kKseXjnXG9es7x06JVYzAImwwO9AFzEu',
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
        'urlManager' => [
	        // Disable index.php
	        'enablePrettyUrl' => true,
	        // Disable r= routes
	        'showScriptName' => false,
	        'enableStrictParsing' => false,
//	        'suffix' => '.html',
	        'rules' => [
//		        'http://admin.example.com/login' => 'admin/user/login',
//		        'http://www.example.com/login' => 'site/login',
		        'about' => 'site/about',
		        'post/<id:\d+>' => 'post/view',
		        [
			        'pattern' => 'contact',
			        'route' => 'site/contact',
//			        'suffix' => '.html',
		        ],
		        '<controller:\w+>/<id:\d+>' => '<controller>/view',
		        '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
		        '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
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
