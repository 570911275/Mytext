<?php
include('BasicModel.php');
class Concern extends BasicModel
{
    public static function tableName()
    {
        return 'my_concern';
    }
}