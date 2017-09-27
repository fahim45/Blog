<?php
session_start();
if (!isset($_SESSION['id'])) {
    header('Location:index.php');
}
require '../vendor/autoload.php';
use App\classes\Blog;
use App\classes\Login;
use App\classes\Categories;

$categoryResult = Categories::getAllPublishedCategory();

if (isset($_GET['status'])) {
    if ($_GET['status'] == 'logout') {
        $logoutMessage = Login::adminLogout();
        $_SESSION['message'] = $logoutMessage;
    }
}

$blogId = $_GET['id'];
$queryResult = Blog::selectBlogInfoByBlogId($blogId);
$blogInfo = mysqli_fetch_assoc($queryResult);

if (isset($_POST['btn'])) {
    $queryResult = Blog::updateBlogInfoByBlogId($_POST);
}

$title = 'Edit Blog';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $title; ?></title>
    <link href="../assets/admin/css/bootstrap.css" rel="stylesheet">
</head>
<body>

<?php include 'includes/header.php'; ?>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="text-center">Edit Blog</h2>
            <hr/>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <form class="form-horizontal" action="" method="post" name="editBlogForm" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="blog_title" class="col-sm-2 control-label">Blog Title</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" id="blog_title" name="blog_title" value="<?php echo $blogInfo['blog_title']; ?>"/>
                        <input type="hidden" class="form-control" name="blog_id" value="<?php echo $blogInfo['id']; ?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="category_name" class="col-sm-2 control-label">Category Name</label>
                    <div class="col-md-10">
                        <select class="form-control" name="category_id" id="category_name">
                            <?php while ($publishedCategory = mysqli_fetch_assoc($categoryResult)){ ?>
                                <option value="<?php echo $publishedCategory['id']; ?>"><?php echo $publishedCategory['category_name']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="blog_description" class="col-sm-2 control-label">Blog Description</label>
                    <div class="col-md-10">
                        <textarea class="form-control" id="blog_description" name="blog_description" rows="10" cols="30" style="resize: vertical"><?php echo $blogInfo['blog_description']; ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="blog_image" class="col-sm-2 control-label">Blog Image</label>
                    <div class="col-md-10">
                        <input type="file" class="form-control" id="blog_image" name="blog_image" value="<?php echo $blogInfo['blog_image']; ?>"/>
                        <img src="<?php echo $blogInfo['blog_image']; ?>" alt="Blog Image" style="width: 80px; height: 80px;"/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="publication_status" class="col-sm-2 control-label">Publication status</label>
                    <div class="col-md-10">
                        <select class="form-control" name="publication_status" id="publication_status">
                            <option value="1">Published</option>
                            <option value="0">Unpublished</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <button type="submit" name="btn"  class="btn btn-success">Update Blog Info</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
<script>
    document.forms['editBlogForm'].elements['publication_status'].value='<?php echo $blogInfo['publication_status']; ?>';
    document.forms['editBlogForm'].elements['category_id'].value='<?php echo $blogInfo['category_id']; ?>';
</script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="../assets/admin/js/bootstrap.min.js"></script>
</body>
</html>