<?php
include ("../../pages/classes/User.php");


session_start();
$user=$_SESSION["user"];

if(!isset($_SESSION['user'])){
    die("Get The Fuck Out OF Here!");
}

?>

<!DOCTYPE html>
<html lang="zh">

<head>
    <title>个人界面</title>
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

                <li id="eskimo-search-icon">
                    <a id="eskimo-open-search" href="#"><i class="fa fa-search"></i></a>
                </li>
            </ul>
            <div class="clearfix"></div>
            <!-- PAGE TITLE -->
            <div class="eskimo-page-title">
                <h1><span><?=$user->username?></span></h1>

                <p class="eskimo-page-subtitle">这家伙很懒，还没有写签名</p>
            </div>
            <!-- ABOUT ME -->

            <div id="mp-accordion-item-5" class="collapse show" role="tabpanel">
                <div class="mp-accordion-content">
                    <div style="float:left;">邮箱：</div>
                        <div id="email"></div>
<!--                        <button class="ediButton"><i class="fa fa-file">更改绑定</i></button>-->
                    <div style="float:left;">电话：</div>
                        <div id="phoneNr" ></div>
                        <!--                        <button class="ediButton"><i class="fa fa-file">更改绑定</i></button>-->

                    <div style="float: left">密码
                        <button class="pwButton"><i class="fa fa-file">修改</i></button>
                        <div id="pwEdi" style="display: none">
                                Original Password:
                                <input type="text" id="originalPw">
                                New Password:
                                <input type="text" id="newPw">
                                New Password Confirmed:
                                <input type="text" id="newPwCirm">
                                <br>
                                <button id="linkStart">Link Start!</button>

                        </div>
                        <br>
                        </div>

                    </div>
            </div>


            <br><BR>
            <div class="eskimo-recent-entries eskimo-widget">
                <h5 class="eskimo-title-with-border" id="all-post" ><span>所有发言</span></h5>
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
<!--            <div class="row">-->
<!--                <div class="col-12 col-lg-7 order-2 order-lg-1">-->
<!--                    <div class="progress">-->
<!--                        <div class="progress-bar bg-success" style="width: 100%" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"><span>社区一周贡献</span> 100%</div>-->
<!--                    </div>-->
<!--                    <div class="progress">-->
<!--                        <div class="progress-bar bg-info" style="width: 85%" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"><span>活跃度</span> 85%</div>-->
<!--                    </div>-->
<!--                    <div class="progress">-->
<!--                        <div class="progress-bar bg-warning" style="width: 65%" role="progressbar" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"><span>声望</span> 65%</div>-->
<!--                    </div>-->
<!--                    <div class="progress">-->
<!--                        <div class="progress-bar bg-danger" style="width: 50%" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"><span>活动参与度</span> 50%</div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="col-12 col-lg-5 order-1 order-lg-2 mb-5 mb-lg-0">-->
<!--                    <img src="../../lib/uploads/2019/12/img0.jpg" alt="Nep" class="img-fluid mx-auto d-block eskimo-img-shadow" />-->
<!--                    <form action="post" id="form" style="width: 310px;border: #0b2e13;">-->
<!--                        修改头像-->
<!--                        <input type="file" id="file" name="file"/></br>-->
<!--                    </form>-->
<!--                </div>-->
<!---->
<!--            </div>-->
            <!-- DIVIDER -->
