<?php
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
ini_set('error_reporting', 0);
/*
 * 1. “Create simple application Using composer autoloader.
2. Include and use one of the third party pakage using composer."
3. “Create couple of specific exceptions
4. Integrate exception processing to previously added” third party library

5. Use factory for creation non injectable objects.

Read about other patterns, try to make simple examples"
 */

require_once __DIR__ . '/myApp/myAutoload.php'; //my Classes autoload
require_once __DIR__ . '/config/config.php'; //my startup config
require_once __DIR__ . '/vendor/autoload.php'; //my startup config

use myApp\Auth\Auth;


$createLoginSession = new Auth('admin','0000');
$loginStatus = $createLoginSession -> createAuth();
if($loginStatus===true){ //show message if user logined
    echo 'logined'."\r\n";
}
else {
    echo 'NOT logined'."\r\n";
}



echo Auth::checkAuth('admin','0000','192.168.1.11');





if(Auth::logOut('zevs')===true){
    echo 'logout DONE'."\r\n";
}
else {
    echo 'logout FAIL. Check login'."\r\n";
}





