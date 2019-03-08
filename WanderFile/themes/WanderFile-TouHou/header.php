<?php
/**
 * ProjectName: WanderFileManager.
 * Author: SaigyoujiYuyuko
 * QQ: 3558168775
 * Date: 2019/3/8
 * Time: 20:47
 *
 * Copyright © 2019 SaigyoujiYuyuko. All rights reserved.
 */

?>

<html>
    <head>
        <title> <?php echo CONFIG['sitename'] . " - " . $path;?></title>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,height=device-height,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

        <link href="https://cdn.bootcss.com/twitter-bootstrap/3.3.7/css/bootstrap.css" rel="stylesheet">
        <link href="https://cdn.bootcss.com/mdui/0.4.2/css/mdui.css" rel="stylesheet">
        <link href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">
        <link rel="icon" href="/public/themes/<?php echo CONFIG['theme']?>/favicon.ico">

        <script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.js"></script>
        <script src="/public/themes/<?php echo CONFIG['theme']?>/js/mdui.js"></script>

        <style>
            body{
                font-family: '微软雅黑','FontAwesome';
            }

            @font-face{
                font-family: 'FontAwesome';
                font-display:auto;
                src: url('/public/themes/<?php echo CONFIG['theme']?>/fonts/FontAwesome.otf');
            }

            td{
                border: 0 !important;
            }
        </style>
    </head>
