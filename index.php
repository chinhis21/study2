<?php
/*
 * 1. “Create simple application Using composer autoloader.
2. Include and use one of the third party pakage using composer."
3. “Create couple of specific exceptions
4. Integrate exception processing to previously added” third party library

5. Use factory for creation non injectable objects.

Read about other patterns, try to make simple examples"
 */

require_once __DIR__ . '/myApp/myAutoload.php'; //my Classes autoload
require_once __DIR__ . '/vendor/autoload.php';

use myApp\Auth\Auth;
use myApp\userManager\acts

$createLoginSession = new Auth('admin','0000','192.168.1.11','159753');
$loginStatus = $createLoginSession -> createAuth();
/*
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
*/


//$segment = $session->getSegment('Auth');
//$segment->set('foo', 'bar');
//$segment->set('baz', 'dib');
//$session->clear();
//$session->commit();
print_r($_SESSION);
