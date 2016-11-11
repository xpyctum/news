<?php

return [
    'id' => 'yii2-user-test',
    'basePath' => dirname(__DIR__),
    'bootstrap' => [
        'log',
        roboapp\news\Bootstrap::class,
    ],
    'extensions' => require(VENDOR_DIR . '/yiisoft/extensions.php'),
    'aliases' => [
        '@vendor' => VENDOR_DIR,
        '@bower' => VENDOR_DIR . '/bower-asset',
        '@tests/codeception/config' => '@tests/codeception/_config',
    ],
    'modules' => [
        'news' => [
            'class' => roboapp\news\Module::class,
            'imageLoaderOptions' => [
                'uploadUrl' => '#'
            ]
        ]
    ],
    'components' => [
        'assetManager' => [
            'basePath' => __DIR__ . '/../assets',
        ],
        'db' => require('db.php'),
        'log' => null,
        'cache' => null,
        'request' => [
            'enableCsrfValidation' => false,
            'enableCookieValidation' => false,
        ],
    ],
];
