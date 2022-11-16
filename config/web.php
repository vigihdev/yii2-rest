<?php

use yii\helpers\Url;
use yii\web\Request;
use yii\db\Expression;
use yii\db\Query;

$params = require __DIR__ . '/params.php';
$baseUrl = str_replace('/web', '', (new Request)->getBaseUrl());

$config = [
    'id' => 'Rest',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
	'sourceLanguage' => 'id',
	'language' => 'id',    
    'aliases' => [ ],
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
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [ ],
        ],
    ],
    'params' => $params,
];

return $config;
