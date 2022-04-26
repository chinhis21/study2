<?php
namespace myApp\myException;

class myException extends \Exception
{
    function classNotFound($filename){
        echo "classNotFound $filename\r\n";
        exit;
    }
    function invalidDataType($type){
        echo "Not valid type of data. Programm waiting $type\r\n";
        exit;
    }
}
        