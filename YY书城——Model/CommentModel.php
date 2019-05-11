<?php
include('BasicModel.php');
class Comment extends BasicModel
{
    public static function tableName()
    {
        return 'comment';
    }
}