<?php

session_start();

if (!isset($_SESSION['id'])) {
    header('Location:index.php');
}

require '../vendor/autoload.php';
use App\classes\Categories;
use App\classes\Login;
use App\classes\Blog;

$queryResult = Categories::getAllPublishedCategory();

if (isset($_GET['status'])) {
    if ($_GET['status'] == 'logout') {
        $logoutMessage = Login::adminLogout();
        $_SESSION['message'] = $logoutMessage;
    }
}

$message = '';
if (isset($_POST['btn'])) {
    $message = Blog::saveBlogInfo($_POST);
}

$title = 'Add Blog';

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
            <h2 class="text-center">Add Blog</h2>
            <hr/>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-offset-2 col-lg-10">
            <h3 class="bg-success text-center"><?php echo $message; ?></h3>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="blog_title" class="col-sm-2 control-label">Blog Title</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" id="blog_title" name="blog_title">
                    </div>
                </div>
                <div class="form-group">
                    <label for="category_name" class="col-sm-2 control-label">Category Name</label>
                    <div class="col-md-10">
                        <select class="form-control" name="category_id" id="category_name">
                            <option>--Select Category Name--</option>
                            <?php while ($publishedCategory = mysqli_fetch_assoc($queryResult)){ ?>
                            <option value="<?php echo $publishedCategory['id']; ?>"><?php echo $publishedCategory['category_name']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="blog_description" class="col-sm-2 control-label">Blog Description</label>
                    <div class="col-md-10">
                        <textarea class="form-control" id="blog_description" name="blog_description" rows="10" cols="30" style="resize: vertical"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="blog_image" class="col-sm-2 control-label">Blog Image</label>
                    <div class="col-md-10">
                        <input type="file" class="form-control" id="blog_image" name="blog_image" value=""/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="publication_status" class="col-sm-2 control-label">Publication status</label>
                    <div class="col-md-10">
                        <select class="form-control" name="publication_status" id="publication_status">
                            <option>--Select Publication Status--</option>
                            <option value="1">Published</option>
                            <option value="0">Unpublished</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <button type="submit" name="btn"  class="btn btn-success">Save Blog Info</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="../assets/admin/js/bootstrap.min.js"></script>
</body>
</html>