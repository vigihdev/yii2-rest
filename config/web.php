<?php

use yii\helpers\Url;
use yii\web\Request;
use yii\db\Expression;
use yii\db\Query;

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';
$baseUrl = str_replace('/web', '', (new Request)->getBaseUrl());

$config = [
    'id' => 'Api.Order.v2',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
	'sourceLanguage' => 'id',
	'language' => 'id',    
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
    ],
    'defaultRoute' => '/welcome',
    'homeUrl' => '/welcome',    
    'components' => [
        'request' => [
            'cookieValidationKey' => 'WjPrJ_d9b9zKUjWv5NYx_7bx6WYwNUfo',
            'baseUrl' => $baseUrl,
			'enableCsrfValidation'   => false,
			'enableCookieValidation' => false,            
        ],

        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],

        'user' => [
            'identityClass' => 'app\models\users\User',
			'enableSession' => false, 
			'loginUrl' => null            
        ],

        'errorHandler' => [
            'errorAction' => 'error',
        ],

        'dateNow' => function(){
            $expression = new Expression('NOW()'); 
            return (new Query())->select($expression)->scalar(); 
        },

        'i18n' => [
            'translations' => [
                'app*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'sourceLanguage' => 'id',
                    'fileMap' => [
                        'app' => 'app.php', 
                        'app/error' => 'error.php', 
                    ], 
                ],
            ],
        ],// i18n

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
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
    ],
    'params' => $params,
];

return $config;
