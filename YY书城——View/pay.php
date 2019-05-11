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
      body{background-image: linear-gradient(to right, #ff9569 0%, #e92758 100%);}
legend{font-weight:bold; font-size:30px; margin:0 auto; color:rgb(118, 173, 199)}
</style>
</head>
<body>
<div>
<fieldset>
<legend>YY书城——充值中心</legend>
</fieldset>
</div>
<form action="payConfirm.php" method="post">
<div>
<fieldset>
<p>
<table>
    <tr>
        <td colspan="4">
        订单号:<input type="text" name="p2_Order" /> 
        支付金额:<input type="text" name="p3_Amt" />
        </td>
    </tr>
    <tr>
    <td colspan="4">请选择支付银行</td>
    </tr>
    <tr>
    <td><input type="radio" name="pd_FrpId" value="CMBCHINA-NET-B2C" />招商银行</td>
    <td><input type="radio" name="pd_FrpId" value="ICBC-NET-B2C" />工商银行</td>
    <td><input type="radio" name="pd_FrpId" value="ABC-NET-B2C" />农业银行</td>
    <td><input type="radio" name="pd_FrpId" value="CCB-NET-B2C" />建设银行</td>
    </tr>
    <tr>
    <td colspan="4"><input type="submit" value="确认支付" /></td>
    </tr>
</table>
</p>
</fieldset>
</div>
</form>
</body>
</html>

