<?php
//引入左侧功能单
include('leftAbilityListView.php');

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>举报商家</title>
<style type="text/css">
      body{background-image: linear-gradient(to right, #ff9569 0%, #e92758 100%);}
  html{font-size:15px;}
  fieldset{width:700px; margin:20px 500px;}
  legend{font-weight:bold; font-size:30px; margin:0 auto; color:rgb(118, 173, 199)}
  .div{float:left; width:70px; margin-left:10px; color:turquoise}
  .fieldset{float:left; width:70px; margin-left:10px; color:turquoise}
  .left{margin-left:80px;}
  .input{width:150px;}
  span{color: #70b9b0;}
</style>
</head>
<body>
<div>
<fieldset>
<form  method="POST" action="reportStoreControl.php" enctype="multipart/form-data">
    <p>
    <label for="store" class="label">举报商铺：</label>
    <input id="store" name="store" type="text" calss="input"/>
    </p>
    <p>
    <label for="book" class="label">举报图书：</label>
    <input id="book" name="book" type="text" calss="input"/>
    </p>
    <hr/>
    <p>
    <h3>举报内容：</h3>
    <hr/>
    <td><textarea name="report" rows="10" colos="100"></textarea></td>
    </p>
    <h4>请选择您要上传的举报图片：</h4>
    <input type="file" name='bookPicture'  size="25"/>
    <p>
    <input type="submit" name="submit" value="发布举报" class="left"/> 
    <input type="RESET" value="  重 置  " class="right"/>
    </p>
</form>
</fieldset>
</div>
</body>
</html>    