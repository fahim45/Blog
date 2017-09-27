<?php
session_start();
if (!isset($_SESSION['id'])) {
    header('Location:index.php');
}
require '../vendor/autoload.php';
use App\classes\Login;
use App\classes\Blog;

if (isset($_GET['status'])) {
    if ($_GET['status'] == 'logout') {
        $logoutMessage = Login::adminLogout();
        $_SESSION['message'] = $logoutMessage;
    }
}
$blogId=$_GET['id'];
$queryResult = Blog::selectBlogInfoByBlogId($blogId);
$blogDetails = mysqli_fetch_assoc($queryResult);

$title = 'View Blog Details';
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
            <h2 class="text-center">Blog Details</h2><hr/>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped">
                    <tr>
                        <th>Blog ID</th>
                        <td><?php echo $blogDetails['id']; ?></td>
                    </tr>
                    <tr>
                        <th>Category ID</th>
                        <td><?php echo $blogDetails['category_id']; ?></td>
                    </tr>
                    <tr>
                        <th>Category Name</th>
                        <td><?php echo $blogDetails['category_name']; ?></td>
                    </tr>
                    <tr>
                        <th>Blog Title</th>
                        <td><?php echo $blogDetails['blog_title']; ?></td>
                    </tr>
                    <tr>
                        <th>Author Name</th>
                        <td><?php echo $blogDetails['author_name']; ?></td>
                    </tr>
                    <tr>
                        <th>Blog Description</th>
                        <td><?php echo $blogDetails['blog_description']; ?></td>
                    </tr>
                    <tr>
                        <th>Blog Image</th>
                        <td><img src="<?php echo $blogDetails['blog_image']; ?>" alt="Blog Image" style="height: 255px;"></td>
                    </tr>
                    <tr>
                        <th>Publication Status</th>
                        <td><?php echo $blogDetails['publication_status']==1 ? 'Published':'Unpublished'; ?></td>
                    </tr>

                    <!--<tr>
                    <td><b>Author:</b> </td>
                </tr>
                <tr>
                    <td><b>Category:</b> </td>
                </tr>
                <tr>
                    <td><b>Publication status:</b> </td>
                </tr>-->
                </table>
            </div>
        </div>
    </div>
    <!--<div class="row">
        <div class="col-lg-12">
            <img src="" alt="Blog Image"/>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <p style="margin-top: 10px;"></p>

        </div>
    </div>-->
</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="../assets/admin/js/bootstrap.min.js"></script>
</body>
</html>