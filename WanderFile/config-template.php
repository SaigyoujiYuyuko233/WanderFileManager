<?php
/**
 * ProjectName: WanderFileManager.
 * Author: SaigyoujiYuyuko
 * QQ: 3558168775
 * Date: 2019/3/8
 * Time: 20:12
 *
 * Copyright © 2019 SaigyoujiYuyuko. All rights reserved.
 */

$config = array(

    // 系统版本 请勿修改
    'version' => '1.0.0',
    'publish_mark' => 00000,

    // 网站title
    'sitename' => '流浪的文件管理器',

    // 标题内容
    'subjectname' => "<i class=\"fa fa-hdd-o\"></i> 流浪文件 ~ Perfect Wandering FileManager",

    // 模板名称
    'theme' => 'WanderFile-TouHou',

    // 站点介绍
    'description' => '一个正在流浪的文件管理器',


    // 文件设置
    'files' => array(
        // 文件根目录 (完整的根目录)  ex: D:/MyData/WanderFile  注意结尾不要带 '/' 号 不要使用 '\'
        'root_path' => 'D:/MyData/WanderFile',

        // 文件下载速度 单位B 默认: 102400 [1MB/s] 这是最丝滑的模式(要更丝滑还可以继续上调)
        'download_speed' => 1024000,

        // 浏览文件
        'preview' => array(
            // 是否允许浏览文件
            'allow' => false,

            // 可以预浏览的文件格式
            'allow_extension' => array(
                'txt',
                'md5',
                'html',
                'js',
                'css'
            )
        )
    )

);