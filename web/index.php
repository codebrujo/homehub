<?php

// comment out the following two lines when deployed to production
$credentials = require __DIR__ . '/../config/credentials.php';
defined('YII_DEBUG') or define('YII_DEBUG', $credentials['YII_DEBUG']);
defined('YII_ENV') or define('YII_ENV', $credentials['YII_ENV']);

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../vendor/yiisoft/yii2/Yii.php';

$config = require __DIR__ . '/../config/web.php';

(new yii\web\Application($config))->run();
