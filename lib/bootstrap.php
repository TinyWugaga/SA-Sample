<?php
/**
 * 這是一個導引檔案
 */

// 很抱歉，由於我們沒有實做自動加載器，所以得手動 require 檔案。
require __DIR__ . '/Accessor.php';
require __DIR__ . '/DB.php';

$config = require __DIR__ . '/../config/database.php';

DB::connect($config);