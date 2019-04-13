<?php
session_start();
//包含数据库文件
include('conn.php');

//获取点赞用户id以及被点赞微博id
$praiseUserId = $_SESSION['userid'];
$praiseWeiboId = $_SESSION['be_id'];

//判断数据库中是否存在该id——SQL语句
$select_sql = "select * from weibo_praise where praise_id=$praiseUserId and be_praise_weiboid=$praiseWeiboId";
$select_query = mysqli_query($conn,$select_sql) or die(mysqli_error($conn));;
//$select_row = mysqli_fetch_array($select_query);

//判断数据库中是否存在该id——if语句控制插入或者点赞失败
if($select_row = mysqli_fetch_array($select_query))
{
    echo "<script>alert('不可重复点赞');history.go(-1);</script>";
    //插入数据进入数据库，并且更新点赞数量
}
else
{
        //插入数据进入数据库，并且更新点赞数量
    //插入数据
    $insert_sql = "insert into weibo_praise(praise_id,be_praise_weiboid) values('$praiseUserId','$praiseWeiboId')";
    $insert_query = mysqli_query($conn,$insert_sql) or die(mysqli_error($conn));
    $insert_row = @mysqli_fetch_array($insert_query);
    //更新数据——读取weibo_info中的点赞数
    $sel_sql = "select * from weibo_info where id=$praiseWeiboId";
    $sel_query = mysqli_query($conn,$sel_sql) or die($mysqli_error($conn));
    $sel_row = mysqli_fetch_array($sel_query);
    $praise = $sel_row['praise'];
    //更新数据——更新weibo_indo中的点赞数 
    $update_sql = "update weibo_info set praise=$praise+1 where id=$praiseWeiboId";
    $update_query = mysqli_query($conn,$update_sql) or die(mysqli_error($conn));
    $update_row = @mysqli_fetch_array($update_query);
    echo "<script>alert('点赞成功');history.go(-1);</script>";
    //echo "<script>alert('不可重复点赞');history.go(-1);</script>";
}
?>