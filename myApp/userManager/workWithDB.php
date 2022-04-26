<?php
namespace myApp\userManager;
use myApp\userManager\userInterfaces;


class workWithDB implements userInterfaces
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