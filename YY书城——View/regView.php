<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>用户注册</title>
<style type="text/css">
      body{background-image: linear-gradient(to right, #ff9569 0%, #e92758 100%);}
  html{font-size:15px;}
  fieldset{width:320px; margin:0 auto;}
  legend{font-weight:bold; font-size:30px; margin:0 auto; color:rgb(118, 173, 199)}
  .label{float:left; width:100px; margin-left:10px; color:#29bdd9}
  .left{margin-left:80px;}
  .input{width:150px;}
  span{color: #29bdd9;}
</style>


<script language="JavaScript">
function InputCheck(RegForm)
{
  if (RegForm.username.value == "")
    {
       alert("用户名不可为空!"); 
       RegForm.username.focus();
       return (false);
    }
  if (RegForm.password.value == "")
    {
       alert("必须设定登录密码!");
       RegForm.password.focus();
       return (false);
    }
  if (RegForm.repass.value != RegForm.password.value)
    {
       alert("两次密码不一致!");
       RegForm.repass.focus();
       return (false);
    }
  if (RegForm.email.value == "")
    {
       alert("电子邮箱不可为空!");
       RegForm.email.focus();
       return (false);
     }

}
</script>
</head>
<body>
<div>
<fieldset>
<legend>YY书城——用户注册</legend>
</fieldset>
</div>
<div>
<fieldset>
<form  name="RegForm" method="POST" action="regControl.php" onSubmit="return InputCheck(this)" >
<p>
<label for="username" class="label">用户名:</label>
<input id="username"  type="text" class="input" />
<span>(必填，3-15字符长度，支持汉字、字母、数字以及-)</span>
</p>
<p>
<label for="password" class="label">密 码:</label>
<input id="password" name="password" type="text" class="input" />
<span>(必填，不得少于6位，支持字母、数字)</span>
</p>
<p>
<label for="repass" class="label">再次输入密码：</label>
<input id="repass" name="repass" type="text" calss="input"/>
<span>(请确认密码)</span>
</p>
<p>
<label for="email" class="label">电子邮箱：</label>
<input id="email" name="email" type="text" calss="input"/>
<span>(必填，请输入电子邮箱)</span>
</p>
<p>
<input type="submit" name="submit" value="  确 定  " class="left" />
<input type="RESET" value="  重 置  " class="right"/>
</p>
</form>
</fieldset>
</div>
</body>
</html>
