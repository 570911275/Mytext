<?php
session_start();
//引入report模型
include('ReportModel.php');

//接受数据
$status = 0;
$report = $_POST['report'];
$be_report_store= $_POST['store'];
$be_report_book= $_POST['book'];
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
$label->be_report_book = $be_report_book;
$label->be_report_store = $be_report_store;
if($label->insert())
{
    echo "<script>alert('举报成功！');history.go(-2);</script>";
}
}