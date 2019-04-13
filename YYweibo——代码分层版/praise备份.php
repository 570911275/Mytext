<?php
session_start();
//包含数据库文件
include('conn.php');
include('MySQL.php');

//获取点赞用户id以及被点赞微博id
$praiseUserId = $_SESSION['userid'];
$praiseWeiboId = $_SESSION['be_id'];

//判断数据库中是否存在该id——SQL语句

$selectId_praise = new select();
$select_query = $selectId_praise->selectId_praise($praiseUserId,$praiseWeiboId);

//判断数据库中是否存在该id——if语句控制插入或者点赞失败
if($select_row = mysqli_fetch_array($select_query))
{
    echo "<script>alert('不可重复点赞');history.go(-1);</script>";

}
else
{
        //插入数据进入数据库，并且更新点赞数量
    //插入数据
    $insertPraise = new insert();
    $insertPraise = $insertPraise->insertPraise($praiseUserId,$praiseWeiboId);
    //更新数据——读取weibo_info中的点赞数
    $selectId_praise_weibo = new select();
    $sel_row = $selectId_praise_weibo->selectId_praise_weibo($praiseWeiboId);
    $praise = $sel_row['praise'];
    //更新数据——更新weibo_indo中的点赞数 
    $updatePraise = new select();
    $update_row = $updatePraise->updatePraise($praise,$praiseWeiboId);
    echo "<script>alert('点赞成功');history.go(-1);</script>";
}
?>