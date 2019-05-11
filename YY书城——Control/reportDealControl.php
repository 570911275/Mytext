<?php
session_start();
//引入report模型
include('ReportModel.php');

//接受数据
$report = $_POST['report'];
$report_id = $_SESSION['report_id'];
$report_user_name = $_SESSION['username'];
$report_user_id = $_SESSION['userid'];
$imgname     = $_FILES['bookPicture']['name'];//文件名称
$tmp         = $_FILES['bookPicture']['tmp_name'];//临时存储的文件名

//获取回复数据
if(move_uploaded_file($tmp,$imgname))
{
$label = new Report();
$label->imgname = $imgname;
$label->report_id = $report_id;
$label->report_user_name = $report_user_name;
$label->report_user_id = $report_user_id;
$label->report = $report;
//更新回复状态
$label_update = Report::findOne(['id'=>$report_id]);
$label_update->status = 1;
$label_update->update();
if($label->insert())
{
    echo "<script>alert('回复成功！');history.go(-2);</script>";
}
}