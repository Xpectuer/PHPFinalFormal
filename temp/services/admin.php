<?php
include ("../../pages/classes/User.php");


session_start();
$user=$_SESSION["user"];

if(!isset($_SESSION['user'])){
    die("Get The Fuck Out OF Here!");
}
else if($user->authority!=="0"){
    die("Hello Hacker!");
}
?>

<!DOCTYPE html>
<html lang="zh">

<head>
    <title>管理员界面</title>
    <!-- META TAGS -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="description" content="">
    <meta name="keywords" content="">
    <!-- CSS文件 -->
    <link href="../../lib/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="../../lib/font-awesome-4.7.0/css/font-awesome.css" rel="stylesheet" type="text/css">
    <link href="../../lib/css/featherlight.css" rel="stylesheet" type="text/css">
    <link href="../../lib/css/style.css" rel="stylesheet" type="text/css">
</head>

<body>
    <!-- READING POSITION INDICATOR -->
    <progress value="0" id="eskimo-progress-bar">
        <span class="eskimo-progress-container">
            <span class="eskimo-progress-bar"></span>
        </span>
    </progress>
    <!-- SITE WRAPPER -->
    <div id="eskimo-site-wrapper">
        <!-- MAIN CONTAINER -->
        <main id="eskimo-main-container">
            <div class="container">
                <!-- SIDEBAR -->
                <div id="eskimo-sidebar">
                    <div id="eskimo-sidebar-wrapper" class="d-flex align-items-start flex-column h-100 w-100">
                        <!-- LOGO -->
                        <div id="eskimo-logo-cell" class="w-100">
                            <a class="eskimo-logo-link" href="../index.html">
                                <img src="../../lib/images/logo.png" class="eskimo-logo" alt="eskimo" />
                            </a>
                        </div>
                        <!-- MENU CONTAINER -->
                        <div id="eskimo-sidebar-cell" class="w-100">
                            <!-- MOBILE MENU BUTTON -->
                            <div id="eskimo-menu-toggle">菜单</div>
                            <!-- MENU -->
                            <nav id="eskimo-main-menu" class="menu-main-menu-container">
                                <ul class="eskimo-menu-ul">
                                    <li><a href="../index.html">首页</a>
                                    </li>
                                    <li><a href="#">用户</a>
                                        <ul class="sub-menu">
                                            <li><a href="../../pages/login/register.html">注册</a></li>
                                            <li><a href="../../pages/login/login.html">登录</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">博客</a>
                                        <ul class="sub-menu">
                                            <li><a href="../blog.html">界面1</a></li>
                                            <li><a href="../single-post.html">热门文章</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="../galleries.html">无聊图</a></li>\
                                </ul>
                            </nav>
                        </div>
                        <!-- SOCIAL MEDIA ICONS -->
                        <div id="eskimo-social-cell" class="mt-auto w-100">
                            <div id="eskimo-social-inner">
                                <ul class="eskimo-social-icons">
                                    <li><a href="#"><i class="fa fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                    <li><a href="#"><i class="fa fa-vimeo"></i></a></li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- TOP ICONS -->
                <ul class="eskimo-top-icons">
                    <li id="eskimo-panel-icon">
                        <a href="#eskimo-panel" class="eskimo-panel-open"><i class="fa fa-bars"></i></a>
                    </li>
                    <li id="eskimo-search-icon">
                        <a id="eskimo-open-search" href="#"><i class="fa fa-search"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
                <!-- PAGE TITLE -->
                <div class="eskimo-page-title">
                    <h1><span><?=$user->username?></span></h1>
                    <p class="eskimo-page-subtitle">您是管理员</p>
                </div>
