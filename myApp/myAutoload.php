<?php
spl_autoload_register ('myApp');
function myApp ($className) {
    $fileName = "./".$className . '.php';
    $fileName = str_replace('\\', '/', $fileName);
    try {
        if(!file_exists($fileName)){
            //throw new chinhisException;
        }
        else {
            include_once $fileName;
            
        }
    }
    catch (chinhisException $e) {
        $e->pageNotFound();
    }
    
}