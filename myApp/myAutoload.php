<?php
use myApp\myException\myException;
spl_autoload_register ('myApp');
function myApp ($className) {
    $fileName = $className . '.php';
    $fileName = str_replace('\\', '/', $fileName);

    try {
        if(!file_exists($fileName)){
            throw new myException();
        }
        else {
            include_once $fileName;
        }
    }catch (myException $e) {
        $e->classNotFound();
    }
    
}