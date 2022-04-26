<?php
namespace myApp\userManager;
use myApp\userManager\acts;


class workWithDB implements acts
{
    public static function readData($login){
        return false;
    }
    public static function insertData(array $data){
        return false;
    }
    public static function updateData(array $data){
        return false;
    }
}