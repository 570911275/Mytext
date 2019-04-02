<?php
//接受信息    
$title = $_POST['title'];
$content = $_POST['content'];
$weiboName = $_POST['weiboName'];
$author = $_POST['author'];

//判断微博类别
if($title == '体育')
{
    echo"体育";
}else if($title == '娱乐')
{
    echo"娱乐";
}else if($title == '科技')
{
    echo"科技";
}else if($title == '教育')
{
    echo"教育";
}else if($title == '时尚')
{
    echo"时尚";
}else if($title == '新闻')
{
    echo"新闻";
}

//判断是否填写信息
    if($title==''||$content==''||$weiboName==''||$author=='')
    {
        echo "请填写微博类别、微博标题、微博作者以及微博内容";
        exit;
    }    

//包含数据库文件
include('conn.php');

//获取当前时间
    $pub_time=date("Y-m-d H:i:s");

//插入数剧进入数据库
    $sql = "insert into weibo_info(title,pub_time,content,weiboName,author) values ('$title','$pub_time','$content','$weiboName','$author')";

//执行插入
    if(mysqli_query($conn,$sql) or die('sql执行异常'))
    {
        echo "<script>alert('微博添加成功');location.href='index.php';</script>";
    }
?>