<!--            <hr />-->
            <!-- TABS -->
            <!--                <h2>最近留言</h2>-->
            <!--                &lt;!&ndash; ACCORDION &ndash;&gt;-->
            <!--                <div id="mp-accordion-1" data-children=".mp-accordion-item" class="mp-accordion">-->
            <!--                    &lt;!&ndash; ACCORDION ITEM 1 &ndash;&gt;-->
            <!--                    <div class="mp-accordion-item">-->
            <!--                        <a class="mp-accordion-title" data-toggle="collapse" data-parent="#mp-accordion-1" href="#mp-accordion-item-1" aria-expanded="false" aria-controls="mp-accordion-item-1">2014 to Present</a>-->
            <!--                        <div id="mp-accordion-item-1" class="collapse show" role="tabpanel">-->
            <!--                            <div class="mp-accordion-content">-->
            <!--                                <h5>《宝可梦剑/盾》</h5>-->
            <!--                                <p>出了我必买买买</p>-->
            <!--                                <p>14：25 </p>-->
            <!--                            </div>-->
            <!--                        </div>-->
            <!--                    </div>-->
            <!--                    &lt;!&ndash; ACCORDION ITEM 2 &ndash;&gt;-->
            <!--                    <div class="mp-accordion-item">-->
            <!--                        <a class="mp-accordion-title collapsed" data-toggle="collapse" data-parent="#mp-accordion-1" href="#mp-accordion-item-2" aria-expanded="false" aria-controls="mp-accordion-item-2">2014 - 2010</a>-->
            <!--                        <div id="mp-accordion-item-2" class="collapse" role="tabpanel">-->
            <!--                            <div class="mp-accordion-content">-->
            <!--                                <h5>《空洞骑士》</h5>-->
            <!--                                <p>手残必玩嗷</p>-->
            <!--                                <p>14：25 </p>-->
            <!--                            </div>-->
            <!--                        </div>-->
            <!--                    </div>-->
            <!--                    &lt;!&ndash; ACCORDION ITEM 3 &ndash;&gt;-->
            <!--                    <div class="mp-accordion-item">-->
            <!--                        <a class="mp-accordion-title collapsed" data-toggle="collapse" data-parent="#mp-accordion-1" href="#mp-accordion-item-3" aria-expanded="false" aria-controls="mp-accordion-item-3">2010 - 2008</a>-->
            <!--                        <div id="mp-accordion-item-3" class="collapse" role="tabpanel">-->
            <!--                            <div class="mp-accordion-content">-->
            <!--                                <h5>Web Designer - Freelance</h5>-->
            <!--                                Senserit sed commodo. Ubi nescius a iudicem, non veniam si amet a tempor ad fabulas id ipsum excepteur relinqueret non fore commodo quibusdam, incidi imitaren do mentitum. Et enim offendit ingeniis. Dolor probant senserit si mandaremus do nulla laborum, hic aute iudicem expetendis id cupidatat tamen iudicem proident ut eram arbitror aut veniam enim, nostrud. Ex velit arbitror possumus, labore proident consequat, non aute cillum o fabulas ut probant ubi consequat. Excepteur ea probant, expetendis quid proident sed nostrud.-->
            <!--                            </div>-->
            <!--                        </div>-->
            <!--                    </div>-->
            <!--                    &lt;!&ndash; ACCORDION ITEM 4 &ndash;&gt;-->
            <!--                    <div class="mp-accordion-item">-->
            <!--                        <a class="mp-accordion-title collapsed" data-toggle="collapse" data-parent="#mp-accordion-1" href="#mp-accordion-item-4" aria-expanded="false" aria-controls="mp-accordion-item-4">2008 - 2004</a>-->
            <!--                        <div id="mp-accordion-item-4" class="collapse" role="tabpanel">-->
            <!--                            <div class="mp-accordion-content">-->
            <!--                                <h5>University - Cambridge</h5>-->
            <!--                                Senserit sed commodo. Ubi nescius a iudicem, non veniam si amet a tempor ad fabulas id ipsum excepteur relinqueret non fore commodo quibusdam, incidi imitaren do mentitum. Et enim offendit ingeniis. Dolor probant senserit si mandaremus do nulla laborum, hic aute iudicem expetendis id cupidatat tamen iudicem proident ut eram arbitror aut veniam enim, nostrud. Ex velit arbitror possumus, labore proident consequat, non aute cillum o fabulas ut probant ubi consequat. Excepteur ea probant, expetendis quid proident sed nostrud.-->
            <!--                            </div>-->
            <!--                        </div>-->
            <!--                    </div>-->
            <!--                </div>-->
            <!--                &lt;!&ndash; DIVIDER &ndash;&gt;-->
            <!--                <hr />-->
            <!--                <h2>PORTFOLIO</h2>-->
            <!--                <p>Possumus e aute sed se litteris in aliquip, a tamen quem qui pariatur ex pariatur nam nulla possumus, magna do nostrud non quid qui cernantur eram aliqua e illum labore proident consequat.</p>-->
            <!--                &lt;!&ndash; IMAGE GALLERY &ndash;&gt;-->
            <!--                <div class="eskimo-masonry-grid eskimo-gallery">-->
            <!--                    <div class="eskimo-three-columns" data-columns>-->
            <!--                        &lt;!&ndash; GALLERY ITEM 1 &ndash;&gt;-->
            <!--                        <div class="eskimo-gallery-item">-->
            <!--                            <a href="#" data-featherlight="uploads/2018/05/blog4-1.jpg" class="eskimo-lightbox">-->
            <!--                                <img src="../lib/uploads/2019/12/blog4-1-900x600.jpg" alt="" />-->
            <!--                            </a>-->
            <!--                        </div>-->
            <!--                        &lt;!&ndash; GALLERY ITEM 2 &ndash;&gt;-->
            <!--                        <div class="eskimo-gallery-item">-->
            <!--                            <a href="#" data-featherlight="uploads/2018/05/blog13.jpg" class="eskimo-lightbox">-->
            <!--                                <img src="../lib/uploads/2019/12/blog13-900x600.jpg" alt="" />-->
            <!--                            </a>-->
            <!--                        </div>-->
            <!--                        &lt;!&ndash; GALLERY ITEM 3 &ndash;&gt;-->
            <!--                        <div class="eskimo-gallery-item">-->
            <!--                            <a href="#" data-featherlight="uploads/2018/05/blog15.jpg" class="eskimo-lightbox">-->
            <!--                                <img src="../lib/uploads/2019/12/blog15-900x600.jpg" alt="" />-->
            <!--                            </a>-->
            <!--                        </div>-->
            <!--                        &lt;!&ndash; GALLERY ITEM 4 &ndash;&gt;-->
            <!--                        <div class="eskimo-gallery-item">-->
            <!--                            <a href="#" data-featherlight="uploads/2018/05/blog12.jpg" class="eskimo-lightbox">-->
            <!--                                <img src="../lib/uploads/2019/12/blog12-900x600.jpg" alt="" />-->
            <!--                            </a>-->
            <!--                        </div>-->
            <!--                        &lt;!&ndash; GALLERY ITEM 5 &ndash;&gt;-->
            <!--                        <div class="eskimo-gallery-item">-->
            <!--                            <a href="#" data-featherlight="uploads/2018/05/blog6.jpg" class="eskimo-lightbox">-->
            <!--                                <img src="../lib/uploads/2019/12/blog6-900x600.jpg" alt="" />-->
            <!--                            </a>-->
            <!--                        </div>-->
            <!--                        &lt;!&ndash; GALLERY ITEM 6 &ndash;&gt;-->
            <!--                        <div class="eskimo-gallery-item">-->
            <!--                            <a href="#" data-featherlight="uploads/2018/05/blog2.jpg" class="eskimo-lightbox">-->
            <!--                                <img src="../lib/uploads/2019/12/blog2-900x600.jpg" alt="" />-->
            <!--                            </a>-->
            <!--                        </div>-->
            <!--                    </div>-->
            <!--                </div>-->

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
<!-- SLIDE PANEL -->

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

