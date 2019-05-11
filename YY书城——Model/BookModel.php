<?php
include('BasicModel.php');
class Book extends BasicModel
{
    public static function tableName()
    {
        return 'book_info';
    }

}