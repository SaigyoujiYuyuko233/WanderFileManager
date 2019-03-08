<?php
/**
 * ProjectName: WanderFileManager.
 * Author: SaigyoujiYuyuko
 * QQ: 3558168775
 * Date: 2019/3/8
 * Time: 19:34
 *
 * Copyright © 2019 SaigyoujiYuyuko. All rights reserved.
 */

require_once ROOT_DIR . "/WanderFile/WanderFile.php";

use WanderFile\WanderFile;

class loader{

    public function start(){

        // 实例化核心
        $WanderFile = new WanderFile();

        // 获取动作
        $action = @$_GET['action'] != null ? $_GET['action'] : 'view';

        // 获取当前目录
        $path = @$_GET['path'] != null ? $_GET['path'] : '/';

        // 判断动作
        if ($action == 'view'){
            $WanderFile->viewAction($path);
            return true;
        }

        return true;
    }

}