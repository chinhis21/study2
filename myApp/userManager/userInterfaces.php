<?php
/*
 * test simple interface for work with users and passwords
 */
namespace myApp\userManager;


interface acts
{
    public function readData();
    public function insertData();
    public function updateData();
}