<?php
/**
 * ProjectName: WanderFileManager.
 * Author: SaigyoujiYuyuko
 * QQ: 3558168775
 * Date: 2019/3/8
 * Time: 23:54
 *
 * Copyright © 2019 SaigyoujiYuyuko. All rights reserved.
 */

namespace WanderFile;

class WanderFile{

    /**
     * view action的入口点
     *
     * @param $path
     */
    public function viewAction($path){
        $data = $this->parsingData();
        $this->loadThemes($path,$data);
    }

    protected function parsingData(){

        // 文件夹 & 文件 的合集
        $data = '';

        // 文件夹 only的合集
        $folder_data = '';

        // 文件 only
        $file_list = '';

        // 读取模板
        $temp = file_get_contents(ROOT_DIR . "/WanderFile/themes/" . CONFIG['theme'] . "/list.php");

        // 获取根目录
        $root_path = CONFIG['files']['root_path'];

        // 获取所有目录 & 文件
        $file_data = scandir($root_path);

        // 所有文件信息
        for ($i = 2; $i < count($file_data); $i++){

            // 文件的路径
            $file_path = $root_path . "/" . $file_data[$i];

            // 文件夹的
            if (is_dir($file_path) == true){
                $temp_data = str_replace("{NAME}",$file_data[$i],$temp);
                $temp_data = str_replace("{ICON_TYPE}","fa-folder-o",$temp_data);
                $temp_data = str_replace("{TIME}",date("Y/m/d G:i:s",filemtime($file_path)),$temp_data);
                $temp_data = str_replace("{SIZE}","-- MB",$temp_data);
                $temp_data = str_replace("{TYPE}","文件夹",$temp_data);

                $folder_data = $folder_data . $temp_data;
            }

            // 文件的
            else if(is_file($file_path) == true) {
                $temp_data = str_replace("{NAME}",$file_data[$i],$temp);
                $temp_data = str_replace("{ICON_TYPE}","fa-file",$temp_data);
                $temp_data = str_replace("{TIME}",date("Y/m/d G:i:s",filemtime($file_path)),$temp_data);
                $temp_data = str_replace("{SIZE}",round(filesize($file_path)/1024/1024,3) . " MB",$temp_data);
                $temp_data = str_replace("{TYPE}",pathinfo($file_path,PATHINFO_EXTENSION),$temp_data);

                $file_list = $file_list . $temp_data;
            }

        }


        // 合并2个
        $data = $folder_data . $file_list;

        return $data;
    }


    protected function loadThemes($path,$data){
        // 加载模板
        include_once ROOT_DIR . "/WanderFile/themes/" . CONFIG['theme'] . "/header.php";
        include_once ROOT_DIR . "/WanderFile/themes/" . CONFIG['theme'] . "/box.php";
        echo $data;
        include_once ROOT_DIR . "/WanderFile/themes/" . CONFIG['theme'] . "/footer.php";
    }

}