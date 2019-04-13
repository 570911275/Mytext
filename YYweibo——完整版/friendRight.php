<?php
session_start();

//包含数据库文件
include('conn.php');

//获取申请人数据
$be_apply_user=$_SESSION['username'];
$apply_status = 0;
$select_sql = "select * from friend_apply where be_apply_user='$be_apply_user' and apply_status='$apply_status' ";
$select_query = mysqli_query($conn,$select_sql) or die(mysqli_error($conn));
$select_row=mysqli_fetch_array($select_query);

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
    $update_sql = "update friend_apply set apply_status='$apply_status1' where be_apply_user='$be_apply_user' and apply_user='$friend_user' ";
    $update_query = mysqli_query($conn,$update_sql) or die(mysqli_error($conn));
    //插入数据进入friend_list表
    $insert_sql = "insert into friend_list(my_id,my_user,friend_id,friend_user) values('$my_id','$my_user','$friend_id','$friend_user')";
    $insert_query = mysqli_query($conn,$insert_sql) or die(mysqli_error($conn));
    echo "<script>alert('同意申请！');location.href='friendShow.php';</script>";
}
else if($aradio == 'a2')
{
    $update_sql = "update friend_apply set apply_status='$apply_status2' ";
    $update_query = mysqli_query($conn,$update_sql) or die(mysqli_error($conn));
    echo "<script>alert('拒绝成功！');location.href='friendShow.php';</script>";
}
?>