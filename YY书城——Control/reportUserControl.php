<?php
session_start();
//引入report模型
include('ReportModel.php');

//接受数据
$status = 0;
$report = $_POST['report'];
$be_report_user= $_POST['user'];
$report_user_name = $_SESSION['username'];
$report_user_id = $_SESSION['userid'];
$imgname     = $_FILES['bookPicture']['name'];//文件名称
$tmp         = $_FILES['bookPicture']['tmp_name'];//临时存储的文件名

//获取回复数据
if(move_uploaded_file($tmp,$imgname))
{
$label = new Report();
$label->status = $status;
$label->imgname = $imgname;
$label->report = $report;
$label->report_user_name = $report_user_name;
$label->report_user_id = $report_user_id;
$label->be_report_user = $be_report_user;
if($label->insert())
{
    echo "<script>alert('举报成功！');history.go(-2);</script>";
}
}