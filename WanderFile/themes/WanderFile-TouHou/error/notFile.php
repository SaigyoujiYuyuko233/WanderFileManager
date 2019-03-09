<?php
/**
 * ProjectName: FastPterodactylAPI.
 * Author: SaigyoujiYuyuko
 * QQ: 3558168775
 * Date: 2018/12/15
 * Time: 18:06
 *
 * Copyright © 2018 SaigyoujiYuyuko. All rights reserved.
 */
?>


<?php
/**
 * ProjectName: FastPterodactylAPI.
 * Author: SaigyoujiYuyuko
 * QQ: 3558168775
 * Date: 2018/12/15
 * Time: 18:06
 *
 * Copyright © 2018 SaigyoujiYuyuko. All rights reserved.
 */
?>

<html>
<head>
    <title> <?php echo CONFIG['sitename'] . " - 无法下载目录" ;?></title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,height=device-height,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <link href="https://cdn.bootcss.com/twitter-bootstrap/3.3.7/css/bootstrap.css" rel="stylesheet">
    <link href="https://cdn.bootcss.com/mdui/0.4.2/css/mdui.css" rel="stylesheet">
    <link href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">
    <link rel="icon" href="/public/themes/<?php echo CONFIG['theme']?>/favicon.ico">

    <script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.js"></script>

    <style>
        body{
            background-color: #FAFAFA;
            font-family: '微软雅黑 Light';

            background-image: url("/public/themes/<?php echo CONFIG['theme']?>/images/NotFound.jpg");
            background-size: 100%100%;
        }

        h1{
            font-size: 50px;
        }

        .message{
            position: absolute;
            top: 25%;
            left: 13%;

            color: rgba(69,214,255,0.76);
        }

        p{
            font-size: 26px;
        }

        #small{
            font-size: 18px;
        }

        button{
            height: 45px;
            width: 450px;

            background-color: transparent !important;
        }

        button:hover{
            background-color: rgba(78,218,255,0.49) !important;
        }

        @media screen and (max-width: 766px) {
            .message{
                position: absolute;
                top: 20%;
                left: 0%;

                color: rgba(69,214,255,0.76);
            }

            p{
                text-align: center;
            }

            #small{
                text-align: center;
            }

            body{
                background-image: url("/static/png/NotFound.jpg");
                background-size: 100%125%;

                width: 100%;
                height: 100%;
            }
        }
    </style>
</head>


<body>
<script>
    $(document).ready(function () {
        let message = document.getElementsByClassName("message")[0];
        let text = document.getElementById("text");
        let title = document.getElementById("title");
        let small = document.getElementById("small");

        let width = message.scrollWidth;

        if (width >= 460){
            text.style.textAlign = "center";
            title.style.textAlign = "center";
            small.style.textAlign = "center";
        }

        if (width >= 700){
            text.style.textAlign = "center";
            title.style.textAlign = "center";
            small.style.textAlign = "center";

            message.style.top = "24%";
            message.style.left = "4%";
        }
    });
</script>

<div class="message">
    <h1 id="title">无法下载目录</h1>
    <p id="text">这个东西不是文件哦~</p><br>

    <p id="small">
        Error: 无法下载目录 | ErrString: 403
    </p>

    <hr>

    <button class="btn btn-info" onclick="javascript:history.back(-1);" style="width: 100%">返回上一页</button>

</div>
</body>

</html>