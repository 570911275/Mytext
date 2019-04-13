<?php
         function updatePraise($praise,$praiseWeiboId)
         {
            $conn=mysqli_connect('localhost','root','a570911275','weibo') or die('连接数据库服务器失败！');
            $update_sql = "update weibo_info set praise=$praise+1 where id=$praiseWeiboId";
            $update_query = mysqli_query($conn,$update_sql) or die(mysqli_error($conn));
            $update_row = @mysqli_fetch_array($update_query);
            return $update_row;
         }
         function updateFriend($apply_status1,$my_name,$friend_user)
         {
            $conn=mysqli_connect('localhost','root','a570911275','weibo') or die('连接数据库服务器失败！');
            $update_sql = "update friend_apply set apply_status='$apply_status1' where be_apply_user='$my_name' and apply_user='$friend_user' ";
            $update_query = mysqli_query($conn,$update_sql) or die(mysqli_error($conn));
            return $update_query;
         }
      };

?>