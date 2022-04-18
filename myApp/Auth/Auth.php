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

interface authFunctions 
{
    public function logOut($login);
    public function createAuth();
}

abstract class BaseAuthMethods
{
    const salt=159753;
    protected $login;
    protected $password;
    protected $ip;
    
    function __construct($login,$password,$ip){
        $this->login=$login;
        $this->password=$password;
        $this->ip=$ip;
    }
        
    public static function checkAuth($login,$password,$ip,$salt){
        $passwordHash=md5($password.$salt);
        if($_SESSION['login']==$login && $_SESSION['password']==$passwordHash && $_SESSION['ip']==$ip){
            return true;
        }
        else{
            return false;
        }
    }   
}

class Auth extends BaseAuthMethods implements authFunctions
{
    public function createAuth(){
        session_start();
        $_SESSION['login']=$this->login;
        $_SESSION['password']=md5($this->password.self::salt);
        $_SESSION['ip']=$this->ip;
        if(self::checkAuth($this->login,$this->password,$this->ip,self::salt)){
            return true;
        }
        else {
            return false;
        }
    }
    
    public function logOut($login){
        if($_SESSION['login']==$login){
            unset($_SESSION['login']);
            unset($_SESSION['password']);
            unset($_SESSION['ip']);
            session_destroy();
            return true;
        }
        else {
            return false;
        }
    }
}