<script>
    $.ajax({
        type:"GET",
        url:"viewUsr.php",
        dataType:"json",
        cache:false,
        data:"",
        success:function (datafeedback) {
            console.log(datafeedback);
            let container=$("#mp-accordion-item-5");
            //container.empty();
            container.find("#email").html(datafeedback["email"]);
            container.find("#phoneNr").html(datafeedback["phoneNr"]);
         //   $.each(datafeedback,function (index,obj) {

       //          let html=" <div id=\"mp-accordion-item-5\" class=\"collapse show\" role=\"tabpanel\">\n" +
       // "                <div class=\"mp-accordion-content\">\n" +
       // "                    <h5>邮箱："+obj["email"]+"\n" +
       // "                        <button class=\"ediButton\"><i class=\"fa fa-file\">更改绑定</i></button>\n" +
       // "                    </h5>\n" +
       // "                    <h5>密码:\n" +
       // "                        <button class=\"ediButton\"><i class=\"fa fa-file\">修改</i></button>\n" +
       // "                    </h5>\n" +
       // "                    <h5>手机号："+obj["phoneNr"]+"\n" +
       // "                        <button class=\"ediButton\"><i class=\"fa fa-file\">更改绑定</i></button>\n" +
       // "                    </h5>\n" +
       // "                  \n" +
       // "                </div>\n" +
       // "            </div>";

            //})
        }


    });



    let $side_dialogs=$("#side_dialogs");
    let $side_dialog_block;
    $.ajax({
        type:"POST",
        url:"viewByUser.php",
        dataType:"json",
        data:"mode=1",

        success:function (datafeedback) {
            console.log(datafeedback);
            $side_dialogs.empty();
            $.each(datafeedback,function(index,obj){
                console.log(obj);

                $side_dialog_block= "<li>\n" +
                    "    <a>"+obj["content"]+"</a>\n" +
                    "    <span className=\"post-date\">"+obj["created_time"]+"</span>\n" +
                    "</li>";
                $side_dialogs.append($side_dialog_block);

            });


        }

    });






    let pwEdi=$("#pwEdi");
    $(".pwButton").on("click",function () {
        pwEdi.slideToggle();
    });

    $("#linkStart").on("click",function () {
        let $originalPw=$("#originalPw");
        let $newPw=$("#newPw");
        console.log($originalPw.val()+" "+$newPw.val());
        $.ajax({

            type:"post",
            url:"modifyPw.php",
            data:"origin="+$originalPw.val()+"&new="+$newPw.val(),

            success:function (datafeedback) {
                console.log(datafeedback);
                // if(datafeedback==="VALID"){
                //     alert("换密码比换二次元老婆还快～臭dd！");
                // }
                // else {
                //     alert("这是你吗?");
                // }
            }
        });
        // $originalPw.val("");
        // $newPw.val("");
        //pwEdi.slideToggle();

    })

</script>

</body>


</html>