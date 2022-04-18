<?php

require_once __DIR__ . '/myApp/myAutoload.php'; //my Classes autoload
require_once __DIR__ . '/vendor/autoload.php';

use myApp\Auth\Auth;
use Laminas\Session\SessionManager;

$createLoginSession = new Auth('admin','0000','192.168.1.11');
$loginStatus = $createLoginSession -> createAuth();

if($loginStatus===true){ //show message if user logined
    echo 'logined'."\r\n";
}
else {
    echo 'NOT logined'."\r\n";
}

if(Auth::checkAuth('admin','0000','192.168.1.11','hgjghgf')===true){ //check random user if logined in system
    echo 'logined'."\r\n";
}
else {
    echo 'NOT logined'."\r\n";
}

if(Auth::logOut('admin1')===true){
    echo 'logout DONE'."\r\n";
}
else {
    echo 'logout FAIL. Check login'."\r\n";
}