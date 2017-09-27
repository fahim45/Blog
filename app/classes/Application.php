<?php
/**
 * Created by PhpStorm.
 * User: fahim foysal kamal
 * Date: 21-Sep-17
 * Time: 11:53 AM
 */

namespace App\classes;

class Application
{
    public function queryExecution($sql)
    {
        $link = Database::db_connect();
        if (mysqli_query($link, $sql)) {
            $queryResult = mysqli_query($link, $sql);
            return $queryResult;
        } else {
            die('Query Problem: '.mysqli_error($link));
        }
    }

    public function getAllPublishedBlog()
    {
        $sql = "SELECT * FROM blogs WHERE publication_status=1";
        $queryResult = Application::queryExecution($sql);
        return $queryResult;
    }

    public function detailsAllPublishedBlog($blogId){
        $sql = "SELECT b.blog_title, b.author_name, c.category_name, b.blog_image, b.blog_description FROM blogs as b, categories as c WHERE b.id='$blogId'";
        $queryResult = Application::queryExecution($sql);
        return $queryResult;
    }
    public function allCategoryList(){
        $sql = "SELECT category_name FROM categories";
        $queryResult = Application::queryExecution($sql);
        return $queryResult;
    }
}