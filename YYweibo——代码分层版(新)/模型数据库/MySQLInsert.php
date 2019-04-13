<?php
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
?>