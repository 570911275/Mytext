<?php
if (!session_id()) session_start();
$show_power = $_SESSION['show_power'];
?>
<html>
<head>
    <meta http-equiv="content-type" content="text/html" charset="utf-8">
    <title>功能分类导航菜单</title>
    <style>
        body {font-family:\5B8B\4F53,Arial Narrow,arial,serif;background:#ffffff;font-size:12px; color:#313131;}
        body,div,dl,dt,dd,ul,ol,li,pre,form,fieldset,input,textarea,blockquote{padding:0; margin:0;}
        li{list-style-type:none;}

        .wrap {width: 960px; margin:0px 0px;}
        .wrap .leftzone {float: left;width: 250px;margin:50px 0px;}

        .modTop .sidetitle{height:30px;background:#ccc; font-weight:bold;background-image: linear-gradient(-90deg, #29bdd9 0%, #276ace 100%);}
        .modTop em{float:left;padding:6px 0px 0px 80px;font-style:normal;color:#000;}
        .sidecontent{border-left:#CCC 15px solid;border-right:#CCC 1px solid;border-bottom:#CCC 1px solid;padding:6px;}

        .my_left_category{width:180px;}
        .my_left_category h1{height:20px;font-size:14px;font-weight:bold;padding-left:15px;padding-top:8px;margin:0px;color:#FFF;}
        .my_left_category .my_left_cat_list{width:178px;line-height:13.5pt;}
        .my_left_category .my_left_cat_list h2 {margin:0px;padding:3px 5px 0px 9px;}
        .my_left_category .my_left_cat_list h2 a {color:#d6290b;font-weight:bold;font-size:14px;line-height:22px;}
        .my_left_category .my_left_cat_list h2 a:hover {color:#d6290b;font-weight:bold;font-size:14px;line-height:22px;}
        .my_left_category .h2_cat{width:178px;height:26px;background-image:url('./images/my_menubg.gif');background-repeat:no-repeat;line-height:26px;font-weight:normal;color:#333333;position:relative;}
        .my_left_category .h2_cat_1{width:178px;height:26px;line-height:26px;font-weight:normal;color:#333333;position:relative;}
        .my_left_category a{font-size:12px;text-decoration:none;color:#333333;}
        .my_left_category a:hover{text-decoration:underline;color:#ff3333;}
        .my_left_category h3{margin:0px;padding:0px;height:26px;font-size:12px;font-weight:normal;display:block;padding-left:8px;}
        .my_left_category h3 span{color:#999999; width:145px; float:right;}
        .my_left_category h3 a{    line-height:26px;}
        .my_left_category .h3_cat{display:none;width:204px;position:absolute;left:153px;margin-top:-26px;cursor:auto;}
        .my_left_category .shadow{position:inherit;width:204px;}
        .my_left_category .shadow_border{position:inherit;width:200px;border:1px solid #959595; margin-top:1px;border-left-width:0px;background:url('./images/shadow_border.gif') no-repeat 0px 21px;background-color:#ffffff;margin-bottom:3px}
        .my_left_category .shadow_border ul{margin:0; padding:0; margin-left:15px}
        .my_left_category .shadow_border ul li {list-style:none;padding-left:10px;background-image:url('./images/my_cat_sub_menu_dot.gif');background-repeat:no-repeat;background-position:0px 8px;float:left;width:75px;height:26px;overflow:hidden;letter-spacing:0px;}
        .my_left_category .active_cat{ z-index:99;background-position:0 -25px;cursor:pointer;}
        .my_left_category .active_cat h3 { font-weight:bold}
        .my_left_category .active_cat h3 span{ display:none;}
        .my_left_category .active_cat div{display:block;}

    </style>
</head>
<body>
<div class="wrap">
    <div class="leftzone">
    <div class="modTop"><div class="sidetitle"><em>功能分类</em></div></div>
        <div class="sidecontent" >
            <div class="my_left_category">
                <div class="my_left_cat_list">
                <div class="h2_cat" onmouseover="this.className='h2_cat active_cat'" onmouseout="this.className='h2_cat'">
                        <h3><a href="javascript:history.back(-1)">返回上一页</a></h3>
                    </div>
                    <div class="h2_cat" onmouseover="this.className='h2_cat active_cat'" onmouseout="this.className='h2_cat'">
                        <h3><a href="carView.php">我的购物车</a></h3>
                    </div>
                    <div class="h2_cat" onmouseover="this.className='h2_cat active_cat'" onmouseout="this.className='h2_cat'">
                        <h3>我的订单</h3>
                        <div class="h3_cat">
                            <div class="shadow">
                                <div class="shadow_border">
                                    <ul>
                                        <li><a href="myOrderView.php">未支付订单</a></li>
                                        <li><a href="myOrderUndoView.php">未发货订单</a></li>
                                        <li><a href="myOrderUndo2View.php">已发货订单</a></li>
                                        <li><a href="myOrderDoView.php">已收货订单</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="h2_cat" onmouseover="this.className='h2_cat active_cat'" onmouseout="this.className='h2_cat'">
                        <h3><a href="myConcernView.php">我的关注</a></h3>
                    </div>
                    <div class="h2_cat" onmouseover="this.className='h2_cat active_cat'" onmouseout="this.className='h2_cat'">
                        <h3><a href="myCollectView.php">我的收藏</a></h3>
                    </div>
                    <div class="h2_cat" onmouseover="this.className='h2_cat active_cat'" onmouseout="this.className='h2_cat'">
                    <h3><a href="myCommentView.php">我的评论</a></h3>
                    </div>
                    <div class="h2_cat" onmouseover="this.className='h2_cat active_cat'" onmouseout="this.className='h2_cat'">
                    <h3><a href="myLocView.php">我的地址</a></h3>
                    </div>
                    <div class="h2_cat" onmouseover="this.className='h2_cat active_cat'" onmouseout="this.className='h2_cat'">
                    <h3><a href="myNewsView.php">我的消息</a></h3>
                    </div>
                    <div class="h2_cat" onmouseover="this.className='h2_cat active_cat'" onmouseout="this.className='h2_cat'">
                    <h3><a href="indexView.php">书城主页</a></h3>
                    </div>
                    <div class="h2_cat" onmouseover="this.className='h2_cat active_cat'" onmouseout="this.className='h2_cat'">
                    <h3><a href="myView.php">用户中心</a></h3>
                    </div>
                    <div class="h2_cat" onmouseover="this.className='h2_cat active_cat'" onmouseout="this.className='h2_cat'">
                    <h3>举报中心</h3>
                        <div class="h3_cat">
                            <div class="shadow">
                                <div class="shadow_border">
                                    <ul>
                                        <li><a href="reportStoreView.php">举报商家</a></li>
                                        <li><a href="reportUserView.php">举报用户</a></li>
                                        <li><a href="myReportView.php">举报反馈</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="h2_cat" onmouseover="this.className='h2_cat active_cat'" onmouseout="this.className='h2_cat'">
                    <h3><a href="applyStoreView.php">商家申请</a></h3>
                    </div>                    
                    <div class="h2_cat" onmouseover="this.className='h2_cat active_cat'" onmouseout="this.className='h2_cat'">
                    <h3><a href="pay.php">书城充值</a></h3>
                    </div>
                    <div class="h2_cat" onmouseover="this.className='h2_cat active_cat'" onmouseout="this.className='h2_cat'">
                    <h3><a href="loginView.php">注销登录</a></h3>
                    </div>
                    <!---->
                </div>
            </div>
        </div>


    <div <?php if($show_power<4) echo "style=\"display:none\"";?>>
    <div class="modTop"><div class="sidetitle"><em>商家功能分类</em></div></div>
        <div class="sidecontent" >
            <div class="my_left_category">
                <div class="my_left_cat_list">
                    <div class="h2_cat" onmouseover="this.className='h2_cat active_cat'" onmouseout="this.className='h2_cat'">
                        <h3><a href="myStoreView.php">我的商铺</a></h3>
                    </div>
                    <div class="h2_cat" onmouseover="this.className='h2_cat active_cat'" onmouseout="this.className='h2_cat'">
                        <h3>管理图书</h3>
                        <div class="h3_cat">
                            <div class="shadow">
                                <div class="shadow_border">
                                    <ul>
                                        <li><a href="bookAddView.php">增加图书</a></li>
                                        <li><a href="bookDeleteView.php">删除图书</a></li>
                                        <li><a href="bookUpdateView.php">修改图书</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="h2_cat" onmouseover="this.className='h2_cat active_cat'" onmouseout="this.className='h2_cat'">
                    <h3><a href="storeOrderUndoView.php">未处理订单</a></h3>
                    </div>
                    <div class="h2_cat" onmouseover="this.className='h2_cat active_cat'" onmouseout="this.className='h2_cat'">
                    <h3><a href="storeOrderDoView.php">已处理订单</a></h3>
                    </div>
                    <!---->
                </div>
            </div>
        </div>
        </div>     

        <div <?php if($show_power<5) echo "style=\"display:none\"";?>>
    <div class="modTop"><div class="sidetitle"><em>管理员功能分类</em></div></div>
        <div class="sidecontent" >
            <div class="my_left_category">
                <div class="my_left_cat_list">
                    <div class="h2_cat" onmouseover="this.className='h2_cat active_cat'" onmouseout="this.className='h2_cat'">
                        <h3><a href="regAuditView.php">审核用户注册申请</a></h3>
                    </div>
                    <div class="h2_cat" onmouseover="this.className='h2_cat active_cat'" onmouseout="this.className='h2_cat'">
                        <h3><a href="merchantAuditView.php">审核商家注册申请</a></h3>
                    </div>
                    <div class="h2_cat" onmouseover="this.className='h2_cat active_cat'" onmouseout="this.className='h2_cat'">
                        <h3><a href="storeAuditView.php">审核商铺注册申请</a></h3>
                    </div>
                    <div class="h2_cat" onmouseover="this.className='h2_cat active_cat'" onmouseout="this.className='h2_cat'">
                        <h3><a href="bookAuditView.php">审核图书上架申请</a></h3>
                    </div>
                    <div class="h2_cat" onmouseover="this.className='h2_cat active_cat'" onmouseout="this.className='h2_cat'">
                    <h3><a href="deleteErrorBookView.php">下架违规商品</a></h3>
                    </div>
                    <div class="h2_cat" onmouseover="this.className='h2_cat active_cat'" onmouseout="this.className='h2_cat'">
                    <h3><a href="deleteErrorStoreView.php">封锁违规商铺</a></h3>
                    </div>
                    <div class="h2_cat" onmouseover="this.className='h2_cat active_cat'" onmouseout="this.className='h2_cat'">
                    <h3><a href="deleteErrorUserView.php">封锁违规用户</a></h3>
                    </div>
                    <div class="h2_cat" onmouseover="this.className='h2_cat active_cat'" onmouseout="this.className='h2_cat'">
                    <h3><a href="reportUndoView.php">未读举报</a></h3>
                    </div>
                    <div class="h2_cat" onmouseover="this.className='h2_cat active_cat'" onmouseout="this.className='h2_cat'">
                    <h3><a href="reportDoView.php">已读举报</a></h3>
                    </div>
                    <!---->
                </div>
            </div>
        </div>
        </div>
    </div>
</div>

</body>
</html>