<?php
session_start();
//引入book模型
include('BookModel.php');
//引入左侧功能单
include('leftAbilityListView.php');
//获取图书id
$bookid = $_GET['id'];
$_SESSION['update_book_id'] = $bookid;

//获取数据
$label = Book::findOne(['id'=>$bookid]);
$bookname = $label->bookname;
$author   = $label->author;
$publish  = $label->publish;
$number   = $label->number;
$imgname  = $label->imgname;
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/><h2>
    <style type="text/css">
      body{background-image: linear-gradient(to right, #ff9569 0%, #e92758 100%);}
      legend{font-weight:bold; font-size:30px; margin:0 auto; color:rgb(118, 173, 199)}
</style>
    </head>
    <body >
<div>
<fieldset>
<legend>YY书城——修改图书</legend>
</fieldset>
</div>
<div >
<fieldset>
<form action="bookUpdateControl.php" method="POST" enctype="multipart/form-data">
    <h4>输入图书名称:</h4>
    <input type="text" name="bookname" size="25" value=<?php echo $bookname?> />

    <h4>输入图书作者:</h4>
    <input type="text" name="author" size="25" value=<?php echo $author?> />

    <h4>输入图书出版社:</h4>
    <input type="text" name="publish" size="25" value=<?php echo $publish?> />

    <h4>输入图书数量:</h4>
    <input type="text" name="number" size="25" value=<?php echo $number?> />

    <h3>图书分类</h3>
    <select name="aselect" size="1">
        <optgroup label="教育">
        <option value="教材" selected>教材</option>
        <option value="教辅">教辅</option>
        <option value="工具书">工具书</option>
        </optgroup>

        <optgroup label="小说">
        <option value="玄幻奇幻">玄幻奇幻</option>
        <option value="武侠仙侠">武侠仙侠</option>
        <option value="军事历史">军事历史</option>
        <option value="悬疑灵异">悬疑灵异</option>
        <option value="体育游戏">体育游戏</option>
        <option value="科幻军事">科幻军事</option>
        </optgroup>  

        <optgroup label="童书">
        <option value="绘本">绘本</option>
        <option value="科普">科普</option>
        <option value="百科">百科</option>
        <option value="卡通">卡通</option>
        </optgroup>

        <optgroup label="生活">
        <option value="运动保健">运动保健</option>
        <option value="孕期育儿">孕期育儿</option>
        <option value="家居风水">家居风水</option>
        <option value="亲子家教">亲子家教</option>
        <option value="美食旅游">美食旅游</option>
        <option value="休闲手工">休闲手工</option>
        </optgroup>

        <optgroup label="科技">
        <option value="自然科学">自然科学</option>
        <option value="农林">农林</option>
        <option value="工业">工业</option>
        <option value="计算机">计算机</option>
        <option value="天文">天文</option>
        <option value="建筑">建筑</option>
        </optgroup>


        <optgroup label="文艺">
        <option value="文学">文学</option>
        <option value="艺术">艺术</option>
        <option value="摄影">摄影</option>
        <option value="传记">传记</option>
        </optgroup>
     </select>

     <h4>请选择您要上传的图书封面：</h4>
    <input type="file" name='bookPicture'  size="25" />

    <p>
    <h3>图书简介：</h3>
    <td><textarea name="disinfo" rows="10" colos="100"></textarea></td>
    </p>

     <h3>重置图书信息</h3>
     <input type="RESET" value="重置"/>

     <h3>提交图书信息</h3>
     <input type="submit" value="提交"/> 
</fieldset>
</div>                          
</form>
</body>
</html>