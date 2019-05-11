<?php
include('BasicModel.php');
class Order extends BasicModel
{
    public static function tableName()
    {
        return 'my_order';
    }
}