<!--               ABOUT ME -->
<!--                <div class="row">-->
<!--                    <div class="col-12 col-lg-7 order-2 order-lg-1">-->
<!--                        <div class="progress">-->
<!--                            <div class="progress-bar bg-success" style="width: 100%" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"><span>本周社区发言数</span> 100</div>-->
<!--                        </div>-->
<!--                        <div class="progress">-->
<!--                            <div class="progress-bar bg-info" style="width: 85%" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"><span>活跃用户</span> 85</div>-->
<!--                        </div>-->
<!--                        <div class="progress">-->
<!--                            <div class="progress-bar bg-warning" style="width: 65%" role="progressbar" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"><span>最近文章</span> 65</div>-->
<!--                        </div>-->
<!--                        <div class="progress">-->
<!--                            <div class="progress-bar bg-danger" style="width: 50%" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"><span>进行中活动</span> 50</div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="col-12 col-lg-5 order-1 order-lg-2 mb-5 mb-lg-0">-->
<!--                        <img src="../../lib/uploads/2019/12/img0.jpg" alt="Neptune" class="img-fluid mx-auto d-block eskimo-img-shadow" />-->
<!--                    </div>-->
<!--                </div>-->
<!--   DIVIDER -->
<!--                <hr />-->
<!--             DIVIDER -->


                <div id="mp-accordion-2" data-children=".mp-accordion-item" class="mp-accordion">
                    <!-- ACCORDION ITEM 1 -->
                    <div class="mp-accordion-item">
                        <a class="mp-accordion-title" data-toggle="collapse" data-parent="#mp-accordion-2" href="#passage-container" aria-expanded="false" aria-controls="mp-accordion-item-5" style="font-size: 40px">文章列表
                            <button class="addButton" style="font-size: 20px"><i class="fa fa-plus">添加</i></button>
                            </a>
                        <div id="passage-container">
                        <div id="mp-accordion-item-5" class="collapse show" role="tabpanel">
                            <div class="mp-accordion-content">
                                <h5>《宝可梦剑/盾》
                                <a>14：25 </a>
                                    <button class="ediButton"><i class="fa fa-file">编辑</i></button>
                                    <button class="delButton"><i class="fa fa-times">删除</i></button>
                                </h5>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>

                <div id="form-messages"></div>
            </div>
        </main>
        <!-- FOOTER -->
        <footer id="eskimo-footer">
            <div class="container">
                <!-- CREDITS -->
                <div class="eskimo-footer-credits">
                    <p>
                        Made by <a href="https://github.com/Neptune1228" target="_blank">Neptune </a> & <a href="https://github.com/Xpectuer" target="_blank">Alex</a>
                        <!--sitting URL-->
                    </p>
                </div>
            </div>
        </footer>
    </div>
    <!-- GO TO TOP BUTTON -->
    <a id="eskimo-gototop" href="#"><i class="fa fa-chevron-up"></i></a>
    <!-- SLIDE PANEL OVERLAY -->
    <div id="eskimo-overlay"></div>
    <!-- 边栏 -->
    <div id="eskimo-panels">
        <aside id="eskimo-panel" class="eskimo-panel">
            <div class="eskimo-panel-inner">
                <!-- CLOSE SLIDE PANEL BUTTON -->
                <a href="#" class="eskimo-panel-close"><i class="fa fa-times"></i></a>
                <!-- AUTHOR BOX -->
                <div class="eskimo-author-box eskimo-widget">
                    <div class="eskimo-author-img">
                        <img src="../../lib/uploads/2019/12/img9.jpg" alt="USER" id="side_profile_image"/>
                    </div>
                    <h3><span id="side_username">未登录</span></h3>
                    <p class="eskimo-author-subtitle" id="side_authority"></p>
                    <p class="eskimo-author-description" id="side_attachments"></p>
                    <div class="eskimo-author-box-btn" id="side_management" style="display: none">
                        <a class="btn btn-default" href="admin.php">管理</a>
                    </div>
                    <div class="eskimo-author-box-btn" id="side_login" style="display:block;">
                        <a class="btn btn-default" href="../pages/login/login.html">登录</a>
                    </div>
                    <div class="eskimo-author-box-btn" id="side_logout" style="display: none">
                        <a class="btn btn-default" href="hollowKnight.html">登出</a>
                        <!--                   按钮 能不能做成红色背景？？-->
                    </div>
                </div>
                <!-- RECENT POSTS -->
                <div class="eskimo-recent-entries eskimo-widget">
                    <h5 class="eskimo-title-with-border"><span>最近发言</span></h5>
                    <ul id="side_dialogs">
                        <!--                    <li>-->
                        <!--                        <a href="single-post.html">杰哥不要啊！</a>-->
                        <!--                        <span class="post-date">Dec 28, 2019</span>-->
                        <!--                    </li>-->
                        <!--                    <li>-->
                        <!--                        <a href="single-post.html">最近有在健身哦</a>-->
                        <!--                        <span class="post-date">Dec 27, 2018</span>-->
                        <!--                    </li>-->
                        <!--                    <li>-->
                        <!--                        <a href="single-post.html">15 Of The World's Best Carnivals</a>-->
                        <!--                        <span class="post-date">Dec 25, 2018</span>-->
                        <!--                    </li>-->
                    </ul>
                </div>
                <!-- CATEGORIES -->
                <!--            <div class="eskimo-categories eskimo-widget">-->
                <!--                <h5 class="eskimo-title-with-border"><span>Categories</span></h5>-->
                <!--                <ul>-->
                <!--                    <li>-->
                <!--                        <a href="category.html" title="The best restaurants, cafes, bars and shops in town.">Food &amp; Drink</a> <span class="badge badge-pill badge-default">5</span>-->
                <!--                    </li>-->
                <!--                    <li>-->
                <!--                        <a href="category.html" title="An up-to-date, personal urban guide.">Lifestyle</a> <span class="badge badge-pill badge-default">5</span>-->
                <!--                    </li>-->
                <!--                    <li>-->
                <!--                        <a href="category.html" title="Latest technology news and updates.">Technology</a> <span class="badge badge-pill badge-default">4</span>-->
                <!--                    </li>-->
                <!--                    <li>-->
                <!--                        <a href="category.html" title="Travel advice, information and inspiration.">Travel</a> <span class="badge badge-pill badge-default">5</span>-->
                <!--                    </li>-->
                <!--                    <li>-->
                <!--                        <a href="category.html" title="The latest news about movies and TV shows.">TV &amp; Movies</a> <span class="badge badge-pill badge-default">4</span>-->
                <!--                    </li>-->
                <!--                </ul>-->
                <!--            </div>-->
                <!-- TAGS -->
                <!--            <div class="eskimo-widget">-->
                <!--                <h5 class="eskimo-title-with-border"><span>Tags</span></h5>-->
                <!--                <div class="eskimo-tag-cloud">-->
                <!--                    <a href="category.html">aute<span>7</span></a>-->
                <!--                    <a href="category.html">enim<span>7</span></a>-->
                <!--                    <a href="category.html">commodo<span>7</span></a>-->
                <!--                    <a href="category.html">voluptatibus<span>7</span></a>-->
                <!--                    <a href="category.html">culpa<span>7</span></a>-->
                <!--                    <a href="category.html">offendit<span>7</span></a>-->
                <!--                    <a href="category.html">magna<span>7</span></a>-->
                <!--                    <a href="category.html">quorum<span>7</span></a>-->
                <!--                    <a href="category.html">mandaremus<span>7</span></a>-->
                <!--                    <a href="category.html">ingeniis<span>7</span></a>-->
                <!--                    <a href="category.html">tempor<span>7</span></a>-->
                <!--                    <a href="category.html">summis<span>7</span></a>-->
                <!--                    <a href="category.html">consequat<span>6</span></a>-->
                <!--                    <a href="category.html">iudicem<span>6</span></a>-->
                <!--                    <a href="category.html">expetendis<span>6</span></a>-->
                <!--                    <a href="category.html">deserunt<span>6</span></a>-->
                <!--                </div>-->
                <!--            </div>-->
            </div>
        </aside>
    </div>

    <!-- 边栏-->
    <!-- FULLSCREEN SEARCH -->
    <div id="eskimo-fullscreen-search">
        <div id="eskimo-fullscreen-search-content">
            <a href="#" id="eskimo-close-search"><i class="fa fa-times"></i></a>
            <form role="search" method="get" action="../search.html" class="eskimo-lg-form">
                <div class="input-group">
                    <input type="text" class="form-control form-control-lg" placeholder="Enter a keyword..." name="s" />
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- JS FILES -->
    <script src="../../lib/js/jquery/jquery.min.js"></script>
    <script src="../../lib/js/bootstrap.min.js"></script>
    <script src="../../lib/js/salvattore.min.js"></script>
    <script src="../../lib/js/panel.js"></script>
    <script src="../../lib/js/reading-position-indicator.js"></script>
    <script src="../../lib/js/rrssb.min.js"></script>
    <script src="../../lib/js/featherlight.js"></script>
    <script src="../../lib/js/custom.js"></script>
