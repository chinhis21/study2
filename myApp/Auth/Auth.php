<?php
/*
 * Simple alghoritme for create and destroy auth 
 * status of users in php sessions
 * session have next data 
 * [user] => login
 * [password] => md5($password.$salt)
 * [ip]=> ip
 */
namespace myApp\Auth;

use Aura\Session\SessionFactory;
use myApp\userManager\userManager;

interface authFunctions 
{
    public function logOut($login);
    public function createAuth();
}

abstract class BaseAuthMethods
{
    protected $loginStatus;
    protected $salt;
    protected $login;
    protected $password;
    protected $ip;
    
    function __construct($login,$password){
        
        $this->loginStatus=self::checkLoginExist($login);
        
        if(!is_array($this->loginStatus)){
            return "Login: $login not exist in system \r\n";
        }
        else {
            $this->salt=$this->loginStatus['salt'];
            $this->login=$login;
            $this->password=$password;
            $this->ip=$_SERVER['REMOTE_ADDR'];
            
        }

    }
    public static function checkAuth($login,$password,$ip){
        
        $checkLogin=self::checkLoginExist($login);
        
        
        if($checkLogin===FALSE){
            return "Login: $login not exist in system \r\n";
        }
        $passwordHash=md5($password.$checkLogin['salt']);
        session_start();
        if($_SESSION[$login]==$login && $_SESSION[$login]['password']==$passwordHash && $_SESSION[$login]['ip']==$ip){
            return "Login: $login logined \r\n";
        }
        else{
            return "Login: $login not logined. Pls sent correct data \r\n";
        }
    }
    private function checkLoginExist($login){
        $dataAboutLogin =   new userManager();
        $dataAboutLogin =   $dataAboutLogin->findUserByLogin($login);
        return $dataAboutLogin;
    }
}

class Auth extends BaseAuthMethods implements authFunctions
{
    public function createAuth(){
        //use packager from composer
        $sessionInit = new SessionFactory();
        $session = $sessionInit->newInstance(array());
        $session->start();
        $segment = $session->getSegment($this->login);
        $segment->set('password', md5($this->password.$this->salt));
        $segment->set('ip', $this->ip);
        //
        if(self::checkAuth($this->login,$this->password,$this->ip)){
            return true;
        }
        else {
            return false;
        }
    }
    

    
    public function logOut($login){
        if($_SESSION[$login]==$login){
            unset($_SESSION[$login]);
            session_destroy();
            return true;
        }
        else {
            return false;
        }
    }
}


