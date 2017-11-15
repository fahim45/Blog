<?php
/**
 * Created by PhpStorm.
 * User: fahim foysal kamal
 * Date: 14-Nov-17
 * Time: 10:35 PM
 */

namespace App\classes;

use App\classes\Database;


class Contact
{
    public static function formValidation($data)
    {

        $name = trim($data['name']);
        $email = trim($data['email']);
        $message = trim($data['message']);

        $errors = [];
        if (empty($name) === true || empty($email) === true || empty($message) === true) {
            $errors[] = 'Name, Email & Message fields are required.';
        } else {
            if (ctype_alpha($name) === false) {
                $errors[] = 'Name must only contain letters.';
            }
            if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
                $errors[] = 'That\'s not a valid email address.';
            }
        }
        if (empty($errors) === true){
            mail('fahim149004@gmail.com','Blog Email', $message, 'From:'.$email);
            header('Location:contact-us.php?sent');
            exit();
        }
        return $errors;
    }
}