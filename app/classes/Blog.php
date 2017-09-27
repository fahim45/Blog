<?php
/**
 * Created by PhpStorm.
 * User: fahim foysal kamal
 * Date: 19-Sep-17
 * Time: 2:39 PM
 */

namespace App\classes;
use App\classes\Database;

class Blog
{
    protected function saveBlogImage(){
        $pictureName = $_FILES['blog_image']['name'];
        $directory   = '../assets/blog_image/';
        $targetFile  = $directory.$pictureName;

        $fileType    = pathinfo($pictureName,PATHINFO_EXTENSION); /*for Extention*/
        $check       = getimagesize($_FILES['blog_image']['tmp_name']); /*It is image or not*/

        if ($check){
            if (!file_exists($targetFile)){
                if ($fileType=='jpg'||$fileType=='jpeg'||$fileType=='png'){
                    if ($_FILES['blog_image']['size']<5242880){
                        move_uploaded_file($_FILES['blog_image']['tmp_name'],$targetFile);
                        return $targetFile;
                    }else{
                        echo 'File size is too large. Maximum size is 5MB. Thanks!!!';
                    }
                } else {
                    echo 'File must be jpg, jpeg or png. Thanks!!!';
                }
            } else {
                echo 'File already exists. Thanks!!!';
            }
        } else {
            echo 'Please, use an image file. Thanks!!!';
        }
    }
    public function queryExecution($sql, $status=null){
        $link=Database::db_connect();
        if (mysqli_query($link, $sql)){
            if ($status){
                $queryResult = mysqli_query($link, $sql);
                return $queryResult;
            } else {
                $message = "Blog info save successfully.";
                return $message;
            }
        }else{
            die('Query Problem:'.mysqli_error($link));
        }
    }
    public function saveBlogInfo($data){
        $targetFile = Blog::saveBlogImage();
        $sql = "INSERT INTO blogs (category_id, blog_title, author_name, blog_description, blog_image, publication_status) VALUES ('$data[category_id]', '$data[blog_title]', '$_SESSION[name]', '$data[blog_description]', '$targetFile', '$data[publication_status]')";
        $message = Blog::queryExecution($sql);
        return $message;
    }
    public function viewAllBlogInfo(){
        $sql = "SELECT b.*, c.category_name FROM blogs as b, categories as c WHERE b.category_id=c.id ORDER BY b.id DESC";
        $status = 'view';
        $queryResult = Blog::queryExecution($sql, $status);
        return $queryResult;
    }
    public function selectBlogInfoByBlogId($blogId){
        $sql = "SELECT b.*, c.category_name FROM blogs as b, categories as c WHERE b.id = '$blogId'";
        $status = 'select';
        $queryResult = Blog::queryExecution($sql, $status);
        return $queryResult;
    }
    public function updateBlogInfoByBlogId($data){
        $imageName = $_FILES['blog_image']['name'];
        $link = Database::db_connect();
        if ($imageName){
            $blogId = $data['blog_id'];
            $blogSql = "SELECT * FROM blogs WHERE id='$blogId'";
            $queryResult = mysqli_query($link, $blogSql);
            $blogInfo = mysqli_fetch_assoc($queryResult);
            unlink($blogInfo['blog_image']);


            $targetFile = Blog::saveBlogImage();
            $sql = "UPDATE blogs SET category_id = '$data[category_id]', blog_title = '$data[blog_title]', blog_description = '$data[blog_description]', blog_image = '$targetFile', publication_status = '$data[publication_status]' WHERE id = '$data[blog_id]'";
            Blog::queryExecution($sql);
            header('Location:manage-blog.php');
        } else {
            $sql = "UPDATE blogs SET category_id = '$data[category_id]', blog_title = '$data[blog_title]', blog_description = '$data[blog_description]', publication_status = '$data[publication_status]' WHERE id = '$data[blog_id]'";
            Blog::queryExecution($sql);
            header('Location:manage-blog.php');
        }
    }
    public function publishedBlogById($id){
        $sql = "UPDATE blogs SET publication_status = 1 WHERE id = '$id'";
        Blog::queryExecution($sql);
        /*$message = 'Blog info published successfully.';
        return $message;*/
        header('Location:manage-blog.php');
    }
    public function unpublishedBlogById($id){
        $sql = "UPDATE blogs SET publication_status = 0 WHERE id = '$id'";
        Blog::queryExecution($sql);
        /*$message = 'Blog info unpublished successfully.';
        return $message;*/
        header('Location:manage-blog.php');
    }
    public function deleteBlogInfoByBlogId($id){
        $sql = "DELETE FROM blogs WHERE id='$id'";
        Blog::queryExecution($sql);
        header('Location:manage-blog.php');
    }
}