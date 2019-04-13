<?php
      class delete{
        function deleteWeibo($id)
        {
           $conn=mysqli_connect('localhost','root','a570911275','weibo') or die('连接数据库服务器失败！');
           $delete ="delete from weibo_info where id='$id' limit 1";
           $delete_query = mysqli_query($conn,$delete) or die('SQL执行失败');
           return $delete_query;
        }
     };

?>