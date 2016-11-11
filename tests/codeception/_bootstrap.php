<?php

defined('YII_DEBUG') or define('YII_DEBUG', false);
defined('YII_ENV') or define('YII_ENV', 'test');
defined('YII_TEST_ENTRY_URL') or define('YII_TEST_ENTRY_URL', '/index.php');
defined('YII_TEST_ENTRY_FILE') or define('YII_TEST_ENTRY_FILE', __DIR__ . '/_app/web/index.php');
defined('VENDOR_DIR') or define('VENDOR_DIR', realpath(__DIR__ . '/../../vendor'));

require_once(__DIR__ . '/../../vendor/autoload.php');
require_once(__DIR__ . '/../../vendor/yiisoft/yii2/Yii.php');

Yii::setAlias('@tests', dirname(__DIR__));
Yii::setAlias('@src', __DIR__ . '/../../src');
Yii::setAlias('@webroot', __DIR__ . '/_app');
