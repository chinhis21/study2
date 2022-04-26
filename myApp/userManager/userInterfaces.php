<?php
/*
 * test simple interface for work with users and passwords
 */
namespace myApp\userManager;


interface userInterfaces
{
    public static function readData($login);
    public static function insertData(array $data);
    public static function updateData(array $data);
}