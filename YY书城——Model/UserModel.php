<?php
include('BasicModel.php');
class User extends BasicModel
{
    public static function tableName()
    {
        return 'user_info';
    }
}