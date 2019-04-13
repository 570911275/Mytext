<?php
session_start();

//包含数据库文件
include('conn.php');
include('MySQL.php');

//获取申请人数据
$be_apply_user=$_SESSION['username'];
$apply_status = 0;
$selectFriend2 = new select();
$select_row = $selectFriend2->selectFriend2($be_apply_user,$apply_status);

//获取数据
$my_id = $_SESSION['userid'];
$my_user = $_SESSION['username'];
$friend_id = $select_row['apply_id'];
$friend_user = $select_row['apply_user'];

//判断是否同意并更新数据库
$aradio = $_POST['aradio'];
$apply_status1 = 1;
$apply_status2 = 2;
if($aradio == 'a1')
{
    //更新friend——apply申请状态
    $updateFriend = new update();
    $update_query = $updateFriend->updateFriend($apply_status1,$my_name,$friend_user);
    //插入数据进入friend_list表
    $insertFriend = new insert();
    $insert_query = $insertFriend->insertFriend($my_id,$my_user,$friend_id,$friend_user);
    echo "<script>alert('同意申请！');location.href='friendShow备份.php';</script>";
}
else if($aradio == 'a2')
{
    $updateFriend2 = new update();
    $update_query2 = $updateFriend2->updateFriend2($apply_status1,$my_name,$friend_user);
    echo "<script>alert('拒绝成功！');location.href='friendShow备份.php';</script>";
}
?>