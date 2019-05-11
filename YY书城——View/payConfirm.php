<?php
session_start();
//引入user模型
include('UserModel.php');
//引入左侧功能单
include('leftAbilityListView.php');
?>
<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=gb2312" />
<style type="text/css">
legend{font-weight:bold; font-size:30px; margin:0 auto; color:rgb(118, 173, 199)}
</style>
</head>
<body>
<div>
<fieldset>
<legend>YY书城——充值中心</legend>
</fieldset>
</div>
<div>
<fieldset>
<p>
<?php
    include 'common.php';
    // 获取用户提交的信息

    // 1.获取订单号
    $p0_Cmd = "Buy";
    $p1_MerId = "10012006921";
    $p2_Order = $_REQUEST['p2_Order'];
    $p3_Amt = $_REQUEST['p3_Amt'];
    $p4_Cur = "CNY";
    // 商品名称
    $p5_Pid = "";
    $p6_Pcat = ""; // 商品种类
    $p7_Pdesc = ""; // 商品介绍
    // 只是易宝支付成功后，给url返回信息
    $p8_Url = "http://loaclhost/FUCKPHP/onlinezhifu/res.php";
    $p9_SAF = "0"; // 送货地址
    $pa_MP = ""; // 额外介绍
    $pd_FrpId = $_REQUEST['pd_FrpId']; // 支付通道
    $pr_NeedResponse = "1"; // 应答机制
    // 把请求参数一个一个拼接
    $data="";
    $data=$data.$p0_Cmd;
    $data=$data.$p1_MerId;
    $data=$data.$p2_Order;
    $data=$data.$p3_Amt;
    $data=$data.$p4_Cur;
    $data=$data.$p5_Pid;
    $data=$data.$p6_Pcat;
    $data=$data.$p7_Pdesc;
    $data=$data.$p8_Url;
    $data=$data.$p9_SAF;
    $data=$data.$pa_MP;
    $data=$data.$pd_FrpId;
    $data=$data.$pr_NeedResponse;

    $merchantKey =" qV490l4XHJ6Dc32Zu7x90V43gVP4C5061938W01t47S1AY734Dcr27011546";
    // hmac是签名串，是用于易宝和商家互相确认的关键字
    // 使用算法来生成(md5-hmac算法)
    $hmac = HmacMd5($data,$merchantKey);
?>
            你的订单号是:<?php echo $p2_Order;  ?>支付的金额是<?php echo $p3_Amt; ?>
            <!-- 把要提交的数据用隐藏域表示 -->
<form action="https://www.yeepay.com/app-merchant-proxy/node" method="post">
    <input type="hidden" name="p0_Cmd" value="<?php echo $p0_Cmd; ?>"/>
    <input type="hidden" name="p1_MerId" value="<?php echo $p1_MerId; ?>"/>
    <input type="hidden" name="p2_Order" value="<?php echo $p2_Order; ?>"/>
    <input type="hidden" name="p3_Amt" value="<?php echo $p3_Amt; ?>"/>
    <input type="hidden" name="p4_Cur" value="<?php echo $p4_Cur; ?>"/>
    <input type="hidden" name="p5_Pid" value="<?php echo $p5_Pid; ?>"/>
    <input type="hidden" name="p6_Pcat" value="<?php echo $p6_Pcat; ?>"/>
    <input type="hidden" name="p7_Pdesc" value="<?php echo $p7_Pdesc; ?>"/>
    <input type="hidden" name="p8_Url" value="<?php echo $p8_Url; ?>"/>
    <input type="hidden" name="p9_SAF" value="<?php echo $p9_SAF; ?>"/>
    <input type="hidden" name="pa_MP" value="<?php echo $pa_MP; ?>"/>
    <input type="hidden" name="pd_FrpId" value="<?php echo $pd_FrpId; ?>"/>
    <input type="hidden" name="pr_NeedResponse" value="<?php echo $pr_NeedResponse; ?>"/>
    <input type="hidden" name="hmac" value="<?php echo $hmac; ?>"/>
    <input type="submit" value="确认网上支付"/>
    </p>
</fieldset>
</div>
</form>
</html>

