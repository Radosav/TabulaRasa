<?php
include "connect.php";
/**
 * Created by PhpStorm.
 * User: Radosav
 * Date: 28.2.2016.
 * Time: 16.21
 */

class Users extends Database{
    static public function CreateUser($email,$password){
        $id = parent::query("SELECT COUNT(id) FROM users");
        var_dump($id);
    }
}