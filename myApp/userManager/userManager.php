<?php
/*
 * factory class which returning data about registered user
 * array('login'=$login,'salt'=$salt)
 * or false - login not found
 */
namespace myApp\userManager;

use myApp\myException\myException;
use myApp\userManager\workWithDB;
use myApp\userManager\workWithFile;

class userManager
{
    function findUserByLogin($login){
        
        try {
            if(gettype($login)!='string'){
                throw new myException();
            }
        }catch (myException $e) {
            $e->invalidDataType('STRING');
        }
        
        switch (SAVEMETHOD) {
            case 'file':
                $data=workWithFile::readData($login);
                break;
            case 'DB':
                $data=workWithDB::readData($login);
                break;
        }
        return $data;
    }
    
    function userUpdate(array $data){
        
        try {
            if(gettype($data)!='array'){
                throw new myException();
            }
        }catch (myException $e) {
            $e->invalidDataType('ARRAY');
        }
        
        switch (SAVEMETHOD) {
            case 'file':
                $data=workWithFile::updateData($data);
                break;
            case 'DB':
                $data=workWithDB::updateData($data);
                break;
        }
        return $data;
    }
    
    function userInsert(array $data){
        
        try {
            if(gettype($data)!='array'){
                throw new myException();
            }
        }catch (myException $e) {
            $e->invalidDataType('ARRAY');
        }
        
        switch (SAVEMETHOD) {
            case 'file':
                $data=workWithFile::insertData($data);
                break;
            case 'DB':
                $data=workWithDB::insertData($data);
                break;
        }
        return $data;
    }
}