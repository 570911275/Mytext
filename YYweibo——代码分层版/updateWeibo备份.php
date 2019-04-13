<?php
//包含数据库连接文件
include('conn.php');
include('MySQL.php');
     
//接收id
if(!empty($_GET['id'])) 
{   
//接收数据
$id = $_GET['id'];

//获取数据得到原来的微博内容
$selectId_weibo = new select();
$result = $selectId_weibo->selectId_weibo($id);
}
     
//判断是否提交数据
if(!empty($_POST['submit'])) 
{
//接收数据
$hid = $_POST['hid'];
$title = $_POST['title'];
$content = $_POST['content'];
         
    //判断是否已填写信息
    if($title == '' || $content == '') 
    {
         echo '请填写完整信息！';
         exit();
    }
         
    //更新微博内容数据
    $sql2 = "UPDATE `weibo_info` SET `title` = '$title', `content` = '$content'  WHERE id = '$hid'";
    //执行并判断是否执行成功
    if( mysqli_query($conn,$sql2) or die('SQL执行异常！'))
    {
        echo "<script>alert('微博修改成功');location.href='my.php';</script>";
        exit;
    }
}   
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>修改微博</title>
            <style type="text/css">
                html{font-size: 25px;}
                fieldset{width:300px; margin: 0 auto;}
                legend{font-weight:bold; font-size:14px;}
                .label{float:left; width:85px; margin-left:15px;}
                .left{margin-left:80px;}
                .input{width:150px;}
                span{color: paleturquoise;}
            </style>
    </head>
    <body
    background="背景图片4-皮卡丘喝牛奶.jpg" 
    style=" background-repeat:no-repeat ;
    background-size:100% 100%; 
    background-attachment: fixed;"
    >
        <a href= "my.php">返回用户中心</a><br/>
        <form action="updateWeibo.php" method="POST">
            <input type = "hidden" name = "hid" value = "<?php echo $result['id'] ?>">
            <p>
            微博标题：<input type="text" name="title" value="<?php echo $result['title'] ?>" /><br/>
            </p>
            <p>
            微博内容：<textarea rows="3" name="content"><?php echo $result['content'] ?></textarea><br/>
            </p>
            <p>
            <input type="submit" name="submit" value="  修 改  " class="left" />
            <input type="RESET" value="  重 置  " class="right"/>
            </p>
        </form>
    </body>
</html>