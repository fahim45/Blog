<?php
/**
 * Created by PhpStorm.
 * User: fahim foysal kamal
 * Date: 18-Sep-17
 * Time: 10:58 AM
 */
namespace App\classes;
use App\classes\Database;
class Login
{
    public function adminLoginCheck($data){
        $email = $data['email'];
        $password = md5($data['password']);
        $link = Database::db_connect();
        $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
        if (mysqli_query($link, $sql)){
            $queryResult = mysqli_query($link, $sql);
            $userInfo = mysqli_fetch_assoc($queryResult);
            if ($userInfo){
                $_SESSION['id'] = $userInfo['id'];
                $_SESSION['name'] = $userInfo['name'];
                header('Location:dashboard.php');
            }else{
                $message = "Please, use valid email and password";
                return $message;
            }
        } else {
            die('Query problem:'.mysqli_error($link));
        }
    }

    public function adminLogout(){
        unset($_SESSION['id']);
        unset($_SESSION['name']);

        header('Location:index.php');
        $logoutMessage = "Logout Successfully!!!!";
        return $logoutMessage;
    }
}