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
        $data = $this->parsingData($path);
        $path_bar = $this->parsingPath($path);
        $this->loadThemes($path,$data,$path_bar);
    }


    /**
     * 解析上方的导航栏
     *
     * @param $path
     * @return String
     */

    protected function parsingPath($path){

        // path-bar
        $path_bar = '<p style="display: inline-block; margin: 0;"><a href="/?action=view&path=/">根目录</a> > </p>';

        // 读取模板
        $tmp = file_get_contents(ROOT_DIR . "/WanderFile/themes/" . CONFIG['theme'] . "/path.php");

        // 解析路径
        $path_arr = explode("/",$path);

        // start with 1? i don't now why that i need set 2 to make this work
        for ($i = 2; $i < count($path_arr); $i++){

            // 获得前目录
            $path_ago = substr(explode($path_arr[$i],$path)[0],0,strlen(explode($path_arr[$i],$path)[0]) - 1);

            // 获得目录名称
            $path_name_ago = explode("/",$path_ago)[ count(explode("/",$path_ago)) - 1 ];

            // 合成
            $path_bar_parts = str_replace("{PATH}",$path_ago,$tmp);
            $path_bar_parts = str_replace("{NAME}",$path_name_ago,$path_bar_parts);


            $path_bar = $path_bar . $path_bar_parts;
        }

        // 顺便加上当前目录
        $now_path =  " <p style=\"display: inline-block; margin: 0;\"><a href=\"/?action=view&path=". $path ."\">" . $path_arr[count($path_arr) - 1] . "</a></p>";

        return $path_bar . $now_path;
    }


    protected function parsingData($path){

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
        $file_data = scandir($root_path . $path);

        // 所有文件信息
        for ($i = 2; $i < count($file_data); $i++){

            // 文件的路径
            $file_path = $root_path . $path . "/" . $file_data[$i];

            // 如果 $path 只有一个 '/'
            if ($path == '/'){
                $path = '';
            }

            // 文件夹的
            if (is_dir($file_path) == true){

                $temp_data = str_replace("{URL}","/?action=view&path=" . $path . "/" . $file_data[$i],$temp);
                $temp_data = str_replace("{NAME}",$file_data[$i],$temp_data);
                $temp_data = str_replace("{ICON_TYPE}","fa-folder-o",$temp_data);
                $temp_data = str_replace("{TIME}",date("Y/m/d G:i:s",filemtime($file_path)),$temp_data);
                $temp_data = str_replace("{SIZE}","-- MB",$temp_data);
                $temp_data = str_replace("{TYPE}","文件夹",$temp_data);

                $folder_data = $folder_data . $temp_data;
            }

            // 文件的
            else if(is_file($file_path) == true) {

                // 获取文件大小
                $file_size = filesize($file_path);
                if ($file_size/1024/1024/1024/1024 < 1){ $file_size_string = round($file_size/1024/1024/1024,3) . " GB"; }
                if ($file_size/1024/1024/1024 < 1){ $file_size_string = round($file_size/1024/1024,3) . " MB"; }
                if ($file_size/1024/1024 < 1){ $file_size_string = round($file_size/1024,3) . " KB"; }
                if ($file_size/1024 < 1){ $file_size_string = $file_size . " B"; }

                // 获取文件图标
                $file_extension = pathinfo($file_path,PATHINFO_EXTENSION);

                // 文件图标
                $file_ico = "fa-file";

                // 判断
                if ($file_extension == "jpg" || $file_extension == "png" || $file_extension == "jpeg" || $file_extension == "gif" || $file_extension == "ico"){
                    $file_ico = "fa-file-image-o";
                }

                if ($file_extension == "mp3" || $file_extension == "ogg"){
                    $file_ico = "fa-file-audio-o";
                }

                if ($file_extension == "mp4" || $file_extension == "avi" || $file_extension == "flv"){
                    $file_ico = "fa-file-movie-o";
                }

                if ($file_extension == "php" || $file_extension == "h" || $file_extension == "c" || $file_extension == "html" || $file_extension == "js" || $file_extension == "c"){
                    $file_ico = "fa-file-code-o";
                }

                if ($file_extension == "zip" || $file_extension == "7z" || $file_extension == "rar" ){
                    $file_ico = "fa-file-zip-o";
                }

                $temp_data = str_replace("{NAME}",$file_data[$i],$temp);
                $temp_data = str_replace("{ICON_TYPE}",$file_ico,$temp_data);
                $temp_data = str_replace("{TIME}",date("Y/m/d G:i:s",filemtime($file_path)),$temp_data);
                $temp_data = str_replace("{SIZE}",$file_size_string,$temp_data);
                $temp_data = str_replace("{TYPE}",strtoupper($file_extension) . " 文件",$temp_data);
                $temp_data = str_replace("{URL}","/?action=download&path=" . $path . "/" . $file_data[$i] ,$temp_data);

                $file_list = $file_list . $temp_data;
            }

        }


        // 合并2个
        $data = $folder_data . $file_list;

        return $data;
    }


    protected function loadThemes($path,$data,$path_bar){
        // 加载模板
        include_once ROOT_DIR . "/WanderFile/themes/" . CONFIG['theme'] . "/header.php";
        include_once ROOT_DIR . "/WanderFile/themes/" . CONFIG['theme'] . "/box.php";

        // 这是路径栏的输出
        echo $path_bar;

        // 加载表格
        include_once ROOT_DIR . "/WanderFile/themes/" . CONFIG['theme'] . "/path-bar.php";


        // 这是列表的输出
        echo $data;

        include_once ROOT_DIR . "/WanderFile/themes/" . CONFIG['theme'] . "/footer.php";
    }


    public function downloadFile($path){
        // 获取根目录
        $root_path = CONFIG['files']['root_path'];

        // 文件的路径
        $file_path = $root_path . $path;

        // 判断是否有这个文件
        if (is_file($file_path) == false){
            include_once ROOT_DIR . "/WanderFile/themes/" . CONFIG['theme'] . "/error/404.php";
            return false;
        }

        // 判断是否是目录
        if (is_dir($file_path) == true){
            include_once ROOT_DIR . "/WanderFile/themes/" . CONFIG['theme'] . "/error/notFile.php";
            return false;
        }

        // 设置下载头
        header('Cache-control: private');// 发送 headers
        header('Content-Type: application/octet-stream');
        header('Content-Length: '.filesize($file_path));
        header('Content-Disposition: filename='.basename($file_path));

        // 清除缓存
        ob_clean();
        flush();

        // 设置php运行时间
        ini_set("max_execution_time", "600");

        // 开始限速下载

        $file = fopen($file_path, "r");

        while(!feof($file)){
            print(fread($file,CONFIG['files']['download_speed']));
            flush();
            sleep(1);
        }

        fclose($file);

        return true;
    }

}