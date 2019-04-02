<?php
    //引入数据库连接文件
    require('conn.php');
     
    //判断是否有值
    if(empty($keys)) {
        $s = '';
    } else {
        $s = "  where `title` like '%$keys%'";
    }
  
    //获取数据库数据
    //SQL语句
    $sql = "select * from `weibo_info`".$s;
     
    //获取资源句柄
    $queryhandle = @mysqli_query($conn,$sql) or die('SQL执行失败！');   
     
    //获取总条数
    $totalnum = "SELECT COUNT(*) FROM `weibo_info`";
    $querytotal = mysqli_query($conn,$totalnum);
    $totlnum = mysqli_fetch_array($querytotal);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>添加微博</title>
    </head>
    <body>
        <a href= "add.php">添加微博</a>
        <hr/>
            <form action="index.php" method = "post">
                <input type="text" name = "keys" />
                <input type = "submit" name = "search" value="搜索" />
            </form>
        <hr/>
        <!-- 循环显示数据库内容 -->
        <?php while($result = mysqli_fetch_array($queryhandle)) { ?>
            <h3>标题：<a href = "disinfo.php?id=<?php echo $result['id'] ?>"><?php echo $result['title'] ?></a>  <br>　　　　　　　　 |  <a href = "update.php?id=<?php echo $result['id'] ?>"> 编辑 </a> | <a href = "delete.php?id=<?php echo $result['id'] ?>"> 删除 </a> |</h3>
            <h3>时间：<?php echo $result['datetime'] ?> </h3>
            <h3>点击量：<?php echo $result['click'] ?> </h3>
            <p><?php echo $result['content'] ?> </p>
            <hr/>
        <?php } ?>
    </body>
</html>