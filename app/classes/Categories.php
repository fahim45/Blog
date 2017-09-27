<?php
/**
 * Created by PhpStorm.
 * User: fahim foysal kamal
 * Date: 18-Sep-17
 * Time: 12:25 PM
 */

namespace App\classes;
use App\classes\Database;


class Categories
{

    public function queryExecute($sql, $status=null){
        $link = Database::db_connect();
        if (mysqli_query($link, $sql)){
            if ($status){
                $queryResult = mysqli_query($link, $sql);
                return $queryResult;
            }else {
                $message = "Category added successfully.";
                return $message;
            }
        } else{
            die('Query Problem:'.mysqli_error($link));
        }
    }
    public function saveCategoryInfo($data){
        $sql = "INSERT INTO categories (category_name, category_description, publication_status) VALUES ('$data[category_name]', '$data[category_description]', '$data[publication_status]')";
        $message = Categories::queryExecute($sql);
        return $message;
    }

    /*public function saveCategoryInfo($data){
        $sql = "INSERT INTO categories (category_name, category_description, publication_status) VALUES ('$data[category_name]', '$data[category_description]', '$data[publication_status]')";
        if (mysqli_query(Database::db_connect(), $sql)){
            $message = "Category added successfully.";
            return $message;
        }else{
            die("Query Problem:<br/>".mysqli_error(Database::db_connect()));
        }
    }*/
    public function viewAllCategoryInfo(){
        $sql = "SELECT * FROM categories";
        $status = 'view';
        $queryResult = Categories::queryExecute($sql, $status);
        return $queryResult;
        /*if (mysqli_query(Database::db_connect(), $sql)){
            $queryResult = mysqli_query(Database::db_connect(), $sql);
            return $queryResult;
        }else{
            die("Query Problem:<br/>".mysqli_error(Database::db_connect()));
        }*/
    }
    public function selectCategoryInfoByCategoryId($categoryId){
        $sql = "SELECT * FROM categories WHERE id = '$categoryId'";
        $status = 'select';
        $queryResult = Categories::queryExecute($sql, $status);
        return $queryResult;
        /*if(mysqli_query(Database::db_connect(), $sql)){
            $queryResult = mysqli_query(Database::db_connect(), $sql);
            return $queryResult;
        }else{
            die("Query Problem:<br/>".mysqli_error(Database::db_connect()));
        }*/
    }
    public function updateCategoryInfoByCategoryId($data, $categoryId){
        $sql = "UPDATE categories SET category_name = '$data[category_name]', category_description = '$data[category_description]', publication_status = '$data[publication_status]' WHERE id = '$categoryId'";
        Categories::queryExecute($sql);
        header('Location:manage-category.php');

        /*if (mysqli_query(Database::db_connect(), $sql)){
            header('Location:manage-category.php');
        }else{
            die("Query Problem:<br/>".mysqli_error(Database::db_connect()));
        }*/
    }
    public function deleteCategoryInfoByCategoryId($id){
        $sql = "DELETE FROM categories WHERE id='$id'";
        Categories::queryExecute($sql);
        header('Location:manage-category.php');


/*        No need because header not working*/

        /*$deleteMessage = 'Category Deleted Successfully.';
        return $deleteMessage;*/


        /*if (mysqli_query(Database::db_connect(), $sql)){
            header('Location:manage-category.php');
        }else{
            die("Query Problem:<br/>".mysqli_error(Database::db_connect()));
        }*/
    }
    public function getAllPublishedCategory(){
        $sql = "SELECT * FROM categories WHERE publication_status=1";
        $status = 'allCategory';
        $queryResult = Categories::queryExecute($sql, $status);
        return $queryResult;
        /*$link = Database::db_connect();
        if(mysqli_query($link, $sql)) {
            $queryResult = mysqli_query($link, $sql);
            return $queryResult;
        } else {
            die('Query Problem'.mysqli_error($link));
        }*/
    }
}