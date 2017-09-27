<?php
require 'vendor/autoload.php';
use App\classes\Application;

$blogId = $_GET['id'];
$queryResult = Application::detailsAllPublishedBlog($blogId);
$blogDetails = mysqli_fetch_assoc($queryResult);

/*For Viewing All Category List*/
$queryResult = Application::allCategoryList();
/*$allCategories = mysqli_fetch_assoc($queryResult);*/

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Blog Details</title>
    <!-- Bootstrap core CSS -->
    <link href="assets/front/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="assets/front/css/heroic-features.css" rel="stylesheet">
</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="index.php">Brand</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Page Content -->
<div class="container">
    <!-- Page Features -->
    <div class="row">
        <div class="col-lg-9">
            <h2><?php echo $blogDetails['blog_title']; ?></h2>
            <span>By <u><?php echo $blogDetails['author_name']; ?></u>, Category: <?php echo $blogDetails['category_name']; ?></span>
            <hr/>
            <div class="text-center">
                <img src="admin/<?php echo $blogDetails['blog_image']; ?>" alt="" style="width: 100%; height: max-content;">
            </div>
            <p class="text-justify">
                <?php echo $blogDetails['blog_description']; ?>
            </p>

        </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Category</h4>
                        <div class="card-text">
                            <ul>
                                <?php while ($allCategories = mysqli_fetch_assoc($queryResult)){ ?>
                                <li>
                                    <a href=""><?php echo $allCategories['category_name']; ?></a>
                                </li>
                                <?php } ?>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <!-- /.row -->

</div>
<!-- /.container -->

<!-- Footer -->
<footer class="py-5 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; <?php echo date('Y'); ?>. All Right Reserved</p>
    </div>
    <!-- /.container -->
</footer>

<!-- Bootstrap core JavaScript -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="assets/admin/js/bootstrap.min.js"></script>

</body>
</html>
