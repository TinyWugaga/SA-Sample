<?php
/**
 * 這是一個導引檔案
 */

use Slim\Factory\AppFactory;

// 很抱歉，由於我們沒有實做自動加載器，所以得手動 require 檔案。
require __DIR__ . '/lib/Database/Accessor.php';
require __DIR__ . '/lib/Database/DB.php';
require __DIR__ . '/lib/Router/Accessor.php';
require __DIR__ . '/lib/Router/Route.php';
require __DIR__ . '/view.php';
require __DIR__ . '/services.php';

$app = AppFactory::create();

$config = require __DIR__ . '/config/database.php';
DB::connect($config);

$routes = require __DIR__ . '/routes.php';
Route::initial($app);

$response = require __DIR__ . '/response.php';