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

class loader{

    public function start(){

        // 获取动作
        $action = @$_GET['action'] != null ? $_GET['action'] : 'view';

        // 获取当前目录
        $path = @$_GET['path'] != null ? $_GET['path'] : '/';

        // 判断动作
        if ($action == 'view'){
            $this->loadThemes($path);
            return true;
        }

    }


    /**
     * @param $path
     */

    protected function loadThemes($path){
        // 加载模板
        include_once ROOT_DIR . "/WanderFile/themes/" . CONFIG['theme'] . "/header.php";
        include_once ROOT_DIR . "/WanderFile/themes/" . CONFIG['theme'] . "/box.php";
        include_once ROOT_DIR . "/WanderFile/themes/" . CONFIG['theme'] . "/footer.php";
    }
}