<!--    <script src="../lib/js/"-->
<script>
    $.ajax({
        type:"GET",
     url:"viewPassageList.php",
        dataType:"json",
        cache:false,
        data:"mode=ALL",
        success:function (datafeedback) {
            console.log(datafeedback);
            let container=$("#passage-container");
container.empty();
            $.each(datafeedback,function (index,obj) {

                let html="<div id=\"mp-accordion-item-5\" class=\"collapse show\" role=\"tabpanel\">\n" +
                    "                            <div class=\"mp-accordion-content\">" +

                    "                                <h5>"+obj["title"]+"\n" +
                    "                                <a>"+obj["time"]+"</a>\n" +
                    "                                <a id='passage_id'>"+"ID:"+obj["id"]+"</a>\n" +
                    "                                    <button class=\"ediButton\"><i class=\"fa fa-file\">编辑</i></button>\n" +
                    "                                    <button class=\"delButton\"><i class=\"fa fa-times\">删除</i></button>\n" +
                    "                                </h5>\n" +
                    "                            </div>\n" +
                    "                        </div>";
                container.append(html);
            })
        }


    });


    $("#passage-container").on("click",".delButton",function () {
        let $id=$(this).siblings("#passage_id").html();
        console.log($id);
        let $block=$(this).parent().parent().parent();
        $block.remove();
        $.ajax({
            type:"POST",
            url:"deletepessage.php",
            data:"pesId="+$id,
            success:function (datafeedback) {
                console.log(datafeedback);
            }
        });
    });
    $("#passage-container").on("click",".ediButton",function () {
        let $id=$(this).siblings("#passage_id").html().split(":")[1];
        console.log($id);
       window.location.href="../modify.html?id="+$id;
    });
    $(".addButton").on("click",function () {
        let $id=$(this).siblings("#passage_id").html();
        console.log($id);
        window.location.href="../editor.html";
    });

    </script>

</body>


</html>