<?php
//包含数据库文件
      class select{
         function selectUser($username)
         {
            $conn=mysqli_connect('localhost','root','a570911275','weibo') or die('连接数据库服务器失败！');
            $sql = "select username from user_info where username='$username'";
            $query = mysqli_query($conn,$sql);
            $rows = mysqli_num_rows($query);
            return $rows;
         }
         function selectUser2($searchUser)
         {
            $conn=mysqli_connect('localhost','root','a570911275','weibo') or die('连接数据库服务器失败！');
            $sql = "select * from user_info where username='$searchUser'";
            $query = mysqli_query($conn,$sql);
            return $query;
         }
         function selectRight($username,$password,$email)
         {
            $conn=mysqli_connect('localhost','root','a570911275','weibo') or die('连接数据库服务器失败！');
            $check_query = "select id from user_info where username='$username' and password='$password' and email='$email'";
            $query = mysqli_query($conn,$check_query);
            $row = mysqli_fetch_array($query);
            return $row;
         }
         function selectUser_weibo($username)
         {
            $conn=mysqli_connect('localhost','root','a570911275','weibo') or die('连接数据库服务器失败！');
            $sql = "select * from `weibo_info` where author='$username'";
            $queryhandle = mysqli_query($conn,$sql) or die('sql执行失败');
            return $queryhandle;
         }
         function selectUser_letter($username)
         {
            $conn=mysqli_connect('localhost','root','a570911275','weibo') or die('连接数据库服务器失败！');
            $select_sql = "select * from weibo_letter where be_letter_user='$username'";
            $select_query = mysqli_query($conn,$select_sql) or die(mysqli_error($conn));            
            return $select_query;
         }
         function selectId_weibo($id)
         {
            $conn=mysqli_connect('localhost','root','a570911275','weibo') or die('连接数据库服务器失败！');
            $sql = "select * from `weibo_info` where id='$id'";
            $queryhandle = mysqli_query($conn,$sql) or die('sql执行失败');
            return $queryhandle;
         }
         function selectId_collect($myId)
         {
            $conn=mysqli_connect('localhost','root','a570911275','weibo') or die('连接数据库服务器失败！');
            $select_sql = "select * from weibo_collect where my_id=$myId";
            $select_query = mysqli_query($conn,$select_sql) or die(mysqli_error($conn));
            $select_row = mysqli_fetch_array($select_query);
            return $select_row;
         }
         function selectId_collect2($myId)
         {
            $conn=mysqli_connect('localhost','root','a570911275','weibo') or die('连接数据库服务器失败！');
            $select_sql = "select * from weibo_collect where my_id=$myId";
            $select_query = mysqli_query($conn,$select_sql) or die(mysqli_error($conn));
            return $select_query;
         }
         function selectCollect($myId,$myName,$collectId,$collectTime)
         {
            $conn=mysqli_connect('localhost','root','a570911275','weibo') or die('连接数据库服务器失败！');
            $insert_sql = "insert into weibo_collect(my_id,my_user,collect_id,collect_time) values('$myId','$myName','$collectId','$collectTime')";
            $insert_query = mysqli_query($conn,$insert_sql) or die(mysqli_error($conn));
            return $select_query;
         }
         function selectId_weibo2($id)
         {
            $conn=mysqli_connect('localhost','root','a570911275','weibo') or die('连接数据库服务器失败！');
            $sql = "select * from `weibo_info` where id='$id'";
            $queryhandle = mysqli_query($conn,$sql) or die('sql执行失败');
            $row = mysqli_fetch_array($queryhandle);
            return $row;
         }
         function selectVisitor($my_name)
         {
            $conn=mysqli_connect('localhost','root','a570911275','weibo') or die('连接数据库服务器失败！');
            $select_sql = "select * from weibo_visit where be_visitor='$my_name'";
            $select_query = mysqli_query($conn,$select_sql) or die(mysqli_error($conn));
            return $select_query;
         }
         function selectConcern($userid)
         {
            $conn=mysqli_connect('localhost','root','a570911275','weibo') or die('连接数据库服务器失败！');
            $select_sql = "select * from weibo_concern where concern_id=$userid ";
            $select_query = mysqli_query($conn,$select_sql) or die(mysqli_error($conn));
            return $select_query;
         }
         function selectFriend($be_apply_user,$apply_status)
         {
            $conn=mysqli_connect('localhost','root','a570911275','weibo') or die('连接数据库服务器失败！');
            $select_sql = "select * from friend_apply where be_apply_user='$be_apply_user' and apply_status='$apply_status' ";
            $select_query = mysqli_query($conn,$select_sql) or die(mysqli_error($conn));
            return $select_query;
         }
         function selectFriend2($username,$apply_status)
         {
            $conn=mysqli_connect('localhost','root','a570911275','weibo') or die('连接数据库服务器失败！');
            $select_sql = "select * from friend_apply where be_apply_user='$be_apply_user' and apply_status='$apply_status' ";
            $select_query = mysqli_query($conn,$select_sql) or die(mysqli_error($conn));
            $select_row=mysqli_fetch_array($select_query);
            return $select_query;
         }
         function selectIDFriend($my_id)
         {
            $conn=mysqli_connect('localhost','root','a570911275','weibo') or die('连接数据库服务器失败！');
            $select_sql = "select * from friend_list where my_id=$my_id ";
            $select_query = mysqli_query($conn,$select_sql) or die(mysqli_error($conn));
            $select_row=mysqli_fetch_array($select_query);
            return $select_row;
         }
         function selectIDFriend2($my_id)
         {
            $conn=mysqli_connect('localhost','root','a570911275','weibo') or die('连接数据库服务器失败！');
            $select_sql = "select * from friend_list where my_id=$my_id ";
            $select_query = mysqli_query($conn,$select_sql) or die(mysqli_error($conn));
            return $select_query;
         }
         function selectId($userid)
         {
            $conn=mysqli_connect('localhost','root','a570911275','weibo') or die('连接数据库服务器失败！');
            $user_sql = "select * from user_info where id='$userid' ";
            $user_query = mysqli_query($conn,$user_sql);
            $row = mysqli_fetch_array($user_query);
            return $row;
         }
         function selectId_comment($be_id)
         {
            $conn=mysqli_connect('localhost','root','a570911275','weibo') or die('连接数据库服务器失败！');
            $insert_sql = "select * from `weibo_comment` where be_id=$be_id ";
            $insert_row = mysqli_query($conn,$insert_sql);
            return $insert_row;
         }
         function selectId_praise($praiseUserId,$praiseWeiboId)
         {
            $conn=mysqli_connect('localhost','root','a570911275','weibo') or die('连接数据库服务器失败！');
            $select_sql = "select * from weibo_praise where praise_id=$praiseUserId and be_praise_weiboid=$praiseWeiboId";
            $select_query = mysqli_query($conn,$select_sql) or die(mysqli_error($conn));
            return $select_query;
         }
         function selectId_praise_weibo($praiseWeiboId)
         {
            $conn=mysqli_connect('localhost','root','a570911275','weibo') or die('连接数据库服务器失败！');
            $sel_sql = "select * from weibo_info where id=$praiseWeiboId";
            $sel_query = mysqli_query($conn,$sel_sql) or die($mysqli_error($conn));
            $sel_row = mysqli_fetch_array($sel_query);
            return $sel_row;
         }
         function selectId_Concern($be_concern_id,$concern_id)
         {
            $conn=mysqli_connect('localhost','root','a570911275','weibo') or die('连接数据库服务器失败！');
            $select_sql = "select * from weibo_concern where be_concern_id=$be_concern_id and concern_id=$concern_id";
            $select_query = mysqli_query($conn,$select_sql);
            $select_row = mysqli_fetch_array($select_query);
            return $sel_row;
         }
      };

      class insert{
         function insertUser($username,$password,$email,$regdate)
         {
            $conn=mysqli_connect('localhost','root','a570911275','weibo') or die('连接数据库服务器失败！');
            $user_in = "insert into user_info(username,password,email,regdate)values('$username','$password','$email','$regdate')";
            $result=mysqli_query($conn,$user_in) or die(mysqli_error($conn));
            return $result;
         }
         function insertPraise($praiseUserId,$praiseWeiboId)
         {
            $conn=mysqli_connect('localhost','root','a570911275','weibo') or die('连接数据库服务器失败！');
            $insert_sql = "insert into weibo_praise(praise_id,be_praise_weiboid) values('$praiseUserId','$praiseWeiboId')";
            $insert_query = mysqli_query($conn,$insert_sql) or die(mysqli_error($conn));
            $insert_row = mysqli_fetch_array($insert_query);
            return $insert_row;
         }
         function insertVisit($visitor,$visit_time,$be_visitor)
         {
            $conn=mysqli_connect('localhost','root','a570911275','weibo') or die('连接数据库服务器失败！');
            $sql = "INSERT INTO weibo_visit(visitor,visit_time,be_visitor) VALUES ('$visitor','$visit_time','$be_visitor')";
            $query = mysqli_query($conn,$sql) or die ("SQL语句插入失败");
            return $query;
         }
         function insertLetter($letter_id,$be_letter_user,$letter_user,$letterDetail,$letterHead)
         {
            $conn=mysqli_connect('localhost','root','a570911275','weibo') or die('连接数据库服务器失败！');
            $insert_sql = "insert into weibo_letter(letter_id,be_letter_user,letter_user,letter_detail,letter_head) values('$letter_id','$be_letter_user','$letter_user','$letterDetail','$letterHead')";
            $insert_query = mysqli_query($conn,$insert_sql) or die(mysqli_error($conn));
            return $insert_query;
         }
         function insertFriend($my_id,$my_user,$friend_id,$friend_user)
         {
            $conn=mysqli_connect('localhost','root','a570911275','weibo') or die('连接数据库服务器失败！');
            $insert_sql = "insert into friend_list(my_id,my_user,friend_id,friend_user) values('$my_id','$my_user','$friend_id','$friend_user')";
            $insert_query = mysqli_query($conn,$insert_sql) or die(mysqli_error($conn));
            return $insert_query;
         }
         function insertFriend2($apply_id,$apply_user,$be_apply_user,$apply_status)
         {
            $conn=mysqli_connect('localhost','root','a570911275','weibo') or die('连接数据库服务器失败！');
            $insert_sql = "insert into friend_apply(apply_id,apply_user,be_apply_user,apply_status) values('$apply_id','$apply_user','$be_apply_user','$apply_status')";
            $insert_query = mysqli_query($conn,$insert_sql) or die(mysqli_error($conn));
            return $insert_query;
         }

      };

      class update{
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