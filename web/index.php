<?php

// comment out the following two lines when deployed to production
$custom_params = require __DIR__ . '/../config/custom_params.php';
defined('YII_DEBUG') or define('YII_DEBUG', $custom_params['YII_DEBUG']);
defined('YII_ENV') or define('YII_ENV', $custom_params['YII_ENV']);

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../vendor/yiisoft/yii2/Yii.php';

$config = require __DIR__ . '/../config/web.php';

(new yii\web\Application($config))->run();
