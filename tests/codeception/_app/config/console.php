<?php

return [
    'id' => 'yii2-user-test',
    'basePath' => dirname(__DIR__),
    'extensions' => require(VENDOR_DIR . '/yiisoft/extensions.php'),
    'aliases' => [
        '@vendor' => VENDOR_DIR,
        '@bower' => VENDOR_DIR . '/bower-asset',
        '@tests/codeception/config' => '@tests/codeception/_config',
    ],
    'components' => [
        'db' => require('db.php'),
        'log' => null,
        'cache' => null
    ],
];
