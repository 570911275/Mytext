<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/heml; charset=utf-8"/>
<title>===YY微博===</title>
<style type="text/css">
    html{font-size:12px;}
    fieldset{width:300px; margin: 0 auto;}
    legend{font-weight:bold; font-size:14px;}
    .label{float:left; width:70px; margin-left:10px;}
    .left{margin-left:80px;}
    .input{width:150px;}
    span{color: #666666;}
</style>
</head>
<body>
<?php
session_start();
include "conn.php";
// 微博信息php
// 微博头部php
?>
<table class='indextemp' width="98%" border="0" align="center" cellpaddding="0" cellspacing="1" bgcolor="#FFFFFF">
    <tr>
        <td width="40%" height="25" align="center" valign="middle" bgcolor="5F8AC5">
            <span class="STYLE2">微博类型</span></td>
        <td width="30%" align="center" valign="middle" bgcolor="5F8AC5">
            <span class="STYLE2">微博数目</span></td>
        <td width="30%" align="center" valign="middle" bgcolor="5F8AC5">
            <span class="STYLE2">最新微博</span></td>
    </tr>  