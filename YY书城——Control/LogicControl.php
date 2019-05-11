<?php

//获取bookid
$id = $_SESSION['logic_bookid'];

//获取数据
$label = Book::findOne(['id'=>$id]);
if(isset($label))
{
$_SESSION['bookname_collect'] = $label->bookname;
$_SESSION['author_collect'] = $label->author;
$_SESSION['publish_collect'] = $label->publish;
$_SESSION['variety_collect'] = $label->variety;
$_SESSION['imgname_collect'] = $label->imgname;
$_SESSION['disinfo_collect'] = $label->disinfo;
$_SESSION['storeid_collect'] = $label->storeid;
$_SESSION['storename_collect'] = $label->storename;
$_SESSION['imgname_store_collect'] = $label->imgname_store;
$_SESSION['number_collect'] = $label->number;
$_SESSION['price_collect'] = $label->price;
}
else 
{
echo "<script>alert('您好，您所收藏的图书已被下架！');history.go(-1);</script>";
exit();
}