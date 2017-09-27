<?php
/**
 * Created by PhpStorm.
 * User: fahim foysal kamal
 * Date: 18-Sep-17
 * Time: 11:20 AM
 */

namespace App\classes;


class Database
{
    public function db_connect(){
        $hostName = 'localhost';
        $userName = 'root';
        $password = '';
        $dbName = 'blog';
        $link = mysqli_connect($hostName,$userName,$password,$dbName);
        return $link;
    }
}