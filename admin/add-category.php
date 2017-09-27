<?php

session_start();

if (!isset($_SESSION['id'])) {
    header('Location:index.php');
}
require '../vendor/autoload.php';
use App\classes\Categories;
use App\classes\Login;
if (isset($_GET['status'])) {
    if ($_GET['status'] == 'logout') {
        $logoutMessage = Login::adminLogout();
        $_SESSION['message'] = $logoutMessage;
    }
}

$message = '';
if (isset($_POST['btn'])) {
    $message = Categories::saveCategoryInfo($_POST);
}

$title = 'Add Category';

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
            <h2 class="text-center">Add Category</h2>
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
            <form class="form-horizontal" action="" method="post">
                <div class="form-group">
                    <label for="category_name" class="col-sm-2 control-label">Category Name</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" id="category_name" name="category_name">
                    </div>
                </div>
                <div class="form-group">
                    <label for="category_description" class="col-sm-2 control-label">Category Description</label>
                    <div class="col-md-10">
                        <textarea class="form-control" id="category_description" name="category_description" rows="10" cols="30" style="resize: vertical"></textarea>
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
                        <button type="submit" name="btn"  class="btn btn-success">Save Category Info</button>
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