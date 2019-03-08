<?php
/**
 * ProjectName: PowerFileManager.
 * Author: SaigyoujiYuyuko
 * QQ: 3558168775
 * Date: 2019/3/8
 * Time: 19:27
 *
 * Copyright © 2019 SaigyoujiYuyuko. All rights reserved.
 */

define("START_TIME",microtime(true));
define("ROOT_DIR", str_replace("\\", "/", __DIR__));

require_once ROOT_DIR . "/WanderFile/loader.php";
require_once ROOT_DIR . "/WanderFile/config.php";

define("CONFIG",$config);

// 启动
$loader = new loader();
$loader->start();