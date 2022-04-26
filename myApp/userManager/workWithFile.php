<?php
/*
 * class working with txt file
 * data about user have next sthructure login:|:hashpassword:|:salt
 * !!! Login must be uniqe
 */
namespace myApp\userManager;
use myApp\userManager\userInterfaces;


class workWithFile implements userInterfaces
{
    public static function readData($login){

        $fp = fopen(PASSWDPATH.FILENAME, "r");

        while (!feof($fp)){
            $mytext = fgets($fp, 4096);
            $userData=explode(':|:', $mytext);
            if($userData[0]==$login){
                return array('login'=>$userData[0],'hashpassword'=>$userData[1],'salt'=>$userData[2]);
            }
        }
        return false;
    }
    public static function insertData(array $data){
        return true;
    }
    public static function updateData(array $data){
        return false;
    }
}