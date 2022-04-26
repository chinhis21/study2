<?php
namespace myApp\myException;

class myException extends \Exception
{
    function classNotFound(){
        echo "classNotFound\r\n";
        exit;
    }
}
        